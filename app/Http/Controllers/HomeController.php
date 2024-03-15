<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    // function HomePage(){
    //     return view('pages.home');
    // }

    function HomePage(){
        $categories = Category::all();
        //$companies = Company::all();
        return view('pages.home', compact('categories'));
    }





}
