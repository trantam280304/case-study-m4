@extends('admin.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h1 class="offset-4">Chức Vụ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <section class="wrapper">
        <div class="page-section">
            <form method="post" action="{{ route('group.group_detail', $group->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <hr>
                        <div class="form-group">
                            <label for="tf1">Tên Quyền:</label> {{ $group->name }}
                        </div><br>
                        <div class="form-group">
                            <label class="w3-button w3-red">{{ __('Cấp toàn bộ quyền : ') }}<br>
                                <input type="checkbox" id="checkAll" class="my-checkbox" value="Quyền hạn">
                                <div class="row">
                                    @foreach ($group_names as $group_name => $roles)
                                    <div class="col-lg-6">
                                        <div class="list-group-header" style="color:rgb(2, 6, 249) ;">
                                            <h5> Nhóm: {{ __($group_name) }}</h5>
                                        </div>
                                        @foreach ($roles as $role)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <span style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                            <!-- .switcher-control -->
                                            <label class="form-check form-switch ">
                                                <input type="checkbox" @checked(in_array($role['id'], $userRoles)) name="roles[]" class="checkItem form-check-input checkItem" value="{{ $role['id'] }}">
                                                <span class="switcher-indicator"></span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </label>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-success" type="submit">Duyệt</button>
                            <a href="{{ route('group.index') }}" class="btn btn-danger" type="submit">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $('#checkAll').click(function() {
        $(':checkbox.checkItem').prop('checked', this.checked);
    });
</script>
<style>
   .my-checkbox {
  /* Các quy tắc CSS tùy chỉnh cho checkbox */
  /* Ví dụ: */
  border: 2px solid #f00;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  background-color: #fff;
  cursor: pointer;
}

.my-checkbox:checked {
  /* Các quy tắc CSS cho checkbox đã được chọn */
  /* Ví dụ: */
  background-color: #f00;
}
</style>
@endsection