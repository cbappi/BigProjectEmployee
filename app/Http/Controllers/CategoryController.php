<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    function CategoryPage(){
        return view('pages.dashboard.category-page');
    }

    public function ByCategoryPage()
    {
        return view('pages.job-by-category');
    }

    public function ByCategoryPageHome()
    {
        //return view('components.Job.ByJobListHome');
        return view('pages.home');
    }

    function CategoryList(){

        $data = Category::all();
        return ResponseHelper::Out('success',$data,200);

    //    $cs = Category::all();
    //    //dd($categories);
    //    return view('components.category.category-part', ['cs' => $cs]);

    }

    function CategoryList1(){

        return $data = Category::all();


    }

    public function sumByCategory()
    {
        $categories = Job::count('remark')

    ;




        return view('pages.sum-page', compact('categories'));
    }

    function CategoryList2(){

        $data = Category::all();
        return ResponseHelper::Out('success',$data,200);

    }



    // public function CategoryView()
    // {
    //     $categories = Category::all();
    //     return view('components.category.category-part', compact('categories'));
    // }

    // public function CategoryList():JsonResponse
    // {
    //     $data= Category::all();
    //     return  ResponseHelper::Out('success',$data,200);
    // }


    function CategoryCreate(Request $request){
       // $user_id=$request->header('id');
        return Category::create([
            'name'=>$request->input('name'),

        ]);
    }

    // function CategoryDelete(Request $request){
    //     $category_id=$request->input('id');
    //     $user_id=$request->header('id');
    //     return Category::where('id',$category_id)->where('user_id',$user_id)->delete();
    // }

    function CategoryDelete(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Category::where('id',$category_id)->delete();
    }


    function CategoryByID(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Category::where('id',$category_id)->first();
    }



    // function CategoryUpdate(Request $request){
    //     $category_id=$request->input('id');
    //     $user_id=$request->header('id');
    //     return Category::where('id',$category_id)->where('user_id',$user_id)->update([
    //         'name'=>$request->input('name'),
    //     ]);
    // }

    function CategoryUpdate(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Category::where('id',$category_id)->update([
            'name'=>$request->input('name'),
        ]);
    }
}
