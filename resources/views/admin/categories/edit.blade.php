
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
                    <h6 class="text-white text-capitalize ps-3">EDIT CATEGORY </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">

                    <form action="<?php echo route('categories.update', $categories->id) ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name">NAME:</label>
                        <br>
                        <input type="text" id="name" name="name" value="{{$categories->name}}">
                        <br>
                        <label for="name">delete_at:</label>
                        <input type="date  " id="delete_at" name="delete_at" value="{{$categories->delete_at}}">
                        <div class="button-group">
                            <input type="submit" value="UPDATE" class="btn btn-primary">
                            <a href="{{ route('categories.index') }}" class="btn-back btn">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
