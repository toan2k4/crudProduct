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
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                            <input type="text" name="ten_san_pham" class="form-control @error('ten_san_pham') is-invalid @enderror" placeholder="">
                                            @error('ten_san_pham')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="attributeSelect">Thêm mới thuộc tính hiện có</label>
                                            <select class="form-control @error('attributeId') is-invalid @enderror" id="attributeSelect" multiple name="attributeId[]">
                                                @foreach ($attributes as $attribute)
                                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('attributeId')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="attributeForms" class="col-12"></div>
                                    <div class="col-12">
                                        <button type="button" id="saveAttributes" class="btn btn-primary">Lưu thuộc tính</button>
                                    </div>
                                    <div id="variantSection" class="col-12 mt-5"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="category_id">Danh Mục</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                            <option value="">--Chọn danh mục--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Đăng</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <a class="btn btn-primary" href="{{ route('product.index') }}">Danh Sách Sản Phẩm</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
    document.addEventListener('DOMContentLoaded', function () {
    let attributeValues = @json($attributeValues);

    // Khi chọn thuộc tính, sẽ hiển thị các giá trị thuộc tính tương ứng
    document.getElementById('attributeSelect').addEventListener('change', function () {
        let selectedAttributes = Array.from(this.selectedOptions).map(option => option.value);
        let attributeFormsContainer = document.getElementById('attributeForms');

        // Xóa các form con trước khi tạo lại
        attributeFormsContainer.innerHTML = '';

        selectedAttributes.forEach(attributeId => {
            if (attributeValues[attributeId] && Object.keys(attributeValues[attributeId]).length > 0) {
                let options = '';
                for (const [id, name] of Object.entries(attributeValues[attributeId])) {
                    options += `<option value="${id}">${name}</option>`;
                }

                let formGroup = document.createElement('div');
                formGroup.classList.add('mb-3');
                formGroup.innerHTML = `
                    <label for="attributeValue_${attributeId}">Chọn giá trị cho thuộc tính</label>
                    <select class="form-control" id="attributeValue_${attributeId}" name="attributeValues[${attributeId}][]" multiple>
                        ${options}
                    </select>
                `;
                attributeFormsContainer.appendChild(formGroup);
            }
        });
    });

    // Khi người dùng nhấn "Lưu thuộc tính", tạo bảng biến thể sản phẩm
    document.getElementById('saveAttributes').addEventListener('click', function () {
        let selectedAttributes = document.querySelectorAll('select[name^="attributeValues"]');
        let attributeCombinations = getCombinations(selectedAttributes);
        let variantSection = document.getElementById('variantSection');

        // Xóa bảng trước nếu có
        variantSection.innerHTML = '';

        if (attributeCombinations.length > 0) {
            let tableHtml = `
                <h3>Biến thể sản phẩm</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            ${Array.from(selectedAttributes).map((select, index) => `<th>Thuộc tính ${index + 1}</th>`).join('')}
                            <th>SKU</th>
                            <th>Số lượng</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            attributeCombinations.forEach(combination => {
                let attributeCells = combination.map(attr => `
                    <td>
                        ${attr.name}
                        <input type="hidden" name="attributeValueIds[]" value="${attr.id}">
                    </td>
                `).join('');

                tableHtml += `
                    <tr>
                        ${attributeCells}
                        <td><input type="text" class="form-control" name="sku[]" placeholder="SKU"></td>
                        <td><input type="text" class="form-control" name="quantity[]" placeholder="Số lượng"></td>
                        <td><input type="file" class="form-control" name="variantImage[]"></td>
                        <td><input type="text" class="form-control" name="price[]" placeholder="Giá"></td>
                    </tr>
                `;
            });

            tableHtml += `</tbody></table>`;
            variantSection.insertAdjacentHTML('beforeend', tableHtml);
        }
    });

    // Hàm lấy các tổ hợp giá trị thuộc tính
    function getCombinations(selectElements) {
        let attributeValues = Array.from(selectElements).map(select => {
            return Array.from(select.selectedOptions).map(option => ({
                id: option.value,
                name: option.text
            }));
        });

        // Nếu chỉ chọn một thuộc tính, trả về giá trị thuộc tính đó
        if (attributeValues.length === 1) {
            return attributeValues[0].map(item => [item]);
        }

        // Hàm đệ quy để kết hợp các giá trị thuộc tính
        function combine(arr) {
            if (arr.length === 0) return [[]];

            let result = [];
            let restCombinations = combine(arr.slice(1));

            arr[0].forEach(item => {
                restCombinations.forEach(combination => {
                    result.push([item].concat(combination));
                });
            });

            return result;
        }

        return combine(attributeValues);
    }
});

</script>