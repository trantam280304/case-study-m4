@extends('admin.master')
@section('content')
<h2 class="offset-4">Thùng rác danh mục sản phẩm</h2>
    <div class="table-responsive pt-3">
        <table class="table table-info" style="width:100%">
            <thead>
                <tr>
                    <th style="width:35%">
                        #
                    </th>
                    <th>
                        Tên danh mục đã xóa
                    </th>
                    <th>
                        Tùy chọn
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr data-expanded="true" class="item-{{ $category->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('categories.restoredelete', $category->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a href="{{ route('categories.destroy', $category->id) }}" id="{{ $category->id }}"
                                    class="btn btn-danger">Xóa</a>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
    @endsection