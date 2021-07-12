<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<!-- Nucleo Icons -->
<link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<!-- CSS Files -->
<link href="{{asset('assets/css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
@if(app()->getLocale() == 'ar')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet" />
@endif
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
@yield('style')
