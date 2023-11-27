@extends('admin.master')
@section('content')
<main class="page-content">

    <section class="wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h1 class="page-title">Thay đổi mật khẩu của {{ auth()->user()->name }}</h1>
                        </div>
                    </div>
                    </header>
                    <hr>
                    <div class="page-section">

                        <form class="form-horizontal bucket-form" action="{{ route('user.updatepass', $user->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group has-success">
                                <label class="col-sm-3 control-label col-lg-3" for="currentPassword">Mật khẩu hiện
                                    tại</label>
                                <div class="col-lg-6">
                                    <input name="password" type="password" class="form" id="inputSuccess">
                                </div>
                            </div>
                            @error('password')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="form-group has-warning">
                                <label class="col-sm-3 control-label col-lg-3" for="newPassword">Mật khẩu mới</label>
                                <div class="col-lg-6">
                                    <input name="newpassword" type="password" class="form" id="newPassword">
                                </div>
                            </div>
                            @error('newpassword')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="form-group has-warning">
                                <label class="col-sm-3 control-label col-lg-3" for="renewPassword">Nhập lại mật khẩu
                                    mới</label>
                                <div class="col-lg-6">
                                    <input name="renewpassword" type="password" class="form" id="renewPassword">
                                </div>
                            </div>
                            @error('renewpassword')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="text">
                                <button type="submit" class="w3-button w3-blue btn btn-primary">Lưu mật khẩu</button>
                                <a href="{{ route('user.index') }}" class="w3-button w3-red btn btn-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .text-center {
                text-align: center;
            }

            .w3-button {
                padding: 10px 20px;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                margin: 10px;
            }

            .w3-blue {
                background-color: blue;
                color: white;
            }

            .w3-red {
                background-color: red;
                color: white;
            }
        </style>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @php
            if (Session::has('saipass')) {
                @endphp
                Swal.fire({
                    icon: 'error',
                    title: 'Sai mật khẩu  !',
                    text: "♥",
                    showClass: {
                        popup: 'swal2-show'
                    }
                })
                @php
            }
            @endphp
            @php
            if (Session::has('sainhap')) {
                @endphp
                Swal.fire({
                    icon: 'error',
                    title: 'Sai mất rồi !',
                    text: "Vui lòng nhập lại trùng khớp nhé!",
                    showClass: {
                        popup: 'swal2-show'
                    }
                })
                @php
            }
            @endphp
            @php
            if (Session::has('doimatkhau_thanhcong')) {
                @endphp
                Swal.fire({
                    icon: 'success',
                    title: 'Đổi mật khẩu thành công!',
                    text: 'Mật khẩu của bạn đã được thay đổi thành công.',
                    showClass: {
                        popup: 'swal2-show'
                    }
                });
                @php
            }
            @endphp
        </script>
    </section>
</main>
@endsection