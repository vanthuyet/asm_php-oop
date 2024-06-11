<?php

namespace Admin\Xuongoop\Controllers\Admin;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Admin\Auth;
use Admin\Xuongoop\Models\Admin\Posts;
use Exception;
use Rakit\Validation\Validator;

class AuthController extends Controller
{
    private Auth  $auth;
    private Posts $post;

    public function __construct()
    {
        $this->auth = new Auth();
        $this->post = new Posts();
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
            [$auths, $totalPage] = $this->auth->paginate($_GET['page'] ?? 1);
            // $totalPage = $this->auth->count();
            $this->renderViewAdmin('auth.index', [
                "auths"     =>   $auths,
                "totalPage" =>   $totalPage
            ]);
            // }
        } catch (Exception $e) {
            Helper::debug($e);
        }
    }

    public function create()
    {
        $this->renderViewAdmin("auth.create",);
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

            header('Location:' . url("/admin/authors/create"));
            exit();
        } else {
            // validation passes

            $data = [
                'name'                  => $_POST['name'],
                
            ];


            $this->auth->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url('admin/authors'));
            exit;
        }
    }

    public function show($id)
    {
        $auth = $this->auth->findByID($id);

        $this->renderViewAdmin("auth.show", [
            'auth' => $auth
        ]);
    }

    public function edit($id)
    {
        try {
            $auth = $this->auth->findByID($id);

            if (empty($auth)) {
                throw new Exception('Model not found');
            }

            $this->renderViewAdmin("auth.edit", [
                'auth' => $auth,

            ]);
        } catch (\Throwable $th) {
            echo "404 - NOT FOUND";
            die;
        }
    }
    public function update($id)
    {

        $auth = $this->auth->findByID($id);

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            
            
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // handling errors
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location:' . url("admin/authors/{$auth['id']}/edit"));
            exit();
        } else {
            // validation passes



            $data = [
                'name'   => $_POST['name'],
                
            ];

            

            $this->auth->update($id, $data);
            

            $_SESSION['status'] = true;
            $_SESSION['msg'] = "Thao tác thành công";

            header('Location:' . url("admin/authors/{$auth['id']}/edit"));
            exit;
        }
    }
    public function delete($id)
    {
    
        $this->post->deletePostByAuth($id);
        $this->auth->delete($id);
        header('Location:' . url('admin/authors'));

        exit();
    }
}
