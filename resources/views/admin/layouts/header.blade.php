<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
                <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="{{'/admin/' . app()->getLocale() }}"
                                            class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block"><span>Catalog </span><strong>Dashboard</strong>
                        </div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>CD</strong></div>
                    </a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#"
                                            class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Search-->
                {{--                    <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>--}}
                <!-- Notifications-->
                {{--                    <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">12</span></a>--}}
                {{--                        <ul aria-labelledby="notifications" class="dropdown-menu">--}}
                {{--                            <li><a rel="nofollow" href="#" class="dropdown-item">--}}
                {{--                                    <div class="notification">--}}
                {{--                                        <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>--}}
                {{--                                        <div class="notification-time"><small>4 minutes ago</small></div>--}}
                {{--                                    </div></a></li>--}}
                {{--                            <li><a rel="nofollow" href="#" class="dropdown-item">--}}
                {{--                                    <div class="notification">--}}
                {{--                                        <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>--}}
                {{--                                        <div class="notification-time"><small>4 minutes ago</small></div>--}}
                {{--                                    </div></a></li>--}}
                {{--                            <li><a rel="nofollow" href="#" class="dropdown-item">--}}
                {{--                                    <div class="notification">--}}
                {{--                                        <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>--}}
                {{--                                        <div class="notification-time"><small>4 minutes ago</small></div>--}}
                {{--                                    </div></a></li>--}}
                {{--                            <li><a rel="nofollow" href="#" class="dropdown-item">--}}
                {{--                                    <div class="notification">--}}
                {{--                                        <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>--}}
                {{--                                        <div class="notification-time"><small>10 minutes ago</small></div>--}}
                {{--                                    </div></a></li>--}}
                {{--                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                                    <!-- Messages                        -->
                                    <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">{{ \App\Contact::where('read', 1)->count() }}</span></a>
                                        <ul aria-labelledby="notifications" class="dropdown-menu">
                                           @foreach( \App\Contact::where('read', 1)->paginate(4) as $one)
                                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                    <div class="msg-profile"> <img src="/assets/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h3 class="h5">{{ $one->name }}</h3><span>Sent You Message</span>
                                                    </div></a>
                                            </li>
                                            @endforeach
{{--                                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">--}}
{{--                                                    <div class="msg-profile"> <img src="/assets/img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>--}}
{{--                                                    <div class="msg-body">--}}
{{--                                                        <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>--}}
{{--                                                    </div></a>--}}
{{--                                            </li>--}}
{{--                                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">--}}
{{--                                                    <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>--}}
{{--                                                    <div class="msg-body">--}}
{{--                                                        <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>--}}
{{--                                                    </div></a>--}}
{{--                                            </li>--}}
                                            <li>
                                                <a rel="nofollow" href="{{ route('contact.index', app()->getLocale() ) }}" class="dropdown-item all-notifications text-center"> <strong>{{ \App\Attribute::first()->translate(app()->getLocale())->read_all  }}</strong></a>
                                            </li>
                                        </ul>
                                    </li>
                <!-- Languages dropdown    -->


                    <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                     class="nav-link language dropdown-toggle"><img
                                src="{{ (request()->is('admin/en*')) ? '/assets/img/flags/16/GB.png' : '/assets/img/flags/16/GE.png' }}"
                                alt="English"><span class="d-none d-sm-inline-block">Language</span></a>
                        <ul aria-labelledby="languages" class="dropdown-menu">
                            <li><a rel="nofollow" href="/admin/ka" class="dropdown-item"> <img
                                        src="/assets/img/flags/16/GE.png" alt="Georgian" class="mr-2">ქართული</a></li>
                            <li><a rel="nofollow" href="/admin/en" class="dropdown-item"> <img
                                        src="/assets/img/flags/16/GB.png" alt="English" class="mr-2">English</a></li>
                        </ul>
                    </li>
                    <!-- Logout    -->
                    <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                            class="nav-link logout"> <span
                                class="d-none d-sm-inline">{{ __('logout') }}</span><i class="fa fa-sign-out"></i></a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="/assets/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h4">{{ auth()->user()->name }}</h1>
                <p>Catalog Admin</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="{{ (request()->is('admin/' . app()->getLocale() )) ? 'active' : '' }}"><a
                    href="{{ route('dashboard', app()->getLocale() ) }}"> <i class="icon-home"></i>{{ \App\Attribute::first()->translate(app()->getLocale())->admin_nav_item_home  }}</a></li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/attribute*')) ? 'active' : '' }}"><a
                    href="{{ route('attribute.index', app()->getLocale() ) }}"> <i class="icon-screen"></i>{{ \App\Attribute::first()->translate(app()->getLocale())->admin_nav_item_mainAttributes  }}</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/category*')) ? 'active' : '' }}
            {{(request()->is('admin/'. app()->getLocale() .'/sub-category*')) ? 'active' : ''}}"><a
                    href="{{ route('category.index', app()->getLocale() ) }}"> <i class="icon-interface-windows"></i>{{ \App\Attribute::first()->translate(app()->getLocale())->admin_nav_item_categories  }}</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/product*')) ? 'active' : '' }}"><a
                    href="{{ route('product.index', app()->getLocale() ) }}"> <i class="icon-interface-windows"></i>{{ \App\Attribute::first()->translate(app()->getLocale())->admin_nav_item_products  }}</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/contact*')) ? 'active' : '' }} "><a
                    href="{{ route('contact.index', app()->getLocale() ) }}"> <i class="icon-mail"></i>{{ \App\Attribute::first()->translate(app()->getLocale())->admin_nav_item_messages  }}</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/about*')) ? 'active' : '' }}"><a
                    href="{{ route('about.index', app()->getLocale() ) }}"> <i class="icon-padnote"></i>About</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/slide*')) ? 'active' : '' }}"><a
                    href="{{ route('slide.index', app()->getLocale() ) }}"> <i class="icon-picture"></i>Slides</a>
            </li>
            <li class="{{ (request()->is('admin/'. app()->getLocale() .'/partner*')) ? 'active' : '' }}"><a
                    href="{{ route('partner.index', app()->getLocale() ) }}"> <i class="icon-picture"></i>Partners</a>
            </li>
{{--            <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>--}}
{{--            <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>--}}
{{--            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i--}}
{{--                        class="icon-interface-windows"></i>Example dropdown </a>--}}
{{--                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">--}}
{{--                    <li><a href="#">Page</a></li>--}}
{{--                    <li><a href="#">Page</a></li>--}}
{{--                    <li><a href="#">Page</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page </a></li>--}}
        </ul>
{{--        <span class="heading">Extras</span>--}}
{{--        <ul class="list-unstyled">--}}
{{--            <li><a href="#"> <i class="icon-flask"></i>Demo </a></li>--}}
{{--            <li><a href="#"> <i class="icon-screen"></i>Demo </a></li>--}}
{{--            <li><a href="#"> <i class="icon-mail"></i>Demo </a></li>--}}
{{--            <li><a href="#"> <i class="icon-picture"></i>Demo </a></li>--}}
{{--        </ul>--}}
    </nav>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
        </header>



