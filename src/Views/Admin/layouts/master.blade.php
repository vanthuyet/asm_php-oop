<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.2/tinymce.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.2/tinymce.min.js" integrity="sha512-2T0G/zn88pKqnmUStXKW0BSPIW3Y2sky5Bl6HER5TwPGqCsLTVzAQRZMum/ptf5mRwYylP1lcvnLkgn6chASuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('layouts.partials.head')
    
</head>

<body class="crm_body_bg ">


    @include('layouts.partials.nav')

    <section class="main_content dashboard_part large_header_bg ">

        
        @include('layouts.partials.topbar')

        <div class="main_content_iner overly_inner bg-body ">
            <div class="container-fluid p-0  ">
                <h2>@yield('title')</h2>

                @yield('content')

            </div>
        </div>

        @include('layouts.partials.footer')
    </section>


    

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @include('layouts.partials.script')
    @yield('area')

</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:24:00 GMT -->

</html>
