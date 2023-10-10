@extends('shop.layout.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <!-- Topbar Start -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <form class="checkout-form" method="POST" action="">
                        @csrf
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="John" value="{{ Auth()->guard('customers')->user()->name }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" id="email" type="text" placeholder="example@email.com" value="{{ Auth()->guard('customers')->user()->email }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phone">Mobile No</label>
                                    <input class="form-control" id="phone" type="text" placeholder="+123 456 789" value="{{ Auth()->guard('customers')->user()->phone }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="address">Address Line 1</label>
                                    <input class="form-control" id="address" type="text" placeholder="123 Street" value="{{ Auth()->guard('customers')->user()->address }}">
                                </div>
                            </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Check out</button>
    
                        @else
                            <h4 style="text-align: center;">
                                Vui lòng đăng nhập trước khi thanh toán nhé :
                                <br> </br>
                                |
                                <i class="fas fa-chevron-down" style="display: block; margin: 0 auto;"></i>
                                </br>
                            </h4>
                            <div style="text-align: center;">
                                <a href="{{ route('login.index') }}" class="btn btn-danger">Đăng Nhập</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            @php $totalAll = 0; @endphp
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                @php
                                    $total = $details['price'] * $details['quantity'];
                                    $totalAll += $total;
                                @endphp
                                <h5 class="font-weight-medium mb-3">Products</h5>
                                <div class="d-flex justify-content-between">
                                    <p><input type="hidden" value="{{ $id }}" name="product_id[]">{{ $details['name'] ?? '' }}</p>
                                    <p>x <input type="hidden" value="{{ $id }}" name="quantity[]"> {{ $details['quantity'] ?? '' }} <input type="hidden" value="{{ $total }}" name="total[]"> </p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>{{ number_format($total) }} $</p>
                                </div>
                                <hr class="mt-0">
                            @endforeach
                        @endif
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"> {{ number_format($totalAll) }} $</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-footer border-secondary bg-transparent">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
x