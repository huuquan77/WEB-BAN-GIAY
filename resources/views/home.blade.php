@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-4">🛍️ Danh Sách Sản Phẩm</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <!-- Nút Thêm Sản Phẩm -->
        <div class="text-end mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">➕ Thêm Sản Phẩm</a>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" c  lass="card-img-top img-fluid" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $product->name }}</h5>
                            <p class="card-text fw-bold text-danger">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">🔍 Xem</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">✏️ Sửa</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection