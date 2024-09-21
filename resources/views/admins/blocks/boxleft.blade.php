<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Danh Mục</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Category:</h6>
                        <a class="collapse-item" href="{{route('category.create')}}">Thêm Danh Mục</a>
                        <a class="collapse-item" href="{{route('category.index')}}">Danh Sách Danh Mục</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Sản Phẩm</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Product:</h6>
                        <a class="collapse-item" href="{{route('product.create')}}">Thêm Sản Phẩm</a>
                        <a class="collapse-item" href="{{route('product.index')}}">Danh Sách Sản Phẩm</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Thuộc Tính</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Product:</h6>
                        {{-- <a class="collapse-item" href="{{route('product.create')}}">Thêm Sản Phẩm</a> --}}
                        <a class="collapse-item" href="{{route('attribute.index')}}">Danh Sách Thuộc Tính</a>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapseOne">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Đơn Hàng</span>
                </a>
                <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Order:</h6>
                        <a class="collapse-item" href="{{route('donhangs.index')}}">Danh Sách Đơn Hàng</a>
                    </div>
                </div>
            </li> --}}
            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                    <!-- <i class="fas fa-fw fa-wrench"></i> -->
                    <span>User</span>
                </a>
                <div id="collapsethree" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom User:</h6>
                        <a class="collapse-item" href="{{route('user')}}">Danh Sách Người Dùng</a>
                    </div>
                </div>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->