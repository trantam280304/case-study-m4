@extends('admin.master')
@section('content')
<style>
    h2 {
        color: #333;
        font-size: 24px;
        text-align: center;
    }

    form {
        max-width: 1000px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    .form-control-file {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .btn-back {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">SỬA SẢN PHẨM </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">

                    <form action="<?php echo route('products.update', $products->id) ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name">TÊN:</label>
                        <br>
                        <input type="text" id="name" name="name" value="{{$products->name}}">
                        <br>
                        <label for="name">SLUG:</label>
                        <br>
                        <input type="text" id="slug" name="slug" value="{{$products->slug}}">
                        <br>
                        <label for="name"> GIÁ :</label>
                        <br>
                        <input type="number" id="price" name="price" value="{{ ($products->price)}}">
                        <br>

                        <label for="description">MÔ TẢ :</label>
                        <textarea name="description" id="description">{{$products->description}}</textarea>
                        <br>

                        


                        <label for="quantity">SỐ LƯỢNG:</label>
                        <br>
                        <input type="text" id="quantity" name="quantity" value="{{$products->quantity}}">
                        <br>
                        <label for="status">TRẠNG THÁI:</label>
                        <br>
                        <!-- select còn hàng hết hàng  -->
                        <select id="status" name="status" style="width: 90%">
                            <option value="0" {{ $products->status == '0' ? 'selected' : '' }}>Còn hàng</option>
                            <option value="1" {{ $products->status == '1' ? 'selected' : '' }}>Hết hàng</option>
                        </select>
                        <br><br>
                        <label>LOẠI HÀNG</label>
                        <select name="category_id" style="width: 177px;">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select><br><br>

                        <label for="image">ẢNH :</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        <br>
                        <img src="{{ asset($products->image) ?? asset('public/images/' . old('image', $products->image)) }}" width="90px" height="90px" id="blah1" alt="">
                        <br><br><br>
                        <div class="button-group">
                            <input type="submit" value="CẬP NHẬT" class="btn btn-primary">
                            <a href="{{ route('products.index') }}" class="btn-back btn">QUAY LẠI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection