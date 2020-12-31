<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ChartShowResource;
use App\Http\Resources\Dashboard\TopCategoriesShowResource;
use App\Http\Resources\Dashboard\TopProductShowResource;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getChart(){
        $orders = Order::all();
        return ChartShowResource::collection($orders);
    }

    public function getTopProduct(){
        $products = Order_detail::with(['product'])->select('order_details.id_product',DB::raw('COUNT(quantity) as sell'))
            ->groupBy('id_product')
            ->orderBy('sell', 'desc')->get(15);
//        $products->product();

//        dd($products);
        return TopProductShowResource::collection($products);
    }

    public function getTopCategories(){
        $categories = Category::withCount(['detail_orders as sell' => function($query){
            $query->select(DB::raw('SUM(quantity)'));
        }])->orderBy('sell', 'desc')->get(15);
        return TopCategoriesShowResource::collection($categories);
    }
}
