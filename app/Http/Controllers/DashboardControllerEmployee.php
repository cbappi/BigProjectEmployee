<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Jobpulse;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardControllerEmployee extends Controller
{
    function DashboardPage():View{
        return view('pages.dashboard.employee-dashboard-page');
    }

    function Summary(Request $request):array{

        $user_id=$request->header('id');


        $product= Product::where('user_id',$user_id)->count();
        $Category= Category::where('user_id',$user_id)->count();
        $Customer=Customer::where('user_id',$user_id)->count();


        return[

            'product'=> $product,
            'category'=> $Category,
            'customer'=> $Customer

        ];


    }
}
