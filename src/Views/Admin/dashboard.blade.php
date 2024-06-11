@extends('layouts.master')

@section('title')
    Dashboard
    
@endsection


@section('content')
<a href="{{ url("")}}"></a>
<div class="row">
    <div class="col-12">
        <div class="page_title_box d-flex align-items-center justify-content-between">
            <div class="page_title_left">
                <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>
            <a href="#" class="white_btn3">Create Report</a>
        </div>
    </div>
</div>
<div class="row ">
    
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Thống kê</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dashboard_breadcam text-end">
                                    <p><a href="index-2.html">Thống kê</a> <i class="fas fa-caret-right"></i> Chart
                                        Box</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg bg-primary"></div>
                            <i class="ti-user text-primary"></i>
                        </div>
                        <div class="widget-numbers"><span>{{ $userC }}</span></div>
                        <div class="widget-subheading">Users</div>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg bg-danger"></div>
                            <i class="ti-layout-list-post text-danger"></i>
                        </div>
                        <div class="widget-numbers"><span>{{$postC}}</span></div>
                        <div class="widget-subheading">Bài viết</div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg bg-info"></div>
                            <i class="ti-tag text-info"></i>
                        </div>
                        <div class="widget-numbers"><span>{{$tagC}}</span></div>
                        <div class="widget-subheading">Tags</div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <div class="icon-wrapper rounded-circle">
                            <div class=" bg-focus"></div>
                            <div class="center-svg">
                                <i class="ti-user bg-success   ">
                                </i>
                            </div>
                        </div>
                        <div class="widget-numbers"><span>{{ $authC}}</span></div>
                        <div class="widget-subheading">Authors</div>
                        
                    </div>

            </div>
        </div>
    </div>
    {{--  --}}
</div>
    
@endsection