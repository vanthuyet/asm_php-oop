<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{ asset('assets/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="{{ url('admin')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            
        </li>
        <li class>
            <a class="" href="{{ url('admin/users')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/15.svg') }}" alt>
                </div>
                <span>Users</span>
            </a>
        
        </li>
        <li class>
            <a class="" href="{{ url('admin/tags')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/6.svg') }}" alt>
                </div>
                <span>Tags</span>
            </a>
            
        </li>
        <li class>
            <a class="" href="{{ url('admin/posts')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/4.svg') }}" alt>
                </div>
                <span>Post</span>
            </a>
            
        </li>
        <li class>
            <a href="{{ url('admin/authors')}}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/6.svg') }}" alt>
                </div>
                <span>Authors</span>
            </a>
        </li>
        
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('assets/admin/img/menu-icon/13.svg') }}" alt>
                </div>
                <span>Charts</span>
            </a>
            <ul>
                <li><a href="chartjs.html">ChartJS</a></li>
                <li><a href="apex_chart.html">Apex Charts</a></li>
                <li><a href="chart_sparkline.html">Chart sparkline</a></li>
                <li><a href="am_chart.html">am-charts</a></li>
                <li><a href="nvd3_charts.html">nvd3 charts.</a></li>
            </ul>
        </li>
        
    </ul>
</nav>
