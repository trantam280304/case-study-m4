@extends('shop.layout.master')
@section('content')
<div class="container-fluid py-5" style="background-color: #FFFFF0;">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active d-flex justify-content-center align-items-center">
                        <img class="w-100 h-100" src="{{ asset($product->image) }}" alt="Image" style="max-width: 250px; height: 250px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 lượt xem)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{number_format($product->price)  }} VND</h3>
            <p class="mb-4">{!! $product->description !!}</p>
            @if ($product->status == 0)
                <span class="badge badge-success">
                    <i class="fas fa-check-circle"></i> Còn hàng
                </span>
            @else
                <span class="badge badge-danger">
                    <i class="fas fa-times-circle"></i> Hết hàng
                </span>
            @endif
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1">

                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                
                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary px-3">
                    <i class="fas fa-shopping-cart"></i>
                    <button type="button" class="btn btn-sm text-dark p-0">
                        Giỏ hàng
                    </button>
                </a>
                 
                
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Chia sẻ:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm liên quan</span></h2>
    </div>

    <div class="row px-xl-5 pb-3">
        @foreach ( $relatedProducts as $product )
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ asset($product->image) }}" style="max-width: 230px; height: 250px;">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $product->name }} </h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{number_format( $product->price) }} VND </h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ route('shop.detail', $product->id) }}" class="btn btn-sm text-dark p-0">
                        <i class="fas fa-eye text-primary mr-1"></i>Chi tiết
                    </a>
                     <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Giỏ hàng</a>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection