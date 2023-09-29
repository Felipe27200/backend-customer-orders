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
            $orders = Customer::with("orders.details")
                        ->where("document", $document)
                        ->where("document_type", $document_type)
                        ->get();
        }
        else
        {
            $orders = Order::with("details", "customer")
                ->where("id", $orderCode)
                ->whereHas("customer", function ($query) use ($document, $document_type) {
                    $query->where("document", $document)
                        ->where("document_type", $document_type);
                })
                ->get();
        }

        if (empty($orders) || count($orders) <= 0)
        {
            return response()->json([
                "response" => "unsuccessful",
                "message" => "Order Not Found, please verify the information.",
            ]);
        }
        else
        {
            return response()->json([
                "response" => "successful",
                "message" => "Customer Orders",
                "data" => $orders
            ]);
        }
    }
}

?>