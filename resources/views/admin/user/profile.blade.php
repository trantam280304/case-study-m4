@extends('admin.master')
@section('content')
<style>
    img#avtshow {
        border: 3px solid rgb(150, 0, 0);
        padding: 10px;
        height: 250px;
        width: 250px;
        border-radius: 50%;
    }

    .image-container {
        display: flex;
        justify-content: center;
    }

    .btn {
        display: inline-block;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h3 class="text-white text-capitalize ps-3">THÔNG TIN</h3>
                </div>
            </div>
            <br>
            <table class="table" ui-jq="footable">
                <li class="image-container">
                    <img id="avtshow" src="{{ asset($user->image) }}" alt="">
                </li>

                <h3 style="text-align: center;">{{ $user->name }}</h3>

                <h4 style="text-align: center;">{{ $user->groups->name }}</h4>
                </li>
                <div class="text-center">
                    @if(Auth::user()->id == $user->id || Auth::user()->hasPermission('User_update'))
                    <a class="btn mini btn-default" href="{{ route('user.edit', $user->id) }}">
                        <i class="fa fa-cog"></i> Thông tin
                    </a>
                    @endif
                    @if(Auth::user()->id == $user->id)
                    <a class="btn mini btn-default" href="{{ route('user.editpass', Auth::user()->id) }}">
                        <i class="fa fa-cog"></i> Mật Khẩu
                    </a>
                    @endif
                    @if (Auth::user()->hasPermission('User_adminUpdatePass'))
                    <a class="btn mini btn-default" href="{{ route('user.adminpass', $user->id) }}">
                        <i class="fa fa-cog"></i> Mật khẩu*
                    </a>
                    @endif
                </div>
        </div>
        </section>
    </div>
    </table>
    </section>
</div>
<script>
    // Bat su kien sau khi ajax goi
    $('body').on('click', '.edit-btn', function() {
        //lay id
        let id = $(this).data('id');
        // Goi ajax
        let option = {
            url: "http://127.0.0.1:8000/api/customer/show/" + id,
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(response) {
                console.log(response);
                $("#up_first_name").val(response.first_name);
                $("#up_last_name").val(response.last_name);
                $("#id").val(response.id);
            },
        }
        // Dua vao cac o input trong form
        $.ajax(option);
        // Goi modal
        $('#editModal').modal('show');
    });
    $('#btnok').on('click', function() {
        // validate form
        let id = $("#id").val();
        let first_name = $('#up_first_name').val();
        let last_name = $('#up_last_name').val();
        if (!first_name) {
            $('#upfirst_name_error').html('truong bat buoc');
        }
        if (!last_name) {
            $('#uplast_name_error').html(' aatruong bat buoc');
            // alert('edit: ')
        } else {
            // alert('edit: ' + id)
            let option = {
                url: "http://127.0.0.1:8000/api/customer/update/" + id,
                method: "PUT",
                dataType: "json",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                },
                success: function(response) {
                    // console.log(response);
                    $('#editModal').modal('hide');
                    getList();
                    // $("#id").val(0);
                    Swal.fire(
                        'Good job!',
                        'Cập nhật thành công!',
                        'success'
                    )
                }
            }
            $.ajax(option)
        }
    })
</script>
@endsection