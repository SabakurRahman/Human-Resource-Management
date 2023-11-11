<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HolidayControlller;
use App\Http\Controllers\IncrementController;
use App\Http\Controllers\LeaveManagementController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleAssociation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect()->route('login');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::group(['middleware'=> 'company_verify'], static function(){
        Route::resource('/role', RoleController::class)->middleware('role:Super Admin');
        Route::get('/user-role-association', [UserRoleAssociation::class, 'index'])->name('user.role_association')->middleware('role:Super Admin');
        Route::get('/assign-role-to-user/{user}', [UserRoleAssociation::class, 'assign_role_to_user'])->name('user.assign_role_to_user')->middleware('role:Super Admin');
        Route::put('/assign-role-to-user/{user}', [UserRoleAssociation::class, 'assign_role_to_user_sync'])->name('user.assign_role_to_user_sync')->middleware('role:Super Admin');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('role:Super Admin|Employee');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('role:Super Admin|Employee');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('role:Super Admin|Employee');
        Route::resource('/companies', CompanyController::class)->middleware('role:Super Admin|Admin');
        Route::resource('/departments', DepartmentController::class)->middleware('role:Super Admin|Admin');
        Route::resource('/employees', EmployeeController::class)->middleware('role:Super Admin|Hr');
        Route::get('/my-salary-show',[EmployeeController::class,'mySalaryShow'])->name('my-salary-show')->middleware('role:Employee');
        Route::get('/leave-management/create', [LeaveManagementController::class,'create'])->name('leave-management.create')->middleware('role:Employee');
        Route::post('/leave-management/store', [LeaveManagementController::class,'store'])->name('leave-management.store')->middleware('role:Employee');
        Route::resource('/leave-management', LeaveManagementController::class)->except(['create', 'store'])->middleware('role:Super Admin|Hr');
        Route::get('/my-leave-report', [LeaveManagementController::class,'myLeaveShow'])->name('my-leave-report')->middleware('role:Employee|Hr');
        Route::get('/mark-attendance', [AttendanceController::class, 'markAttendance'])->name('mark.attendance')->middleware('role:Employee|Hr');
        Route::post('/store-attendance', [AttendanceController::class, 'storeAttendance'])->name('store.attendance')->middleware('role:Employee|Hr');
        Route::post('/mark-another-attendance/{id}', [AttendanceController::class, 'markAnotherAttendance'])->name('mark.another.attendance')->middleware('role:Hr');
        Route::get('/attendance-report', [AttendanceController::class, 'attendanceReport'])->name('attendance.report')->middleware('role:Employee|Hr');
        Route::get('/attendance-report-all', [AttendanceController::class, 'allAttendanceReport'])->name('attendance.report.all')->middleware('role:Super Admin|Hr');
        Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index')->middleware('role:Super Admin|Hr');
        Route::resource('/increment', IncrementController::class)->middleware('role:Super Admin|Hr');
        Route::resource('/notice', NoticeController::class)->middleware('role:Admin|Hr|Employee');
        Route::get('/pay-slip',[PDFController::class,'paySlip'])->name('pay-slip');
        Route::resource('/holiday', HolidayControlller::class)->middleware('role:Super Admin|Hr');
        Route::get('/notice-board', [NoticeController::class, 'noticeBoard'])->name('notice.board');
        Route::get('/attendance-log',[AttendanceController::class, 'attendanceLog'])->name('attendance.log')->middleware('role:Hr|Employee');
        Route::get('/hr-dashboard',[DashboardController::class,'index'])->name('front.index')->middleware('role:Super Admin|Admin|Hr');
        Route::put('payslip-print',[PDFController::class,'payslipPrint'])->name('payslip.print');
    });
});

require __DIR__.'/auth.php';
