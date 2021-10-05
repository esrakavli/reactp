<?php

namespace App\Http\Controllers\api\home;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(Request $request){
        $user=request()->user();
        $totalCustomer=Customer::where('userId',$user->id)->count();
        $totalProduct=Product::where('userId',$user->id)->count();
        $totalCategory=Product::where('userId',$user->id)->count();
        $total=[
            'product'=>$totalProduct,
            'category'=>$totalCategory,
            'customer'=>$totalCustomer,
        ];
        return response()->json([
            'success'=>true,
            'total'=>$total,
        ]);
    }
}
