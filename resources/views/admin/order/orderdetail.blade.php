@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Chi tiết đơn hàng</h1>

</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">GIá(Đồng)</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tổng Tiền($)</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach ($items as $key => $item)
        @php $total += $item->total @endphp
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->total) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
Tổng Tiền của đơn hàng: {{number_format($total)}} $
@endsection