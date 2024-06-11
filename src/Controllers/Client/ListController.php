<?php

namespace Admin\Xuongoop\Controllers\Client;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Client\Post;


class  ListController extends Controller
{
    private Post $post;

    public function __construct()
    {
        
        $this->post = new Post();
    }
    public function list() {

        [$posts,$totalPage] = $this->post->paginatePostC($_GET['page'] ?? 1);

      

        $this->renderViewClient(__FUNCTION__,[
            'posts'      => $posts,
            'totalPage'  => $totalPage
        ]);
    }

    
}