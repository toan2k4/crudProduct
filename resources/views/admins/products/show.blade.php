@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết Sản Phẩm</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Mã Sản Phẩm</label>
                                        <input type="text" name="ma_san_pham" value="{{ $data->ma_san_pham }}"
                                            class="form-control"disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                        <input type="text" name="ten_san_pham" value="{{ $data->ten_san_pham }}"
                                            class="form-control"disabled>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Số Lượng Sản
                                            Phẩm</label>
                                        <input type="number" name="so_luong" value="{{ $data->so_luong }}"
                                            class="form-control" min="0" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Giá Sản Phẩm</label>
                                        <input type="number" name="gia" value="{{ $data->gia }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Ảnh Sản Phẩm</label>
                                    <div class="input-group mb-3">
                                        <img src="{{ Storage::url($data->hinh_anh) }}" width="200" alt="Ảnh sản phẩm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text">Mô tả</span>
                                            <textarea class="form-control" disabled name="mo_ta" aria-label="With textarea">{{ $data->mo_ta }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1">Trạng thái</label><select
                                            class="form-control" id="exampleFormControlSelect1" name="trang_thai" disabled>
                                            <option {{ $data->trang_thai == '1' ? 'selected' : '' }} value="1">
                                                Active</option>
                                            <option {{ $data->trang_thai == '0' ? 'selected' : '' }} value="0">
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Ngày sản xuất</label>
                                        <input type="date" name="ngay_san_xuat" value="{{ $data->ngay_san_xuat }}"
                                            class="form-control" id="inputGroupFile02" disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1">Danh Mục</label><select class="form-control"
                                            id="exampleFormControlSelect1" name="danh_muc_id" disabled>
                                            <option>--Chọn danh mục--</option>
                                            @foreach ($danhMucs as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $data->danh_muc_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->ten_danh_muc }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary" href="{{ route('sanphams.index') }}">Danh Sách Sản Phẩm</a>
                        </div>

                </div>
                </table>
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
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

    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
