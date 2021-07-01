<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.includes.meta')

    @include('admin.includes.styles')

</head>

<body class="">
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

    @include('admin.includes.settings')

    @include('admin.includes.scripts')
</body>
</html>
