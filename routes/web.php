<?php

// use App\Http\Controllers\BudgetCalculatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InvestmentCalculatorController;
use App\Http\Controllers\RetirementCalculatorController;
use App\Http\Controllers\BudgetCalculatorController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {

    if (Auth::user()->role == "admin") {
        return redirect('admin/dashboard');
    }
    return view('user/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/investment-calculator', [InvestmentCalculatorController::class, 'index'])->name('investment_calculator.index');
Route::post('/investment-calculator', [InvestmentCalculatorController::class, 'calculate'])->name('investment_calculator.calculate');
Route::get('/retirement-calculator', [RetirementCalculatorController::class, 'index'])->name('retirement_calculator.index');
Route::post('/retirement-calculator', [RetirementCalculatorController::class, 'calculate'])->name('retirement_calculator.calculate');
Route::get('/budget', [BudgetCalculatorController::class, 'index'])->name('budget_calculator.index');
Route::get('/mybudgets', [BudgetCalculatorController::class, 'myBudgets'])->name('budget_calculator.list')->middleware(['auth', 'verified']);


Route::get('/budget/{id}/delete', [BudgetCalculatorController::class, 'deleteBudget'])->name('budget_calculator.destroy')->middleware(['auth', 'verified']);
// Route::get('/budget', [BudgetCalculatorController::class, 'index'])->name('budget_calculator.index');
// Route::post('/budget-calculator', [BudgetCalculatorController::class, 'calculate'])->name('budget_calculator.calculate');
Route::get('/budget/{month}/{year}', [BudgetCalculatorController::class, 'showMonthlyBudget'])->name('budget_calculator.show')->middleware(['auth', 'verified']);

Route::post('/save', [BudgetCalculatorController::class, 'store'])->middleware(['auth', 'verified'])->name('budget_calculator.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/blog-posts', [FrontendController::class, 'blogposts'])->name('blog-posts');
Route::get('/blog-details/{id}', [FrontendController::class, 'blogdetails'])->name('blog-details');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/about-us', [FrontendController::class, 'aboutus'])->name('about-us');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
// Route::get('/', function(){ return view('index');})->name('index');

// ADMIN DASHBOARD ROUTES
Route::resource('admin/blog', BlogController::class)->middleware(['auth', 'verified', Admin::class])->names('blogs');
Route::resource('admin/user', UserController::class)->middleware(['auth', 'verified', Admin::class])->names('users');
Route::post('contact/store', [FrontendController::class, 'contactus'])->name('contact.us');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified', Admin::class])->name('admin-dashboard');
Route::resource('/admin/dashboard/youtube', YoutubeController::class)->middleware(['auth', 'verified', Admin::class])->names('youtube.index')->names(['youtube']);


Route::resource('course', CourseController::class)->middleware(['auth', 'verified',]);
Route::resource('lesson', LessonController::class)->middleware(['auth', 'verified',]);
Route::get('{course}/add/lesson', [LessonController::class, 'create'])->middleware(['auth', 'verified',])->name('create.lesson');
Route::get('add/contact', [AdminController::class, 'contacts'])->middleware(['auth', 'verified',])->name('contact.index');
// Route::post('{course_id}/lesson/store{', [LessonController::class, 'store' ])->middleware(['auth', 'verified',])->name('lesson.add');
Route::resource('course/register', CourseRegistrationController::class)->middleware(['auth', 'verified'])->names('course.register');
Route::get('mycourses', [CourseRegistrationController::class, 'mycourses'])->middleware(['auth', 'verified'])->name('mycourses');


// USER DASHBOARD ROUTES
