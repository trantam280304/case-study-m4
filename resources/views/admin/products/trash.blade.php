@extends('admin.master')

@section('content')
    <h2 class="offset-4">Thùng rác danh mục sản phẩm</h2>
    <div class="table-responsive pt-3">
        <table class="table table-info" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Category Name</th>

                    <th>Image</th>

                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr data-expanded="true" class="item-{{ $product->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{!! $product->description !!}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" alt="Ảnh" width="90px" height="90px">
                        </td>
                        <td>
                            <form action="{{ route('products.restoredelete', $product->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a href="{{ route('products.destroy', $product->id) }}" id="{{ $product->id }}" class="btn btn-danger">Xóa</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection