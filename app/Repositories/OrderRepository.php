<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderRepository
{
    public function __construct()
    {
        
    }

    public function saveOrder($userId, $productId, $quantity = 1)
    {
        try{
            $order = $this->getUserOrder($userId);
            if(!$order)
                $order = new Order();
            $order->user_id = $userId;
            $order->status = 'initiated';
            $order->save();
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $productId;
            $orderDetail->user_id = $userId;
            $orderDetail->quantity = $quantity;
            $product = Product::find($productId);
            $orderDetail->total_price = ($product->price * $quantity);
            $orderDetail->save();
        } catch (Exception $ex) {
            return ['status' => false, 'message' => 'Something went wrong, please try again later.'];
        }
        return ['status' => true, 'message' => 'Order has been placed successfully', 'order' => $order];
    }
    
    public function getUserOrder($userId)
    {
        return Order::where('user_id', $userId)
               ->where('status', 'initiated')
               ->first();
    }
    
    public function deleteOrderDetailById($orderDetailId)
    {
        $orderDetail = OrderDetail::find($orderDetailId);
        $orderDetail->delete();
    }
}
