<!DOCTYPE html>
<html dir="{{session('dir')}}" lang="{{app()->getLocale()}}">

<head>

    @include('admin.includes.meta')

    @include('admin.includes.styles')

    @livewireStyles

</head>

<body class="{{session('dir')}}">
    <div class="wrapper">

        @include('admin.includes.sidebar')

        <div class="main-panel">

            @include('admin.includes.nav')

            <div class="content">

                @yield('content')

            </div>

            @include('admin.includes.footer')

        </div>
    </div>

    @include('admin.includes.scripts')

    @include('sweetalert::alert')

    @livewireScripts
</body>
</html>
