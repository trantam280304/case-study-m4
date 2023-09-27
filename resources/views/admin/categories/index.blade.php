@extends('admin.master')
@section('content')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<form action="{{ route('categories.index') }}" method="GET" class="search-form">
    <button type="submit" class="search-button">
    <i class="fas fa-search"></i>
    </button>
    <input type="text" id="keyword" name="keyword" class="search-input" placeholder="search for ...">
</form>
<a href="{{ route('categories.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> 
    ADD CATEGORY
</a><br></br>

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">CATEGORY</h3>
                </div>
            </div>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>delete_at</th>
                        <th>ACTION</th>
                    </tr>
                    @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->delete_at }}</td>

                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> EDIT</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash"></i> DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </thead>
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