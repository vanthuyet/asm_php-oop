<?php

namespace Admin\Xuongoop\Controllers\Client;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Client\Home;
use Admin\Xuongoop\Models\Client\Post;
use Exception;
use Throwable;

class HomeController extends Controller
{

    private Home $home;
    private Post $post;

    public function __construct()
    {
        $this->home = new Home();
        $this->post = new Post();
    }
    
    public function index()
    {
        try{

        [$posts,$totalPage] = $this->post->paginatePostC($_GET['page'] ?? 1);
        [$ThPro, $totalPage] = $this->post->getThreeP();
        [$OneP, $totalPage] = $this->post->getOneP();
        $tags = $this->home->selectAllTag();
        
       
       
            
        $this->renderViewClient('home',[
            'tags'      => $tags,
            'posts'     => $posts,
            'totalPage' => $totalPage,
            'ThPro'     => $ThPro,
            'OneP'      => $OneP
            
            
            // 'post' => $post,
            
        ]);
    }catch( Exception $e){
        echo $e;
    }
        
    }

    
    
}
