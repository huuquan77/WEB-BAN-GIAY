@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="text-center mb-4 text-uppercase fw-bold text-dark">👟 Cửa Hàng Giày</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <!-- Nút Thêm Sản Phẩm -->
        <div class="d-flex justify-content-between mb-3">
            <span class="fs-5 fw-bold text-dark">🛒 Tổng sản phẩm: {{ count($products) }}</span>
            <a href="{{ route('products.create') }}" class="btn btn-success fw-bold">
                ➕ Thêm Sản Phẩm
            </a>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card border-0 shadow-sm rounded h-100 position-relative product-card bg-light">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top product-image rounded-top" 
                             alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h6 class="card-title text-dark fw-bold">{{ $product->name }}</h6>
                            <p class="card-text text-danger fw-bold">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                        </div>
                        
                        <!-- Hành động -->
                        <div class="card-footer bg-white border-0 text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">
                                🔍 Xem
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                ✏️ Sửa
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Xóa</button>
                            </form>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group mb-3">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control">
                                    <button type="submit" class="btn btn-success">🛒 Thêm vào giỏ</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Giới hạn kích thước ảnh */
        .product-image {
            height: 220px;
            object-fit: cover;
        }

        /* Thẻ sản phẩm có nền nhẹ */
        .product-card {
            background-color: #f8f9fa; /* Màu nền xám nhạt */
            transition: 0.3s ease-in-out;
        }

        /* Hiệu ứng khi di chuột */
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        /* Màu sắc tối ưu */
        .text-dark {
            color: #343a40 !important; /* Màu chữ đậm hơn */
        }
    </style>
@endsection
