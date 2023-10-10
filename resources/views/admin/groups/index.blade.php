@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h2 class="offset-4">Danh Sách Nhóm Nhân Viên</h2>
                </div>
            </div>
            <main class="page-content">
                <div class="container">
                    <section class="wrapper">
                        <div class="table-agile-info">
                            <div class="panel-panel-default">
                                <header class="page-title-bar">

                                </header>
                                <hr>
                                <div class="panel-heading">
                                </div>
                                <nav aria-label="breadcrumb">
                                @if (Auth::user()->hasPermission('Group_create'))
                     <a href="{{ route('group.create') }}" class="btn btn-success">Tạo nhóm nhân viên</a>
                    @endif
                                </nav>
                                <div>
                                    <table class="table" ui-jq="footable" ui-options='{
    "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Người đảm nhận</th>
                                                <th data-breakpoints="xs">Tùy Chỉnh</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @foreach ($groups as $key => $group)
                                            <tr data-expanded="true" class="item-{{ $group->id }}">
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ $group->name }} </td>
                                                <td>Hiện có {{ count($group->users) }} người</td>
                                                <td>
                                                    <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @if (Auth::user()->hasPermission('Group_update'))
                                                        <a class="btn btn-primary " href="{{route('group.detail', $group->id)}}">Trao Quyền</a>
                                                        @endif
                                                        @if (Auth::user()->hasPermission('Group_update'))
                                                        <a href="{{ route('group.edit', $group->id) }}" class="btn btn-warning">Sửa</a>
                                                        @endif
                                                        @if (Auth::user()->hasPermission('Group_forceDelete'))
                                                        <a data-href="{{ route('group.destroy', $group->id) }}" id="{{ $group->id }}" class="btn btn-danger sm deleteIcon">Xóa</a>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer">
                                        <nav class="float-right">
                                            {{ $groups->appends(request()->query())->links('pagination::bootstrap-4') }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                    {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script> --}}
                    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <script>
                        @php
                        if (Session::has('addgroup')) {
                            @endphp
                            Swal.fire({
                                icon: 'success',
                                title: 'Tạo quyền xong rồi nhé!',
                                text: "Cấp quyền ngay nhé",
                                showClass: {
                                    popup: 'swal2-show'
                                }
                            })
                            @php
                        }
                        @endphp
                    </script>
                    <script>
                        $(document).on('click', '.deleteIcon', function(e) {
                            // e.preventDefault();
                            let id = $(this).attr('id');
                            let href = $(this).data('href');
                            let csrf = '{{ csrf_token() }}';
                            console.log(id);
                            Swal.fire({
                                title: 'Bạn có chắc không?',
                                text: "Bạn sẽ không thể hoàn nguyên điều này!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Có, xóa!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: href,
                                        method: 'delete',
                                        data: {
                                            _token: csrf
                                        },
                                        success: function(res) {
                                            Swal.fire(
                                                'Deleted!',
                                                'Tệp của bạn đã bị xóa!',
                                                'success'
                                            )
                                            $('.item-' + id).remove();
                                        }

                                    });
                                }
                            })
                        });
                    </script>
                </div>
            </main>
        </div>
    </div>
</div>
</div>
@endsection