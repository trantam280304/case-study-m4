@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">Đơn hàng</h3>
                </div>
            </div>
            <hr>
            <td> <a style="width:30%" class="btn btn-warning" href="">Xuất file excel </a> </td>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Khách Hàng</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Ngày Đặt Hàng</th>
                        <th scope="col">Tùy Chọn</th>
                        <th scope="col">Xóa</th> <!-- Thêm cột Xóa -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->customer->email }}</td>
                        <td>{{ $order->customer->phone }}</td>
                        <td>{{ $order->customer->address }}</td>
                        <td>{{ $order->date_at }}</td>

                        <td>
                            <a class='btn btn-info' href="{{ route('order.detail', $order->id) }}">Chi tiết</a>
                        </td>
                        <td>
                            <!-- Thêm nút xóa -->
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection