@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg p-4">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6 d-flex align-items-center">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h1 class="fw-bold text-primary">{{ $product->name }}</h1>
                <p class="text-danger fw-bold fs-4">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                <p class="text-muted">{{ $product->description }}</p>

                <!-- Form thêm vào giỏ hàng -->
                <form action="{{ route('cart.store') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="input-group mb-3">
                        <input type="number" name="quantity" value="1" min="1" class="form-control w-25 text-center">
                        <button type="submit" class="btn btn-success">🛒 Thêm vào giỏ</button>
                    </div>
                </form>

                <!-- Nút quay lại -->
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">⬅ Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection
