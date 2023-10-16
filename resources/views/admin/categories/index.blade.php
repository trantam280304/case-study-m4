@extends('admin.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<form action="{{ route('categories.index') }}" method="GET" class="search-form">
    <button type="submit" class="search-button">
        <i class="fas fa-search"></i>
    </button>
    <input type="text" id="keyword" name="keyword" class="search-input" placeholder="  {{ __('language.search for ...') }}">
</form>
<a href="{{ route('categories.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i>
    {{ __('language.ADD CATEGORY') }}
</a><br></br>
<li class="nav-item dropdown">
    <div class="select-wrapper">
        <select class="form-control changeLang ">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
            <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
            <i class="fas fa-chevron-down"></i>
        </select>
    </div>
</li>
<br></br>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">{{ __('language.category') }}
                    </h3>
                </div>
            </div>
            <!-- chuyển đổi ngôn ngữ -->

            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('language.STT') }}</th>
                        <th>{{ __('language.Name') }}</th>
                        <th>{{ __('language.Delete_at') }}</th>
                        <th>{{ __('language.ACTION') }}</th>

                    </tr>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->delete_at }}</td>

                        <td>
                            <form action="{{ route('categories.softdeletes', $category->id) }}" method="POST">
                                @method('PUT')
                                @csrf

                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> {{ __('language.EDIT') }}</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('language.Do you want to move it to the trash?') }}')"><i class="fas fa-trash"></i> {{ __('language.DELETE') }}</button>                            </form>
                        </td>
                    </tr>

                    @endforeach
                </thead>

                <body>

                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
                    @if (session('successMessage'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @elseif(session('successMessage1'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage1') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @elseif(session('successMessage2'))
                    <script>
                        Swal.fire({
                            title: "<h6>{{ session('successMessage2') }}</h6>",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2000,
                            width: "300px"
                        });
                    </script>
                    @endif


                </body>
            </table>
            <!-- phan trang -->
            <div class="card-footer">
                <nav class="float-right">
                    {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .select-wrapper {
        position: relative;
    }

    .select-wrapper::after {
        content: '\f078';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .form-control {
        padding-right: 30px;
        /* Để tạo không gian cho biểu tượng mũi tên */
    }

    .nav-item {
        display: flex;
        align-items: center;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown .form-control {
        padding: 8px 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        color: #333;
        font-size: 14px;
        background-image: url('path/to/arrow.png');
        background-position: right center;
        background-repeat: no-repeat;
        background-size: 12px;
        padding-right: 24px;
        /* thêm khoảng trống bên phải để làm cho mũi tên không bị chồng lên nội dung */
    }

    .dropdown .form-control:focus {
        outline: none;
        border-color: #007bff;
    }

    .dropdown .form-control option {
        padding: 8px;
    }

    .dropdown .form-control option:selected {
        font-weight: bold;
    }

    .changeLang {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .changeLang option {
        background-color: #fff;
        color: #333;
    }

    .changeLang option:hover {
        background-color: #007bff;
        color: #fff;
    }

    .search-form {
        float: right;
        display: flex;
        align-items: center;
    }

    .search-input {
        border: none;
        border-bottom: 2px solid #ccc;
        padding: 10px;
        font-size: 15px;
        outline: none;
        border-radius: 13px;
    }

    .search-button {
        width: 50px;
        padding: 15px 10px;
        cursor: pointer;
        border-radius: 20px;
        border: none;
        background: #1E90FF;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        margin-right: 10px;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-bordered th {
        background: linear-gradient(to bottom, #FFFFFF, #D3D3D3);
    }

    .table-bordered tbody td {
        background-color: #fff;
    }

    .table-bordered tbody tr:hover td {
        background-color: #f2f2f2;
    }
</style>
@endsection