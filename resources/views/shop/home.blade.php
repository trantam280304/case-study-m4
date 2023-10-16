@extends('shop.layout.master')
@section('content')
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hoàn trả trong 14 ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7   </h5>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="{{ asset('shops/img/logo2.jpg')}}" alt="" style="max-width: 250px; height: 250px;">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">GIẢM GIÁ 20% CHO TẤT CẢ ĐƠN HÀNG</h5>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Đặt hàng ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="{{ asset('shops/img/logo.jpg')}}" alt="">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">GIẢM GIÁ 20% CHO TẤT CẢ ĐƠN HÀNG</h5>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Đặt hàng ngay</a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Subscribe End -->


<div class="container-fluid pt-5" id="data-wrapper">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @include("shop.product_home")
    </div>
</div>

<!-- show more -->
<div class="col-12 text-center m-3">
    <button class="btn btn-success load-more-product" style="background-color: #696969;">Xem tiếp</button>
</div>
<div class="auto-load text-center ml-3" style="display: none;">
    <div class="d-flex justify-content-center">
        <div role="status">
            <span>Loading...</span>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--  ajax nè  -->
<script>
    var ENDPOINT = "{{ route('shop.layoutmaster') }}"
    var page = 1;
    $(".load-more-product").click(function() {
        page++;
        LoadMore(page);
    });

    function LoadMore(page) {
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                },
            })
            .done(function(response) {
                if (response.html == '') {
                    $('.auto-load').html("");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append("<div class='row m-5'>" + response.html + "</div>");
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Sever error occurred');
            });
    }
</script>
@endsection