@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thêm Danh Mục</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="col-sm-8">
                            <form action="{{route('category.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tên Danh Mục</label>
                                            <input type="text" value="{{ $data->ten_danh_muc }}" name="name"
                                            class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Trạng thái</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="trang_thai">
                                                <option value="active" <?= $data->trang_thai == 'active' ? 'selected' : '' ?>>
                                                    active</option>
                                                <option value="inactive"
                                                    <?= $data->trang_thai == 'inactive' ? 'selected' : '' ?>>inactive</option>
                                                <option value="pending" <?= $data->trang_thai == 'pending' ? 'selected' : '' ?>>
                                                    pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <a class="btn btn-primary" href="{{route('category.index')}}">Danh Sách Danh Mục</a>
                                </div>
                            </form>
                        </div>
                    </table>
                    <div class="">
                    @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif</div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
