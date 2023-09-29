<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchOrderRequest;
use App\Http\Repositories\OrderRepository;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function searchOrder(SearchOrderRequest $request)
    {
        $document_type = $request->get("document_type");
        $document = $request->get("document");

        $orderCode = "";

        if ($request->filled("order_code"))
            $orderCode = $request->get("order_code");

        return response()->json($this->orderRepository->searchOrder($document, $document_type, $orderCode));
    }
}
