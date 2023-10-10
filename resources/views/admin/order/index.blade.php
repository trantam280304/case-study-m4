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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->customer->name }}</td>
                        <td>{{ $item->customer->email }}</td>
                        <td>{{ $item->customer->phone }}</td>
                        <td>{{ $item->customer->address }}</td>
                        <td>{{ $item->date_at }}</td>

                        <td>
                            <a class='btn btn-info' href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection