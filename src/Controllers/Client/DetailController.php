<?php

namespace Admin\Xuongoop\Controllers\Client;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Client\Detail;


class DetailController extends Controller
{
    private Detail $detail;

    public function __construct()
    {
        // $this->home = new Home();
        // $this->post = new Post();
        $this->detail = new Detail();
    }
    

    public function productDetail($id)
    {
        $postDetail = $this->detail->findByIdAll($id);
       

        $this->renderViewClient('detail',[
            'postDetail'  => $postDetail
        ]);
        
    }

    
}