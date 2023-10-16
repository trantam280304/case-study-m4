<style>
    h3 {
        font-size: 15px;
    }

    .table {
        border-collapse: collapse;
        width: 90%;
    }

    .table th,
    .table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    .table thead {
        background: linear-gradient(to bottom, #FFFFFF, #D3D3D3);

    }

    .table th {
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #A9A9A9;
        color: #333;
        font-size: 16px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        margin-left: 10px;

    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>

@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">SEE DETAILS</h3>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table align-items-center mb-0">
                    <table class="table">
                        <thead class="">
                            <tr>
                            <tr>
                                <h3>XEM CHI TIẾT SẢN PHẨM</h3>
                            </tr>
                            <tr>
                                <td>ID :</td>
                                <td>{{ $products->id }}</td>
                            </tr>
                            <tr>
                                <td>TÊN :</td>
                                <td>{{ $products->name }}</td>
                            </tr>
                            <tr>
                                <td>SLUG :</td>
                                <td>{{ $products->slug }}</td>
                            </tr>
                            <tr>
                                <td>GIÁ :</td>
                                <td>{{ $products->price }}</td>
                            </tr>
                            <tr>
                                <td>MÔ TẢ :</td>
                                <td>{!! $products->description !!}</td>
                            </tr>

                            <tr>
                                <td>SỐ LƯỢNG :</td>
                                <td>{{ $products->quantity }}</td>
                            </tr>
                            <tr>
                                <td>TRẠNG THÁI :</td>
                                @if ($products->status == 0)
                                <td><span class="badge bg-success">
                                        <i class="fas fa-check-circle"></i> Còn hàng
                                    </span></td>
                                @else
                                <td> <span class="badge bg-danger">
                                        <i class="fas fa-times-circle"></i> Hết hàng
                                    </span></td>
                                @endif
                            </tr>
                            <tr>
                                <td>LOẠI HÀNG :</td>
                                <td>{{ $products->category->name }}</td>
                            </tr>
                            <tr>
                                <td>ẢNH :</td>
                                <td><img src="{{ asset($products->image) }}" alt="Ảnh" width="90px" height="90px"></td>
                            </tr>

                        </thead>

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
                    <a href="{{ route('products.index') }}" class="btn-back">QUAY LẠI</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection