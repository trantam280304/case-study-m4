@extends('shop.layout.master')

@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            @php $total = 0 @endphp
            @if(session('cart'))
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th style="width:30%">Products</th>
                        <th>Price</th>
                        <th style="width:8%">Quantity</th>
                        <th>IMG</th>
                        <th>Total</th>
                        <th style="width:10%" >ACTION</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td class="align-middle"><img alt="" style="width: 50px;"> {{ $details['name'] }}</td>
                        <td class="align-middle">${{ $details['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" min="1" class="form-control quantity update-cart" />
                        </td>
                        </td>
                        <td class="align-middle"><img src="{{ $details['image'] }}" alt="" style="width: 70px;"> </td>

                        <td class="align-middle"> $ {{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <div class="col-lg-4">
            
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>


            </div>
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Total</h5>
                    <h5 class="font-weight-bold">${{ $total }}</h5>
                </div>
                <button class="btn btn-block btn-primary my-3 py-3"> Checkout</button>
                <a href="{{ route('shop.layoutmaster') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart')}}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection

<!-- Cart End -->