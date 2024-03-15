<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApply;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class JobApplyController extends Controller
{


    public function CreateJobApplyList(Request $request): JsonResponse {
        $candidate_id = $request->header('id');
        $job_id = $request->input('id');
        $title = $request->input('title');

        $experience = $request->input('experience');


        $data = JobApply::updateOrCreate(
            ['candidate_id' => $candidate_id, 'job_id' => $job_id],
            [
                'candidate_id' => $candidate_id,
                'job_id'=>$job_id,
                'title' => $title,

                'experience' => $experience

            ]
        );

        return ResponseHelper::Out('success for create or update', $data, 200);
    }

//Route::post('/job-apply', [JobApply::class, 'CreateJobApplyList'])->middleware([TokenVerificationMiddleware::class]);

    public function JobList(Request $request):JsonResponse{
        $candidate_id=$request->header('id');
        $data=JobApply::where('candidate_id',$candidate_id)->with('job')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    //Route::get('/job-list', [JobApply::class, 'JobList'])->middleware([TokenVerificationMiddleware::class]);

    // public function CreateJobApplyList(Request $request):JsonResponse{
    //     $candidate_id=$request->header('id');
    //     $job_id =$request->input('id');
    //     $apply_date = $request->input('apply_date');


    //     $data=JobApply::updateOrCreate(
    //         ['candidate_id' => $candidate_id,'job_id'=>$job_id],
    //         [
    //             'candidate_id' => $candidate_id,
    //             'job_id'=>$job_id,
    //             'apply_date' => $apply_date

    //         ]
    //     );

    //     return ResponseHelper::Out('success',$data,200);
    // }

}

