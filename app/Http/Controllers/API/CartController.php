<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Cart\CreateCartRequest;
use App\Http\Requests\CartItem\CreateCartItemRequest;
use App\Http\Resources\Cart\CartResource;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $carts = Cart::useFilters()->dynamicPaginate();

        return CartResource::collection($carts);
    }

    public function store(CreateCartRequest $request): JsonResponse
    {
        $cart = Cart::create($request->validated());

        return $this->responseCreated('Cart created successfully', new CartResource($cart));
    }

    public function show(Cart $cart): JsonResponse
    {
        return $this->responseSuccess(null, new CartResource($cart));
    }

    public function update(UpdateCartRequest $request, Cart $cart): JsonResponse
    {
        $cart->update($request->validated());

        return $this->responseSuccess('Cart updated Successfully', new CartResource($cart));
    }

    public function destroy(Cart $cart): JsonResponse
    {
        $cart->delete();

        return $this->responseDeleted();
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        if(!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'status' => true,
                'subtotal' => 0,
                'discount' => 0,
                'tax' => 0,
                'grand_total' => 0
            ]);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $request->product_id)->where('product_type', $request->product_type)->first();

        if(!$cartItem){
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'product_type' => $request->product_type,
                'product_name' => $request->product_name,
                'unit_price' => $request->unit_price,
                'quantity' => $request->quantity,
                'line_total' => (float)$request->unit_price * (float)$request->quantity
            ]);
        }else{
            $cartItem->update([
                'unit_price' => $request->unit_price,
                'quantity' => $request->quantity,
                'line_total' => (float)$request->unit_price * (float)$request->quantity
            ]);
        }

        return $this->responseSuccess('Product added to cart successfully', []);

    }

    public function getCartItems()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if(!$cart){
            return $this->responseSuccess('Cart not found', []);
        }

        $cartItems = CartItem::where('cart_id', $cart->id)->get();

        return $this->responseSuccess("Cart items found", CartItemResource::collection($cartItems));
    }

    public function deleteFromCart($productId)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if(!$cart){
            return $this->responseSuccess('Cart not found', []);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->delete();

        return $this->responseSuccess('Product deleted from cart successfully', []);
    }


}
