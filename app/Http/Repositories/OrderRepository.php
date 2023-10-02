<?php
namespace App\Http\Repositories;

use App\Models\Customer;
use App\Models\Order;

class OrderRepository
{
    public function searchOrder($document, $document_type, $orderCode)
    {
        $orders = [];

        if (empty($orderCode))
        {
            $orders = Customer::with("orders.details.product")
                        ->where("document", $document)
                        ->where("document_type", $document_type)
                        ->get();
        }
        else
        {
            $order = Order::find($orderCode);
            
            if (!isset($order))
                return $this->responseNotFound("Order");

            $orders = $order->with("details.product", "customer")
                ->where("id", $orderCode)
                ->whereHas("customer", function ($query) use ($document, $document_type) {
                    $query->where("document", $document)
                        ->where("document_type", $document_type);
                })
                ->get();
        }

        if (empty($orders) || count($orders) <= 0)
            return $this->responseNotFound("Customer");

        return response()->json([
            "response" => "successful",
            "message" => "Customer Orders",
            "data" => $orders
        ]);
    }

    public function responseNotFound($name)
    {
        return response()->json([
            "response" => "unsuccessful",
            "message" => "$name Not Found, please verify the information.",
        ]);
    }
}

?>