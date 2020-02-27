<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Quản Trị')</title>
    <!-- plugins:css -->
    @include('layouts.admin_link')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('layouts.admin_navbar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_settings-panel.html -->
            @include('layouts.admin_theme_setting')
            @include('layouts.admin_sitebar')
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('layouts.admin_footer')
        </div>
    </div>
</div>

<!-- script -->
@include('layouts.admin_scripts')
<!-- End script-->
</body>
@yield('scripts')
</html>
