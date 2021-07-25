<!DOCTYPE html>
<html dir="{{session('dir')}}" lang="{{app()->getLocale()}}">

<head>

    @include('admin.includes.meta')

    @include('admin.includes.styles')

</head>

<body class="{{session('dir')}}">
<div class="wrapper">
    <div class="main-panel">
        <div class="mt-5">
            @yield('content')
        </div>
    </div>
</div>

@include('admin.includes.scripts')

</body>
</html>
