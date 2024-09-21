@extends('layouts.admin')
@section('content')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Product</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Danh mục</th>
                                    <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td><a class="text-primary" href="{{ route('product.show', $product->id) }}">{{$product->name}}</a></td>
                        <td>{{$product->category->name}}</td>
                        <td class="">
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="submit" class="btn btn-outline-danger"><i
                                            class="fas fa-trash text-danger"></i></button>
                            </form>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-warning"><i
                                    class="fas fa-edit text-warning"></i></a>
                        </td>
                    </tr>
                    @endforeach
                            </tbody>
                        </table>
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
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection
