

<html>

<body>
<div class="top_header">
    <div class="header">
        <ul class="contact_info">
            <li>
                <a href="#"><i class="fa fa-envelope-o"></i>{{ $info->email ?? ''}}</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-mobile"></i>{{ $info->phone ?? ''}}</a>
            </li>
        </ul>
        <div class="right_side">

            <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#"
                                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                             class="nav-link language dropdown-toggle"><img
                        src="{{ (request()->is('home/en*')) ? '/assets/img/flags/16/GB.png' : '/assets/img/flags/16/GE.png' }}"
                        alt="English"><span class="d-none d-sm-inline-block">Language</span></a>
                <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="/home/ka" class="dropdown-item "> <img
                                src="/assets/img/flags/16/GE.png" alt="Georgian" class="mr-2">ქართული</a></li>
                    <li><a rel="nofollow" href="/home/en" class="dropdown-item"> <img
                                src="/assets/img/flags/16/GB.png" alt="English" class="mr-2">English</a></li>
                </ul>
            </li>

            <a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a>
        </div>
    </div>
</div>
<!-- top_header and -->
<!-- header_menu -->
<header>
    <div class="logo">
        <a href="{{ '/home/' . $locale }}">
            <img src="/images/info/{{ $info->logo ?? ''}}" alt="logo" title="Design Studio"></a>
        <h1 class="company_title">Design Studio</h1>
    </div>
    <nav id="menu" class="header_menu">
        <ul class="header_navigation">
            <li class="header_link"><a href="{{ '/home/' . $locale }}">{{ $attribute->translate($locale)->web_nav_item_home }}</a></li>
            <li class="header_link"><a href="{{ '/catalog/' . $locale }}">{{ $attribute->translate($locale)->web_nav_item_catalog }}</a></li>
            <li class="header_link"><a href="{{ '/about/' . $locale }}">{{ $attribute->translate($locale)->web_nav_item_about }}</a></li>
            <li class="header_link"><a href="{{ '/contact/' . $locale }}">{{ $attribute->translate($locale)->web_nav_item_contact }}</a></li>
        </ul>
    </nav>
    <ul class="resp_menu">
        <li class="toggler_item"></li>
    </ul>
</header>
@yield('content')

</body>
</html>
