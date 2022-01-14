<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Royal Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
        <link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">

        <link rel="stylesheet" href="royal-master/css/bootstrap.css">
        <link rel="stylesheet" href="royal-master/vendors/linericon/style.css">
        <link rel="stylesheet" href="royal-master/css/font-awesome.min.css">
        <link rel="stylesheet" href="royal-master/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="royal-master/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="royal-master/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="royal-master/vendors/owl-carousel/owl.carousel.min.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- main css -->
        <link rel="stylesheet" href="royal-master/css/style.css">
        <link rel="stylesheet" href="royal-master/css/detail.css">
        <link rel="stylesheet" href="royal-master/css/responsive.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">


        <base href="{{asset('')}}"></base>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
        <link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
        <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
        <link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
        <link rel="stylesheet" href="source/assets/dest/css/animate.css">
        <link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    </head>
    <body>
   
        @include('header')


        <div class="rev-slider">
            @yield('content')
        </div>

        @include('footer')

        @include('script')
   
    </body>
</html>