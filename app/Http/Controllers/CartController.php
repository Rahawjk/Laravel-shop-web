<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Coupon;



class CartController extends Controller
{

    public function add(Request $request, $productId)
    {

        $product = Product::findOrFail($productId);


        $cart = session()->get('cart', []);


        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {

            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => '🧴',
            ];
        }


        session()->put('cart', $cart);


        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }
    public function increment($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantity increased!');
    }
    public function decrement($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']--;
            if ($cart[$productId]['quantity'] <= 0) {
                unset($cart[$productId]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantity decreased!');
    }
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $discount = 0;
        $couponCode = session()->get('coupon_code', null);
        $couponDiscount = session()->get('coupon_discount', 0);

        return view('cart.checkout', compact('cart', 'total', 'couponCode', 'couponDiscount'));
    }


    public function placeOrder(Request $request)
    {

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);


        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }


        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }


        $discount = session()->get('coupon_discount', 0);
        $totalAfterDiscount = $total - $discount;


        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'notes' => $request->notes,
            'total_price' => $totalAfterDiscount,
            'status' => 'pending',
        ]);


        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'product_name' => $item['name'],
                'product_price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }


        session()->forget('cart');
        session()->forget('coupon_code');
        session()->forget('coupon_discount');


        return redirect()->route('cart.index')->with('success', 'Your order has been placed successfully! Order #' . $order->id);
    }
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|exists:coupons,code',
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon->isValid()) {
            return redirect()->route('checkout')->with('error', 'This coupon is invalid or expired!');
        }

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        if ($coupon->min_order_amount && $total < $coupon->min_order_amount) {
            return redirect()->route('checkout')->with('error', 'Minimum order amount for this coupon is $' . number_format($coupon->min_order_amount / 10000, 2));
        }

        $discount = 0;
        if ($coupon->type == 'fixed') {
            $discount = min($coupon->value, $total);
        } else {
            $discount = ($total * $coupon->value / 100);
        }

        session()->put('coupon_code', $coupon->code);
        session()->put('coupon_discount', $discount);

        return redirect()->route('checkout')->with('success', 'Coupon applied successfully! You saved $' . number_format($discount / 10000, 2));
    }

    public function removeCoupon()
    {
        session()->forget('coupon_code');
        session()->forget('coupon_discount');

        return redirect()->route('checkout')->with('success', 'Coupon removed!');
    }
}