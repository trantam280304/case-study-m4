@extends('admin.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">EDIT </h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <form role="form" class="form-horizontal " action="{{ route('group.update', $group->id) }}" method="POST">
                        @method('put')
                        @csrf
                            <label class="col-lg-2">Tên Quyền</label><br>
                                <input type="text" value="{{$group->name}}" name="name" placeholder="" class=" @error('name') is-invalid @enderror  "><br>
                                @error('name')
                                <div >{{ $message }}</div>
                                @enderror
                                <button class="btn btn-primary" type="submit">ADD</button>
                                <a href="{{ route('group.index') }}" class="btn-back btn" type="submit">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
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
        padding: 9px 15px;
        font-size: 16px;
        border-radius: 14px;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #0056b3;
    }
</style>
@endsection