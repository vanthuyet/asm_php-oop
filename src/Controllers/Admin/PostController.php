<?php

namespace Admin\Xuongoop\Controllers\Admin;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Admin\Auth;
use Admin\Xuongoop\Models\Admin\Posts;
use Admin\Xuongoop\Models\Admin\Tags;
use Admin\Xuongoop\Models\Admin\PostTag;
use Exception;
use Rakit\Validation\Validator;

class   PostController extends Controller
{
    private  Posts $post;
    public  Tags  $tag;
    public  Auth  $auth;

    public PostTag $pt;

    public function __construct()
    {
        $this->post = new Posts();
        $this->tag = new Tags();
        $this->auth = new Auth();
        $this->pt = new PostTag();
    }
    public function index()
    {
        try {
            // for ($i = 0; $i < 100; $i++) {
            //     $this->tag->insert([
            //         'name' => "Nguyễn Văn $i",
            //         'email' => "a$i@gmail.com",
            //         'password' => password_hash('12345678', PASSWORD_DEFAULT)
            //     ]);
            [$posts, $totalPage] = $this->post->paginatePost($_GET['page'] ?? 1);
            // $totalPage = $this->tag->count();
            $this->renderViewAdmin('posts.index', [
                "posts"     =>   $posts,
                "totalPage" =>   $totalPage
            ]);
            // }
        } catch (Exception $e) {
            Helper::debug($e);
        }
    }

    public function create()
    {
        $tags = $this->tag->all();
        $auths = $this->auth->all();
        $this->renderViewAdmin("posts.create", [
            'tags' => $tags,
            'auths' => $auths
        ]);
    }
    public function store()
    {
        
        $validator = new Validator;

        $validation = $validator->validate($_POST + $_FILES, [
            'name'          => 'required',
            'img'           => 'uploaded_file:0,2M,png,jpg,jpeg',
            'overview'      => 'max:200',
            'content'       => 'required',
            'auth'          => 'required|max:50',
            'tag'          => 'required',


        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("/admin/posts/create"));
            exit();
        } else {
            // validation passes

            $data = [
                'name'          => $_POST['name'],
                'overview'      => $_POST['overview'],
                'content'       => $_POST['content'],
                'auth_id '      => $_POST['auth'],


            ];

            if (isset($_FILES['img']) && $_FILES['img']['size'] >  0) {
                $form = $_FILES['img']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img']['name'];
            }

            if (move_uploaded_file($form, PATH_ROOT . $to)) {
                $data['img_thumbnail'] = $to;
            } else {
                $_SESSION['errors']['img'] = 'Không upload được';
                header('Location:' . url('admin/posts/create'));
                exit;
            }

            // Helper::debug($_POST['tag']);
            $this->post->insert($data);
            $lastIdPost = $this->post->getConnection()->lastInsertId();
            // Helper::debug($_POST['tag']);
            // Helper::debug($_POST['tag']);
            $this->tag->insertPostTag($lastIdPost,$_POST['tag']);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url('admin/posts'));
            exit;
        }
    }

    public function show($id)
    {
        $post = $this->post->findByID($id);

        $this->renderViewAdmin("posts.show", [
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        try {
            $auths = $this->auth->all();
            $tags = $this->tag->all();
            $post = $this->post->findByID($id);
            $tagP = $this->pt->selectTagByPostId($id);
           
            if (empty($post)) {
                throw new Exception('Model not found');
            }

            $this->renderViewAdmin("posts.edit", [
                'post' => $post,
                'tags' => $tags,
                'tagP' => $tagP,
                'auths'=> $auths

            ]); 
        } catch (\Throwable $th) {
            echo "404 - NOT FOUND";
            die;
        }
    }

    //UPDATE
    public function update($id)
    {

        $post = $this->post->findByID($id);

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'name'          => 'required',
            'img_thumbnail' => 'uploaded_file:0,2M,png,jpg,jpeg',
            'overview'      => 'max:200',
            'content'       => 'required',
            'auth'          => 'required|max:50',
            'tag'           => 'required',


        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("admin/posts/{$post['id']}/edit"));
            exit();
        } else {
            // validation passes
            $data = [
                'name'          => $_POST['name'],
                'overview'      => $_POST['overview'],
                'content'       => $_POST['content'],
                'auth_id'       => $_POST['auth'],

            ];
            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] >  0) {
                $flagUpload = true;
                $form = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img']['name'];
            }

            if (move_uploaded_file($form, PATH_ROOT . $to)) {
                $data['img_thumbnail'] = $to;
                
            } else {
                $data['img_thumbnail'] == $post['img_thumbnail'];

                $_SESSION['status'] = true;
                $_SESSION['msg'] = "Thao tác thành công";
                // header('Location:' . url("admin/posts/{$post['id']}/edit"));
                // exit;
            }


            
            $this->post->update($id, $data);
            $this->tag->deleteTagByPostId($post['id']);
            $this->tag->insertPostTag($post['id'],$_POST['tag']);
            

            if (
                $flagUpload
                && $post['img_thumbnail']
                && file_exists(PATH_ROOT . $post['img_thumbnail'])
            ) {
                unlink(PATH_ROOT . $post['img_thumbnail']);
            }
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url("admin/posts/"));
            exit;
        }
    }
    public function delete($id)
    {   
        $this->tag->deleteTagByPostId($id);
        $this->post->delete($id);
        header('Location:' . url('admin/posts'));

        exit();
    }
}
