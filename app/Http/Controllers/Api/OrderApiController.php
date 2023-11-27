<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class OrderApiController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            $cart = $request->cart;
            $address = $request->address;
            $email = $request->email;
            $name = $request->name;
            $phone = $request->phone;

            $order = new Order();
            $order->customer_id  = $request->customer_id ; // Sử dụng giá trị customer_id  được truyền vào qua request.
            $order->total = 1;
            $order->date_ship = date("Y-m-d");
            $order->date_at = date("Y-m-d");
            $order->save();
            if (count($cart) > 0) {
                foreach ($cart as $key => $cartItem) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    // Kiểm tra xem key 'product_id' có tồn tại trong $cartItem không
                    if (isset($cartItem['product_id'])) {
                        $orderDetail->product_id = (int)$cartItem['product_id'];
                        $orderDetail->quantity = $cartItem['quantity'];
                        $orderDetail->total = $cartItem['quantity'] * $cartItem['product']['price'];
                        $orderDetail->save();
                    } else {
                        // Xử lý khi không có key 'product_id'
                        return response()->json([
                            'error' => 'Invalid Data',
                            'message' => 'Missing product_id in cart item',
                        ], 400);
                    }
                }
            }
            return response()->json([
                'message' => 'Order successfully registered',
                'order' => $order
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => $e->getMessage(), // Thêm dòng này để hiển thị thông báo lỗi chi tiết
            ], 500);
        }
    }
}