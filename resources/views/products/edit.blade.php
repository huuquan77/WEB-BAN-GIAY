@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">✏️ Chỉnh sửa sản phẩm</h2>

        <div class="card shadow p-4">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">📌 Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📝 Mô tả</label>
                    <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">💰 Giá (VNĐ)</label>
                    <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">📷 Hình ảnh</label>
                    <input type="file" class="form-control" name="image">
                    @if($product->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Hình sản phẩm" class="img-thumbnail" width="150">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100">💾 Cập nhật sản phẩm</button>
            </form>
        </div>
    </div>
@endsection
