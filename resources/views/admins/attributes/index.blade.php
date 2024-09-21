@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Attribute</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thêm Thuộc Tính</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <div class="col-sm-8">
                                    <form action="{{ route('attribute.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Tên Thuộc
                                                        Tính</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="abcxyz">

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary">Tạo</button>
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <a class="btn btn-primary" href="{{ route('attribute.index') }}">Danh Sách Thuộc
                                                Tính
                                            </a>
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
            <div class="col"> <div class="row">
                <!-- Page Heading -->
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Thuộc Tính</h1>
                </div>
                <div class="col-3">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
    
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
    
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Thuộc Tính</h6>
    
    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Thuộc Tính</th>
                                        <th style="text-align: center;">Giá trị thuộc tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attributes as $key => $attribute)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
    
                                                {{ $attribute->name }} <br>
                                                <form action="{{ route('attribute.destroy', $attribute->id) }}" method="POST"
                                                    onsubmit="return confirm('Bạn có muốn xóa Danh Mục này không?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group me-2" role="group" aria-label="First group">
                                                        <button type="submit" class="btn btn-outline-danger"><i
                                                                class="fas fa-trash text-danger"></i></button>
    
                                                </form>
                                                <a href="{{ route('attribute.edit', $attribute->id) }}"
                                                    class="btn btn-outline-warning"><i class="fas fa-edit text-warning"></i></a>
                                            </td>
                                            <td class="">
                                                <form action="{{ route('attributeItem.index') }}" method="GET">
                                                    @csrf
                                                    <div class="btn-group me-4" role="group" aria-label="First group">
                                                        <input type="hidden" name="idThuocTinh" id=""
                                                            value="{{ $attribute->id }}">
                                                        <button type="submit" class="btn btn-outline-info">Add value</button>
                                                    </div>
                                                </form>
                                                {{-- <a href="{{ route('attributeItem.index', $attribute->id) }}"
                                                class="btn btn-outline-info">Add value</a> --}}
    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
            </div></div>

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

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
