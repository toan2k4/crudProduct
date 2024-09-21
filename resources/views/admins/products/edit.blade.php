@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="col-sm-12">
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                            <input type="text" name="ten_san_pham"
                                                class="form-control @error('ten_san_pham') is-invalid @enderror"
                                                placeholder="">
                                            @error('ten_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Số Lượng Sản
                                                Phẩm</label>
                                            <input type="number" name="so_luong"
                                                class="form-control @error('so_luong') is-invalid @enderror" min="0"
                                                placeholder="">
                                            @error('so_luong')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Giá Sản Phẩm</label>
                                            <input type="number" name="gia"
                                                class="form-control @error('gia') is-invalid @enderror" placeholder="">

                                            @error('gia')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">Sản Phẩm Thường</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Sản Phẩm Có Biến
                                                Thể</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab" tabindex="0">...</div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-8">
                                        <label for="exampleFormControlInput1" class="form-label">Ảnh Sản Phẩm</label>
                                        <div class="input-group mb-3">
                                            <input type="file" accept="image/*" name="hinh_anh"
                                                class="form-control @error('hinh_anh') is-invalid @enderror"
                                                id="inputGroupFile02" onchange="showImage(event)">
                                            @error('hinh_anh')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <img id="image_san_pham" src="" alt="Lỗi"
                                                style="height: 100;display: none;">
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Mô tả</span>
                                                <textarea class="form-control  @error('mo_ta') is-invalid @enderror" name="mo_ta" aria-label="With textarea"></textarea>
                                                @error('mo_ta')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    {{-- <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Trạng thái</label><select
                                                class="form-control @error('trang_thai') is-invalid @enderror"
                                                id="exampleFormControlSelect1" name="trang_thai">
                                                <option value="">--Chọn trạng thái</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('trang_thai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Ngày sản xuất</label>
                                            <input type="date" name="ngay_san_xuat"
                                                class="form-control @error('ngay_san_xuat') is-invalid @enderror"
                                                id="inputGroupFile02">
                                            @error('ngay_san_xuat')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Danh Mục</label><select
                                                class="form-control @error('danh_muc_id') is-invalid @enderror"
                                                id="exampleFormControlSelect1" name="danh_muc_id">
                                                <option>--Chọn danh mục--</option>
                                                {{-- @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                                @endforeach --}}

                                            </select>
                                            @error('danh_muc_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a class="btn btn-primary" href="{{ route('product.index') }}">Danh Sách Sản Phẩm</a>
                        </div>
                        </form>
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
<script>
    function showImage(event) {
        const image_san_pham = document.getElementById('image_san_pham');

        const file = event.target.files[0];

        const render = new FileReader();

        render.onload = function() {
            image_san_pham.src = render.result;
            image_san_pham.style.display = 'block';
        }

        if (file) {
            render.readAsDataURL(file);
        }
    }
</script>
