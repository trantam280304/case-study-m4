@extends('admin.master')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">Thùng rác</h3>
                </div>
                <br>
            </div>
            <table class="table table-info" style="width:100%">
                <thead>
                    <tr>
                        <th> #</th>
                        <th> Tên </th>
                        <th> Giá </th>
                        <th style="width:15%"> Mô tả </th>
                        <th> Số lượng </th>
                        <th> Ảnh </th>
                        <th> Trạng thái </th>
                        <th> Thể loại </th>
                        <th> Tùy chọn </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr data-expanded="true" class="item-{{ $product->id }}">
                        <td style="width:5%">{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img style="width:200px ; height: 165px ; border-radius:0%" src="{{ asset($product->image) }}" alt="">
                        </td>
                        @if ($product->status == 0)
                        <td><span class="badge bg-success">
                                <i class="fas fa-check-circle"></i> Còn hàng
                            </span></td>
                        @else
                        <td> <span class="badge bg-danger">
                                <i class="fas fa-times-circle"></i> Hết hàng
                            </span></td>
                        @endif
                        <td>{{ $product->category->name }}</td>

                        <td>
                            <form action="{{ route('products.restoredelete', $product->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}" class="btn btn-danger">Xóa</a>

                            </form>
                        </td>
                        @endforeach


                </tbody>

                <body>

                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                    @if (session('successMessage'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @elseif(session('successMessage1'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage1') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @elseif(session('successMessage2'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage2') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @elseif(session('successMessage3'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage3') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @endif


                </body>


            </table>
        </div>
        @endsection