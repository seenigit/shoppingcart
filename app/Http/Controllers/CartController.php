<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepository;
use App\Repositories\OrderRepository;

class CartController extends Controller
{
    /**
     * Instance of User Repository
     */
    protected $userRepository;
    
    /**
     * Instance of Product Repository
     */
    protected $productRepository;
    
    /**
     * Instance of Order Repository
     */
    protected $orderRepository;
    
    public function __construct(UserRepository $userRepository,
                                ProductRepository $productRepository,
                                OrderRepository $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function getProductDetails($productId)
    {
        $product = $this->productRepository->getProduct($productId);
        return view('user.productdetails', array('product' => $product));
    }
    
    public function buyProduct(Request $request)
    {
        if($user = \Auth::user())
        {
            $userId = $user->id;
            $productId = $request->input('id');
            $response = $this->orderRepository->saveOrder($userId, $productId);
            if($response['status'])
                return response()->json(['success' => true, 'message' => $response['message']], 200);
            return response()->json(['success' => false, 'message' => $response['message']], 500);
        }
        return response()->json(['success' => false, 'message' => 'Please login before placing the order'], 401);
    }
    
    public function viewCart(){
        $user = \Auth::user();
        $order = $this->orderRepository->getUserOrder($user->id);
        $orderDetails = $order->orderDetails()->get();
        return view('user.viewcart', array('orderdetails' => $orderDetails));
    }
    
    public function deleteOrderDetail(Request $request){
        $user = \Auth::user();
        $orderDetailId = $request->input('orderdetailid');
        $this->orderRepository->deleteOrderDetailById($orderDetailId);
        return \Redirect::intended('/viewcart');
    }
}
