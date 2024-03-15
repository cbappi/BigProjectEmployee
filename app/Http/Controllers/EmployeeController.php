<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    function EmployeePage(){
        return view('pages.dashboard.employee-page');
    }

    function EmployeeList(Request $request){
        //$user_id=$request->header('id');
        return Employee::all();
    }

    public function EmployeeView()
    {
        $employees = Employee::all();
        return view('pages.employee-page', compact('employees'));
    }





    function EmployeeCreate(Request $request){
        $user_id=$request->header('id');
        return Employee::create([
            'name'=>$request->input('name'),
            'role'=>$request->input('role'),
        ]);
    }

    function EmployeeDelete(Request $request){
        $employee_id=$request->input('id');
        $user_id=$request->header('id');
        return Employee::where('id',$employee_id)->delete();
    }


    function EmployeeByID(Request $request){
        $employee_id=$request->input('id');
        $user_id=$request->header('id');
        return Employee::where('id',$employee_id)->first();
    }



    function EmployeeUpdate(Request $request){
        $employee_id=$request->input('id');
        $user_id=$request->header('id');
        return Employee::where('id',$employee_id)->update([
            'name'=>$request->input('name'),
            'role'=>$request->input('role')
        ]);
    }
}
