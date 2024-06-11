@extends('layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="banner text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h1 class="mb-5">Welcom to my page <br> {{ $user['name'] }}</h1>



                    <ul class="list-inline widget-list-inline">
                        @foreach ($tags as $tag)
                            <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>


        <svg class="banner-shape-1" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>

        <svg class="banner-shape-2" width="39" height="39" viewBox="0 0 39 39" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d)">
                <path class="path"
                    d="M24.1587 21.5623C30.02 21.3764 34.6209 16.4742 34.435 10.6128C34.2491 4.75147 29.3468 0.1506 23.4855 0.336498C17.6241 0.522396 13.0233 5.42466 13.2092 11.286C13.3951 17.1474 18.2973 21.7482 24.1587 21.5623Z" />
                <path
                    d="M5.64626 20.0297C11.1568 19.9267 15.7407 24.2062 16.0362 29.6855L24.631 29.4616L24.1476 10.8081L5.41797 11.296L5.64626 20.0297Z"
                    stroke="#040306" stroke-miterlimit="10" />
            </g>
            <defs>
                <filter id="filter0_d" x="0.905273" y="0" width="37.8663" height="38.1979" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                </filter>
            </defs>
        </svg>


        <svg class="banner-shape-3" width="39" height="40" viewBox="0 0 39 40" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M0.965848 20.6397L0.943848 38.3906L18.6947 38.4126L18.7167 20.6617L0.965848 20.6397Z" stroke="#040306"
                stroke-miterlimit="10" />
            <path class="path" d="M10.4966 11.1283L10.4746 28.8792L28.2255 28.9012L28.2475 11.1503L10.4966 11.1283Z" />
            <path d="M20.0078 1.62949L19.9858 19.3804L37.7367 19.4024L37.7587 1.65149L20.0078 1.62949Z" stroke="#040306"
                stroke-miterlimit="10" />
        </svg>


        <svg class="banner-border" height="240" viewBox="0 0 2202 240" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 123.043C67.2858 167.865 259.022 257.325 549.762 188.784C764.181 125.427 967.75 112.601 1200.42 169.707C1347.76 205.869 1901.91 374.562 2201 1"
                stroke-width="2" />
        </svg>
    </div>
    <!-- end of banner -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">


                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Editors Pick</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img style="max-height:auto" src="{{ asset($OneP['img_thumbnail']) }}" class="card-img-top"
                                alt="">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{ $OneP['name'] }}</a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ asset('assets/client/images/john-doe.jpg') }}">
                                        <span>{{ $OneP['auth_name'] }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $OneP['created_at'] }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">

                                        <li class="list-inline-item">
                                            <a href="tags.html">{{ $OneP['tag_names'] }}</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                            <p>{{ $OneP['overview'] }}</p>
                            <a href="{{ url("post-detail/{$OneP['id']}")}}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>

                </div>
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Trending Post</h2>
                    @foreach ($ThPro as $item)
                        <article class="card mb-4">
                            <div class="card-body d-flex">
                                <img class="card-img-sm" src="{{ asset($item['img_thumbnail']) }}">
                                <div class="ml-3">
                                    <h4><a href="post-details.html" class="post-title">{{ $item['name'] }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>{{ $item['created_at'] }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-timer"></i>2 Min To Read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach


                </div>

                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Popular Post</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img style="max-height:auto" src="{{ asset($OneP['img_thumbnail']) }}" class="card-img-top"
                                alt="">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">{{ $OneP['name'] }}</a>
                            </h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ asset('assets/client/images/john-doe.jpg') }}">
                                        <span>{{ $OneP['auth_name'] }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $OneP['created_at'] }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">

                                        <li class="list-inline-item"><a href="tags.html">{{ $OneP['tag_names'] }}</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                            <p>{{ $OneP['overview'] }}</p>
                            <a href="{{ url("post-detail/{$OneP['id']}")}}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">


                <div class="col-lg-8  mb-5 mb-lg-0">

                    <h2 class="h5 section-title">Bài viết</h2>
                    <div class=" row">
                      
                        @foreach ($posts as $item)
                        <div class="col-lg-6 col-sm-6">
                            <article class="card mb-4 ">
                                <div class="post-slider slider-sm">
                                    <img style="max-height:300px" src="{{ asset($item['img_thumbnail']) }}"
                                        class="card-img-top" alt="post-thumb">
                                    <img style="max-height:300px" src="{{ asset($item['img_thumbnail']) }}"
                                        class="card-img-top" alt="post-thumb">
                                </div>
                                <div class="card-body">
                                    <h3 class="mb-3"><a class="post-title"
                                            href="post-elements.html">{{ $item['name'] }}</a></h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <a href="author-single.html" class="card-meta-author">
                                                <img src="{{ asset('assets/client/images/john-doe.jpg') }}" alt="John Doe">
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
                                                <li class="list-inline-item"><a href="tags.html">{{ $item['tag_names'] }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>{{ $item['overview'] }}</p>
                                    <a href="{{ url("post-detail/{$item['id']}")}}" class="btn btn-outline-primary">Read More</a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>

                    {{-- <article class="card mb-4">
                        <div class="post-slider">
                            <img src="{{ asset('assets/client/images/post/post-3.jpg') }}" class="card-img-top"
                                alt="post-thumb">
                        </div>
                        <div class="card-body">
                            <h3 class="mb-3"><a class="post-title" href="post-details.html">Advice From a Twenty
                                    Something</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ asset('assets/client/images/john-doe.jpg') }}">
                                        <span>Mark Dinn</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>14 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">Decorate</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Creative</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <p>It’s no secret that the digital industry is booming. From exciting startups to global
                                brands, companies are reaching out to digital agencies, responding to the new
                                possibilities available.</p>
                            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </article> --}}




                </div>


                <aside class="col-lg-4 sidebar-home">
                    <!-- Search -->

                    <!-- authors -->
                    <div class="widget widget-author">
                        <h4 class="widget-title">Tác giả</h4>
                        @foreach ($posts as $item)
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img class="widget-author-image" src="{{ asset($item['img_thumbnail']) }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="post-title"
                                            href="author-single.html">{{ $item['auth_name'] }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Search -->

                    {{-- <div class="widget">
                        <h4 class="widget-title"><span>Never Miss A News</span></h4>
                        <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank"
                            class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                placeholder="Your Email Address">
                            <i class="ti-email"></i>
                            <button type="submit" class="btn btn-primary btn-block" name="subscribe">Subscribe
                                now</button>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                            </div>
                        </form>
                    </div> --}}

                    <!-- categories -->
                    <!-- tags -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            @foreach ($tags as $tag)
                                <li class="list-inline-item"><a href="tags.html">{{ $tag['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Bài viết hiện tại</h4>

                        <!-- post-item -->
                        @foreach ($ThPro as $item)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="{{ asset($item['img_thumbnail']) }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title" href="post/elements/">{{ $item['name'] }}</a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i>{{ $item['created_at'] }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Social Links</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
