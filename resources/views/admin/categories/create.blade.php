
@extends('admin.master')
@section('content')
<body>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h3 class="text-white text-capitalize ps-3">ADD CATEGORY</h3>
                    </div>
                </div>
                <br>
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Name:</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" >
                    @error('name')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    <label >Delete_at :</label>
                    <input type="date" name="delete_at" value="{{ old('delete_at') }}" >
<br></br>
                    @error('delete_at')
                    <div style="color: red">{{ $message }}</div>
                    @enderror
                    <input type="submit" value="THÊM MỚI">
                    <a href="{{ route('categories.index') }}" class="btn-back">QUAY LẠI</a>
                </form>
            </div>
        </div>
    </div>

</body>
<style>
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

