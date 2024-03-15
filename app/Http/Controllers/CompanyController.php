<?php

namespace App\Http\Controllers;
use App\Helper\ResponseHelper;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{

    function CompanyPage(){
        return view('pages.dashboard.company-page');
    }

    function CompanyList(Request $request){
        //$user_id=$request->header('id');
        return Company::all();
    }


    public function CompanyView():JsonResponse
    {
        $data = Company::take(4)->get();
        //$data= Company::all();
        return  ResponseHelper::Out('success',$data,200);
    }

    function CompanyCreate(Request $request){
        $user_id=$request->header('id');
        return Company::create([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
        ]);
    }

    function CompanyDelete(Request $request){
        $employee_id=$request->input('id');
        $user_id=$request->header('id');
        return Company::where('id',$employee_id)->delete();
    }


    function CompanyByID(Request $request){
        $employee_id=$request->input('id');
        $user_id=$request->header('id');
        return Company::where('id',$employee_id)->first();
    }



    function CompanyUpdate(Request $request){
        $company_id=$request->input('id');
        $user_id=$request->header('id');
        return Company::where('id',$company_id)->update([
            'name'=>$request->input('name'),
            'status'=>$request->input('status')
        ]);
    }
}
