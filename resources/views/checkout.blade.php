@extends('layouts.app')

@section('content')
    <h2 class="text-center">Thanh Toán</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Họ và Tên</label>
            <input type="text" class="form-control" name="customer_name" required>
        </div>

        <div class="mb-3">
            <label for="customer_email" class="form-label">Email</label>
            <input type="email" class="form-control" name="customer_email" required>
        </div>

        <div class="mb-3">
            <label for="customer_phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="customer_phone" required>
        </div>

        <div class="mb-3">
            <label for="customer_address" class="form-label">Địa chỉ</label>
            <textarea class="form-control" name="customer_address" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
    </form>
@endsection
