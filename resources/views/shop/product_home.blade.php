@foreach ($products as $product)
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="{{ asset($product->image) }}" style="max-width: 230px; height: 250px;">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">{{ $product->name }} </h6>
            <div class="d-flex justify-content-center">
                <h6>{{number_format($product->price) }} VND</h6>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="{{ route('shop.detail', $product->id) }}" class="btn btn-sm text-dark p-0">
                <i class="fas fa-eye text-primary mr-1"></i>Chi tiết
            </a>
            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                    class="fas fa-shopping-cart text-primary mr-1"></i>Giỏ hàng</a>
        </div>
    </div>
</div>
@endforeach
