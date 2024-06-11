@extends('layouts.master')

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <section class="section-sm">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="col-12 mb-5 mb-lg-0">
                        <h2 class="h5 section-title pt-3">Danh sách post</h2>
                        <div class="row">
                            @foreach ($posts as $item)
                                <div class="col-lg-4 col-sm-6">
                                    <article class="card mb-4">
                                        <div class="post-slider slider-sm">
                                            <img src="{{ asset($item['img_thumbnail']) }}" class="card-img-top "
                                                style="max-height:250px" alt="post-thumb">
                                            <img src="{{ asset($item['img_thumbnail']) }}" class="card-img-top"
                                                style="max-height:250px" alt="post-thumb">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="h4 mb-3"><a class="post-title"
                                                    href="post/elements/">{{ $item['name'] }}</a></h3>
                                            <ul class="card-meta list-inline">
                                                <li class="list-inline-item">
                                                    <a href="author-single.html" class="card-meta-author">
                                                        <img src="{{ asset('assets/client/images/john-doe.jpg') }}"
                                                            alt="John Doe">
                                                        <span>{{ $item['auth_name'] }}</span>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="ti-timer"></i>3 Min To Read
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="ti-calendar"></i>{{ $item['created_at'] }}
                                                </li>
                                                <li class="list-inline-item">
                                                    <ul class="card-meta-tag list-inline">

                                                        <li class="list-inline-item"><a
                                                                href="tags.html">{{ $item['tag_names'] }}</a></li>

                                                    </ul>
                                                </li>
                                            </ul>
                                            <p>{!! $item['overview'] !!}</p>
                                            <a href="{{ url("post-detail/{$item['id']}")}}" class="btn btn-outline-primary">Read More</a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="pagination justify-content-center">
                                                  
            @if (!isset($_GET['page']))
                {{$_GET['page'] = 1}} 
            @endif
            @if (isset($_GET['page']) && $_GET['page'] == 1   )
                      
                 <a href="{{ url('list?page=1')}}" class="page-link">1</a>               
                 <a href="{{ url('list?page=' . $_GET['page'] + 1 ) }}" class="page-link">></a>
            @endif

            @if (isset($_GET['page']) && $_GET['page'] < $totalPage && $_GET['page'] > 1  )
                <a href="{{ url('list?page=' . $_GET['page'] - 1) }}" class="page-link"><</a>
                <a href="" class="page-link">{{$_GET['page']}}</a>               
                <a href="{{ url('list?page=' . $_GET['page'] +1 ) }}" class="page-link">></a>
            @endif

            @if (isset($_GET['page']) && $_GET['page'] == $totalPage && $_GET['page'] != 1 )
                <a href="{{ url('list?page=' . $_GET['page'] - 1) }}" class="page-link"><</a>
                <a href="" class="page-link">{{$_GET['page']}}</a>               
                
            @endif
            @if (isset($_GET['page']) && $_GET['page'] > $totalPage )
            <a href="{{ url('list?page=' . $_GET['page'] - 1) }}" class="page-link"><</a>
            @endif
         
             </li>
           
         </ul>
    </section>
@endsection
