@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">🛍️ Thêm sản phẩm mới</h2>

        <div class="card shadow p-4">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-bold">📌 Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" required placeholder="Nhập tên sản phẩm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📝 Mô tả</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">💰 Giá (VNĐ)</label>
                    <input type="number" class="form-control" name="price" required placeholder="Nhập giá sản phẩm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📷 Hình ảnh</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-success w-100">➕ Thêm sản phẩm</button>
            </form>
        </div>
    </div>
@endsection
