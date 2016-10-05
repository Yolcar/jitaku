<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Order;
use App\OrderItem;

class CartController extends Controller
{
    public function __construct()
    {
      if (!\Session::has('cart')) {
        \Session::put('cart', array());
      }
    }

    public function show()
    {
      $cart = \Session::get('cart');
      $total = $this->total();
      return view('cart', compact('cart', 'total'));
    }

    public function add(Product $product)
    {
      $cart = \Session::get('cart');
      if(isset($cart[$product->slug])){
        $product->quantity = $cart[$product->slug]->quantity + 1;
      }else {
        $product->quantity = 1;
      }

      $cart[$product->slug] = $product;
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }

    public function delete(Product $product)
    {
      $cart = \Session::get('cart');
      unset($cart[$product->slug]);
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }

    public function trash()
    {
      \Session::forget('cart');

      return redirect()->route('cart-show');
    }

    public function update(Product $product, $quantity)
    {
      $cart = \Session::get('cart');
      $cart[$product->slug]->quantity = $quantity;
      \Session::put('cart', $cart);

      return redirect()->route('cart-show');
    }


    public function total()
    {
      $cart = \Session::get('cart');
      $total = 0;
      foreach ($cart as $item) {
        $total += $item->price * $item->quantity;
      }

      return $total;
    }

    public function orderDetail()
    {
      if (count(\Session::get('cart'))<= 0){
        return redirect()->route('home');
      }
      $cart = \Session::get('cart');
      $total = $this->total();

      return view('order-detail', compact('cart','total'));
    }

    public function processOrder()
    {
      $this->saveOrder();
      \Session::forget('cart');
      return redirect()->route('home')->with('message', 'Orden realizada con exito');
    }

    public function saveOrder()
    {
      $subtotal = 0;
      $cart = \Session::get('cart');
      $shipping = 100;

      foreach ($cart as $product) {
        $subtotal += $product->quantity * $product->price;
      }

      $order = Order::create([
        'subtotal' => $subtotal,
        'shipping' => $shipping,
        'user_id'  => \Auth::user()->id
      ]);

      foreach ($cart as $product) {
        $this->saveOrderItem($product, $order->id);
      }
    }

    public function saveOrderItem($product, $order_id)
    {
      OrderItem::create([
        'price'       => $product->price,
        'quantity'    => $product->quantity,
        'product_id'  => $product->id,
        'order_id'    => $order_id
      ]);
    }

}
