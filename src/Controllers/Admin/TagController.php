<?php

namespace Admin\Xuongoop\Controllers\Admin;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Admin\Tags;
use Exception;
use Rakit\Validation\Validator;

class TagController extends Controller
{
    private Tags  $tag;

    public function __construct()
    {
        $this->tag = new Tags();
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
            [$tags, $totalPage] = $this->tag->paginateTag($_GET['page'] ?? 1);
            // $totalPage = $this->tag->count();
            $this->renderViewAdmin('tags.index', [
                "tags"     =>   $tags,
                "totalPage" =>   $totalPage
            ]);
            // }
        } catch (Exception $e) {
            Helper::debug($e);
        }
    }

    public function create()
    {
        $this->renderViewAdmin("tags.create",);
    }
    public function store()
    {
        $validator = new Validator;

        $validation = $validator->validate($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            
            
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("/admin/tags/create"));
            exit();
        } else {
            // validation passes

            $data = [
                'name'                  => $_POST['name'],
                
            ];


            $this->tag->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url('admin/tags'));
            exit;
        }
    }

    public function show($id)
    {
        $tag = $this->tag->findByID($id);

        $this->renderViewAdmin("tags.show", [
            'tag' => $tag
        ]);
    }

    public function edit($id)
    {
        try {
            $tags = $this->tag->findByID($id);

            if (empty($tags)) {
                throw new Exception('Model not found');
            }

            $this->renderViewAdmin("tags.edit", [
                'tags' => $tags,

            ]);
        } catch (\Throwable $th) {
            echo "404 - NOT FOUND";
            die;
        }
    }
    public function update($id)
    {

        $tags = $this->tag->findByID($id);

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            
            
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("admin/tags/{$tags['id']}/edit"));
            exit();
        } else {
            // validation passes



            $data = [
                'name'   => $_POST['name'],
                
            ];

            

            $this->tag->update($id, $data);
            

            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url("admin/tags/{$tags['id']}/edit"));
            exit;
        }
    }
    public function delete($id)
    {
        $tag = $this->tag->findByID($id);

        

        
        $this->tag->deleteTag($tag['id']);
        header('Location:' . url('admin/tags'));
        exit();
    }
}
