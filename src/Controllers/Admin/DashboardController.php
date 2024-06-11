<?php

namespace Admin\Xuongoop\Controllers\Admin;

use Admin\Xuongoop\Commons\Controller;
use Admin\Xuongoop\Commons\Helper;
use Admin\Xuongoop\Models\Admin\Dashboard;

class DashboardController extends Controller
{
    private Dashboard $das;

    public function __construct()
    {
        $this->das = new Dashboard();
    }
    public function dashboard(){
        $postCount = $this->das->count();
        $userCount = $this->das->countUser();
        $tagCount  = $this->das->countTag();
        $authCount  = $this->das->countAuthor();


        // Helper::debug($userCount);

        $this->renderViewAdmin(__FUNCTION__,[
            'postC'  => $postCount,
            'userC'  => $userCount,
            'tagC'   => $tagCount,
            'authC'  => $authCount
        ]);
    }
}