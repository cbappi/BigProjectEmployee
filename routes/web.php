<?php

use App\Models\JobApply;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Middleware\TokenAuthenticate;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\JobpulseController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardControllerAdmin;

use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\DashboardControllerEmployee;
use App\Http\Controllers\DashboardControllerCandidate;


//Pages
Route::get('/job-details', [JobController::class, 'JobDetails']);
Route::get('/JobDetailsById/{id}', [JobController::class, 'JobDetailsById']);

//Page Routes
Route::get('/admin/login',[JobpulseController::class,'AdminLogin']);

//JobPulse login
Route::post('/admin-login',[JobpulseController::class,'UserLogin']);
Route::get('/dashboard-admin',[DashboardControllerAdmin::class,'DashboardPage']);
Route::get('/dashboard-employee',[DashboardControllerEmployee::class,'DashboardPage']);
Route::get('/dashboard-candidate',[DashboardControllerCandidate::class,'DashboardPage']);
Route::get("/summary-employee",[DashboardControllerEmployee::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/summary-candidate",[DashboardControllerCandidate::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/summary-admin",[DashboardControllerAdmin::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/employeePage',[EmployeeController::class,'EmployeePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/companyPage',[CompanyController::class,'CompanyPage']);


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);




//Candidate Login , Registration, Reset Password , OTP Send and Verify Start
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::get('/candidateLogin',[CandidateController::class,'CandidateLoginPage']);
Route::post('/candidate-login',[CandidateController::class,'CandidateLogin']);
Route::get('/candidateRegistration',[CandidateController::class,'CandidateRegistrationPage']);
Route::post('/candidate-registration',[CandidateController::class,'CandidateRegistration']);
Route::get('/CandidatesendOtp',[CandidateController::class,'CandidateSendOtpPage']);
Route::post('/candidate-send-otp',[CandidateController::class,'CandidateSendOTPCode']);
Route::get('/CandidateverifyOtp',[CandidateController::class,'CandidateVerifyOTPPage']);
Route::post('/candidate-verify-otp',[CandidateController::class,'CandidateVerifyOTP']);
Route::get('/CandidateresetPassword',[CandidateController::class,'CandidateResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/candidate-reset-password',[CandidateController::class,'CandidateResetPassword'])->middleware([TokenVerificationMiddleware::class]);

//Candidate Login , Registration, Reset Password , OTP Send and Verify Finished





Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);

// Page Routes
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/selectLogin',[UserController::class,'LoginSelection']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);

//Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/jobPage',[JobController::class,'JobPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/categoryPage',[CategoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);






// Category API
Route::post("/create-category",[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-category",[CategoryController::class,'CategoryList']);
Route::get("/CategoryList2",[CategoryController::class,'CategoryList2']);
Route::get("/list-category1",[CategoryController::class,'CategoryList1']);
//Route::get("/",[HomeController::class,'CategoryView'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/summ', [CategoryController::class, 'sumByCategory']);


//Route::get('/list-category', [CategoryController::class, 'CategoryList']);


Route::post("/delete-category",[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-category",[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/category-by-id",[CategoryController::class,'CategoryByID'])->middleware([TokenVerificationMiddleware::class]);

// Employee API // Big project

Route::get('/CreateJobWishList/{job_id}', [JobController::class, 'CreateJobWishList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-employee",[EmployeeController::class,'EmployeeCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-employee",[EmployeeController::class,'EmployeeList']);
Route::get("/view-employee",[EmployeeController::class,'EmployeeView']);
Route::post("/delete-employee",[EmployeeController::class,'EmployeeDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-employee",[EmployeeController::class,'EmployeeUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/employee-by-id",[EmployeeController::class,'EmployeeByID'])->middleware([TokenVerificationMiddleware::class]);



// Company API // Big project
Route::post("/create-company ",[CompanyController::class,'CompanyCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-company",[CompanyController::class,'CompanyList'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/com-view",[CompanyController::class,'CompanyView']);


Route::post("/delete-company",[CompanyController::class,'CompanyDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-company",[CompanyController::class,'CompanyUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/company-by-id",[CompanyController::class,'CompanyByID'])->middleware([TokenVerificationMiddleware::class]);

// Jobs API // Big project
Route::get('/cat-qty/{id}', [JobController::class, 'CatQty']);

Route::get('/job-list', [JobApply::class, 'JobList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/job-apply', [JobApply::class, 'CreateJobApplyList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/by-category',[CategoryController::class,'ByCategoryPage']);
Route::get('/by-category-home',[CategoryController::class,'ByCategoryPageHome']);
Route::post("/create-job",[JobController::class,'JobCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-job",[JobController::class,'JobList'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/job-list-front-page",[JobController::class,'JobListFrontPage']);
Route::get("/job-list-front",[JobController::class,'JobListFront']);
Route::get("/job-view",[JobController::class,'JobView']);
Route::get('/ListJobByRemark/{remark}', [JobController::class, 'ListJobByRemark']);
Route::get('/ListJobByCategory/{id}', [JobController::class, 'ListJobByCategory']);
Route::get('/ListJobByCategoryHome/{id}', [JobController::class, 'ListJobByCategoryHome']);


Route::post("/delete-job",[JobController::class,'JobDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-job",[JobController::class,'JobUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/job-by-id",[JobController::class,'JobByID'])->middleware([TokenVerificationMiddleware::class]);


// Customer API
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);


// Product API
Route::post("/create-product",[ProductController::class,'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-product",[ProductController::class,'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-product",[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/product-by-id",[ProductController::class,'ProductByID'])->middleware([TokenVerificationMiddleware::class]);



// Invoice
Route::post("/invoice-create",[InvoiceController::class,'invoiceCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/invoice-select",[InvoiceController::class,'invoiceSelect'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/invoice-details",[InvoiceController::class,'InvoiceDetails'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/invoice-delete",[InvoiceController::class,'invoiceDelete'])->middleware([TokenVerificationMiddleware::class]);


// SUMMARY & Report
Route::get("/summary",[DashboardController::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sales-report/{FormDate}/{ToDate}",[ReportController::class,'SalesReport'])->middleware([TokenVerificationMiddleware::class]);

//


