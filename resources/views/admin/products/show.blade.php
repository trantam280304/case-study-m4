<style>
    h3 {
        font-size: 15px;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
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
                                <th scope="col" class="w-5">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">SLUG </th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">QUANNITY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">IMAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $products->id }}</td>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->slug }}</td>
                                <td>{{ $products->price }}</td>
                                <td>{!! $products->description !!}</td>
                                <td>{{ $products->quantity }}</td>
                                    @if ($products->status == 0)
                                <td><span class="badge bg-success">
                                        <i class="fas fa-check-circle"></i> Còn hàng
                                    </span></td>
                                @else
                                <td> <span class="badge bg-danger">
                                        <i class="fas fa-times-circle"></i> Hết hàng
                                    </span></td>
                                @endif
                                <td>{{ $products->category->name }}</td>
                                <td><img src="{{ asset($products->image) }}" alt="Ảnh" width="90px" height="90px"></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('products.index') }}" class="btn-back">BACK</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection