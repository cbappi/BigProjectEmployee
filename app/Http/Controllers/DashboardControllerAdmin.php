<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Jobpulse;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardControllerAdmin extends Controller
{
    function DashboardPage():View{
        return view('pages.dashboard.admin-dashboard-page');
    }

    function Summary(Request $request):array{

        //$user_id=$request->header('id');



        $product= Product::where('id')->count();
        $Category= Category::where('id')->count();
        $Customer=Customer::where('id')->count();
        $Invoice= Invoice::where('id')->count();
        $total=  Invoice::where('id')->sum('total');
        $vat= Invoice::where('id')->sum('vat');
        $payable =Invoice::where('id')->sum('payable');

        return[

            'product'=> $product,
            'category'=> $Category,
            'customer'=> $Customer,
            'invoice'=> $Invoice,
            'total'=> round($total,2),
            'vat'=> round($vat,2),
            'payable'=> round($payable,2)
        ];


    }
}
