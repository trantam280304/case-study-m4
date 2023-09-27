@extends('admin.master')
@section('content')

<body>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h3 class="text-white text-capitalize ps-3">ADD product</h3>
                    </div>
                </div>
                <br>
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Name:</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" style="width: 90%"><br>
                    @error('name')
                    <div style="color: red">{{ $message }}</div>
                    @enderror

                    <label>Slug:</label><br>
                    <input type="text" name="slug" value="{{ old('slug') }}" style="width: 90%"><br>
                    @error('slug')
                    <div style="color: red">{{ $message }}</div>
                    @enderror

                    <label>price:</label><br>
                    <input type="number" name="price" value="{{ old('price') }}" style="width: 90%"><br>
                    @error('price')
                    <div style="color: red">{{ $message }}</div>
                    @enderror


                    
                    <label>quantity:</label><br>
                    <input type="text" name="quantity" value="{{ old('quantity') }}" style="width: 90%"><br>
                    @error('quantity')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    
                    <label>status:</label><br>
                    <select name="status" style="width: 90%">
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Còn hàng</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Hết hàng</option>
                    </select><br><br>
                    @error('status')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    
                    
                    <label for="category_id">Category_id:</label><br>
                    <select name="category_id" style="width: 177px;">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select><br><br>
                    <label for="image">IMAGE :</label>
                    <input type="file" name="image" id="image"><br></br>
                    @error('image')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    
                    <label for="description">DESCRIPTION :</label><br>
                        <textarea name="description" id="description" value="{{ old('description') }}" ></textarea><br>
                    @error('description')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    <input type="submit" value="THÊM MỚI">
                    <a href="{{ route('products.index') }}" class="btn-back">QUAY LẠI</a>
                </form>
            </div>
        </div>
    </div>

</body>
<style>
     select[name="status"] {
        width: 30px;
        padding: 10px;
        font-size: 14px;
        border-radius: 14px;

    }
    .my-form {
        max-width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 14px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 14px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .btn-back {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        border-radius: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>
@endsection