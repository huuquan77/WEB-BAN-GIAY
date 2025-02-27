@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">🛒 Giỏ hàng của bạn</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($cartItems->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ number_format($item->product->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} VNĐ</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">❌ Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('home') }}" class="btn btn-secondary">⬅️ Tiếp tục mua sắm</a>
                <a href="{{ route('checkout') }}" class="btn btn-primary">🛍️ Thanh toán</a>
            </div>
        @else
            <p class="text-center alert alert-warning">Giỏ hàng của bạn đang trống.</p>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-success">🛒 Mua ngay</a>
            </div>
        @endif
    </div>
@endsection
