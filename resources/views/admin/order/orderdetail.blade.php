@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">Chi tiết đơn hàng </h3>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">GIá(Đồng)</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng Tiền(VND)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalAll = 0 @endphp <!-- Sửa lại tên biến thành $totalAll = 0 -->
                    @foreach ($orderdetails as $key => $orderdetail)
                    @php $totalAll += $orderdetail->total @endphp <!-- Điều chỉnh cách tính tổng tiền -->
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $orderdetail->name }}</td>
                        <td>{{ number_format($orderdetail->price) }}</td>
                        <td>{{ $orderdetail->quantity }}</td>
                        <td>{{ number_format($orderdetail->total) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <h4>Tổng Tiền của đơn hàng: {{ number_format($totalAll) }} VND</h4> 
        </div>
    </div>
</div>
@endsection