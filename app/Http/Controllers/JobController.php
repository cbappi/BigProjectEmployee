<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobWish;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{

    function JobPage(){
        return view('pages.dashboard.job-page');
    }

    public function JobDetails()
    {
        return view('pages.job-details');
    }


    function JobList(){

        $data = Job::all();
        return $data;
       //return ResponseHelper::Out('success',$data,200);

    //    $cs = Category::all();
    //    //dd($categories);
    //    return view('components.category.category-part', ['cs' => $cs]);

    }

    function JobListFrontPage(){


        return view('components.Job.job-list-front');

    }

    function JobListFront(){

        $data = Job::all();
        return ResponseHelper::Out('success',$data,200);

    }


    public function JobDetailsById(Request $request):JsonResponse{

        $data=Job::where('id',$request->id)->with('category','company')->get();

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


    function JobCreate(Request $request){
       // $user_id=$request->header('id');
        return Job::create([
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
            'skill'=>$request->input('skill'),
            'company_id'=>$request->input('company_id'),
            'salary'=>$request->input('salary'),
            'remark'=>$request->input('remark'),

        ]);
    }

    // function CategoryDelete(Request $request){
    //     $category_id=$request->input('id');
    //     $user_id=$request->header('id');
    //     return Category::where('id',$category_id)->where('user_id',$user_id)->delete();
    // }

    function JobDelete(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Job::where('id',$category_id)->delete();
    }


    function JobByID(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Job::where('id',$category_id)->first();
    }

    public function ListJobByRemark(Request $request):JsonResponse{
        $data=Job::where('remark',$request->remark)->with('company','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }


    public function ListJobByCategory(Request $request):JsonResponse{
        $data=Job::where('category_id',$request->id)->with('company','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }


    public function ListJobByCategoryHome(Request $request):JsonResponse{
        $data=Job::where('category_id',$request->id)->with('company','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }


    // public function CatQty(Request $request): JsonResponse {
    //     $categoryId = $request->id; // Corrected variable name
    //     $data = Job::where('category_id', $categoryId)->count(); // Changed variable name
    //     return ResponseHelper::Out('success', $data, 200);
    // }


    public function CatQty(Request $request) {
        $categoryId = $request->id;
        $count = Job::where('category_id', $categoryId)->count();
        return response()->json(['data' => $count]);

    }


// public function getCategoryCounts() {
//     $categories = Job::withCount('jobs')->get(['name', 'jobs_count as count']);
//     return response()->json(['data' => $categories]);
// }




    // function CategoryUpdate(Request $request){
    //     $category_id=$request->input('id');
    //     $user_id=$request->header('id');
    //     return Category::where('id',$category_id)->where('user_id',$user_id)->update([
    //         'name'=>$request->input('name'),
    //     ]);
    // }

    function JobUpdate(Request $request){
        $category_id=$request->input('id');
        //$user_id=$request->header('id');
        return Job::where('id',$category_id)->update([
            'name'=>$request->input('name'),
        ]);
    }

    public function CreateJobWishList(Request $request):JsonResponse{
        $candidate_id=$request->header('id');
        $data=JobWish::updateOrCreate(
            ['candidate_id' => $candidate_id,'job_id'=>$request->job_id],
            ['candidate_id' => $candidate_id,'job_id'=>$request->job_id],

        );
        return ResponseHelper::Out('success',$data,200);
    }
}

