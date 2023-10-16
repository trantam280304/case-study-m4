@extends('admin.master')
@section('content')
<main class="container">
    <section class="my-4">
        <div class="card">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">THÊM </h3>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <legend>Thông tin cơ bản</legend>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input name="email" type="text" class="form" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label >Mật Khẩu</label>
                                        <input name="password" type="text" class="form" value="{{ old('password') }}">
                                        @error('password')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label >Họ Và Tên</label>
                                        <input name="name" type="text" class="form" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label >Số Điện Thoại</label>
                                        <input name="phone" type="number" class="form" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label >Ngày sinh</label>
                                        <input name="birthday" type="date" class="form" value="{{ old('birthday') }}">
                                        @error('birthday')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="control-label" for="flatpickr01">Chức Vụ</label>
                                    <select name="group_id" id="" class="form">
                                        <option value="">--Vui lòng chọn--</option>
                                        @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ('group_id')
                                    <p style="color:red">{{ $errors->first('group_id') }}</p>
                                    @endif
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="control-label" for="flatpickr01">Giới Tính</label>
                                    <select name="gender" id="" class="form">
                                        <option value="">--Vui lòng chọn--</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    @if ('gender')
                                    <p style="color:red">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                                <div class="form-group has-warning">
                                    <label class="col-lg-3 control-label">Ảnh</label>
                                    <div class="col-lg-4">
                                        <input accept="image/*" type='file' id="inputFile" name="image" /><br>
                                        <img type="hidden" width="90px" height="90px" id="blah" src="#" alt="" />
                                        <br>
                                    </div>
                                </div>

                                {{-- địa chỉ --}}
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label >Địa chỉ</label><br>
                                        <input name="address" type="text" class="form" value="{{ old('address') }}">
                                        @error('address')
                                        <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <br><br><br><br>
                                <button class="btn btn-primary" type="submit">Đăng ký</button>
                                <a class="btn btn-danger" href="{{ route('user.index') }}">Hủy</a>
                            </div>
                        </div>
                    </form>
                </table>

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
  width: 50%;
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