@extends('admin.master')
@section('content')
<main class="page-content">

    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">

                            <h1 class="offset-4">Thay đổi thông tin</h1>
                        </header>
                        <div class="page-section">
                            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin cơ bản</legend>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Email</label>
                                                    <input name="email" type="text" class="form" value="{{ $user->email }}">
                                                    @error('email')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Họ Và Tên</label>
                                                    <input name="name" type="text" class="form" value="{{ $user->name }}">
                                                    @error('name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Số Điện Thoại</label> <input name="phone" type="number" class="form" value="{{ $user->phone }}">
                                                    @error('phone')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Ngày sinh</label> <input name="birthday" type="date" class="form" value="{{ $user->birthday }}">
                                                    @error('birthday')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                @if (Auth::user()->hasPermission('Group_update'))
                                                <label class="control-label" for="flatpickr01">Chức Vụ</label>
                                                <select name="group_id" id="" class="form">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    @foreach ($groups as $group)
                                                    <option <?= $group->id == $user->group_id ? 'selected' : '' ?> value="{{ $group->id }}">
                                                        {{ $group->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if ('group_id')
                                                <p style="color:red">{{ $errors->first('group_id') }}</p>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label class="control-label" for="flatpickr01">Giới Tính</label>
                                                <select name="gender" id="" value="{{ $user->gender }}" class="form">
                                                    <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                    <option value="Nam">Nam</option>
                                                    <option value="Nữ">Nữ</option>
                                                    <option value="Khác">Khác</option>
                                                </select>
                                                @if ('gender')
                                                <p style="color:red">{{ $errors->first('gender') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group has-warning">
                                                <label class="col-lg-3 control-label">image</label>
                                                <div class="col-lg-4">
                                                <input type="file" class="form-file" id="image" name="image"><br></br>
                                                    <img src="{{ asset($user->image) ?? asset('public/images/' . old('image', $user->image)) }}" width="90px" height="90px" id="blah1" alt="">
                                                    @if ('image')
                                                    <p style="color:red">{{ $errors->first('image') }}</p>
                                                    @endif
                                                    <br>
                                                </div>
                                            </div>

                                            {{-- địa chỉ --}}
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Địa chỉ</label> <input name="address" type="text" class="form" value="{{ $user->address }}">
                                                    @error('address')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <br><br><br><br>
                                            <button class="btn btn-success" type="submit">Lưu thay đổi</button>
                                            <a class="btn btn-danger" href="{{ route('user.index') }}">Hủy</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>
    .row {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -15px; /* Khoảng cách giữa các cột */
}

.col-lg-6 {
  width: 50%; /* Chiếm 50% chiều rộng của row (2 cột trên một hàng) */
  padding: 0 15px; /* Khoảng cách giữa các cột và lề ngoài */
}

.col-lg-4 {
  width: 33.33%; /* Chiếm 33.33% chiều rộng của row (3 cột trên một hàng) */
  padding: 0 15px; /* Khoảng cách giữa các cột và lề ngoài */
}

.form-group {
  margin-bottom: 15px; /* Khoảng cách giữa các form group */
}

.form {
  width: 100%;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555555;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  border-radius: 4px;
}

.text-danger {
  color: red; /* Màu chữ khi có lỗi */
}

.has-warning {
  color: #8a6d3b; /* Màu chữ khi có cảnh báo */
}

.control-label {
  margin-bottom: 10px; /* Khoảng cách giữa label và input/select */
}

select.form {
  width: 100%;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555555;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  border-radius: 4px;
}

#blah {
  width: 90px;
  height: 90px;
  display: block;
  margin-top: 10px; /* Khoảng cách giữa ảnh và input file */
}

.text {
  color: red;
}

/* Định dạng địa chỉ */
input[name="address"] {
  width: 60%;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555555;
  background-color: #ffffff;
  background-image: none;
  border: 1px solid #cccccc;
  border-radius: 4px;
}
</style>
@endsection