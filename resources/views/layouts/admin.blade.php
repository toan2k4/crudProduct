@include('admins.blocks.header')
@include('admins.blocks.boxleft')

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('admins.blocks.topbar')
        @yield('content')
        @include('admins.blocks.footer')
