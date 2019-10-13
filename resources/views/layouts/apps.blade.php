<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="{{ $info->description ?? ''}}"/>
    <meta name="keywords" content="{{ $info->meta_words ?? '' }}"/>
    <meta name="author" content="ქეთი ხეცურიანი"/>
    <meta property="og:title" content="{{ $info->title ?? '' }}"/>
    <meta property="og:description" content="{{ $info->description ?? '' }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content="{{ $info->banner ?? '' }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="/public/images/{{ $info->favicon ?? '' }} " type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="/assets/css/style.css"/>


    <title>{{ $info->title ?? '' }}</title>
</head>
<body>

@yield('content')

</body>
</html>
