<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use App\Models\PartTimeEmployee;
use App\Models\PartTimeEmployeeHourWorked;
use App\Models\salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function invoice($id)
    {
        $salary = salary::with(['user'])->where('id' , $id)->first();
        return view('admin.salaryinvoice',['salary'=>$salary]);
    }

    public function fulltimeinvoice($id)
    {
        $salary = salary::with(['user'])->where('id' , $id)->where('user_id' , Auth::id())->first();
        if($salary != null){
            return view('fulltime.salaryinvoice',['salary'=>$salary]);
        }else{
            return redirect()->route('fulltime.incomes');
        }
        }


    public function parttimeinvoice($id)
    {
        $salary = salary::with(['user'])->where('id' , $id)->where('user_id' , Auth::id())->first();
        if($salary != null){
            return view('parttime.salaryinvoice',['salary'=>$salary]);
        }else{
            return redirect()->route('parttime.incomes');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exports()
    {
        $exports = salary::with(['user'])->paginate(10);
        return view('admin.salary.exports',['exports' =>$exports]);
    }


    public function index()
    {
    $users = User::with(['fullTimeEmployee','partTimeEmployee'])->where('user_type' , '<>','admin')->paginate(10);
//    dd($users);
    return view('admin.salary.index' , [
        'users' =>$users,
    ]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payForEmployee($id)
    {
        $user = User::find($id);
        if($user->user_type == "fulltime"){
            $fulltime = FullTimeEmployee::where('user_id' , $user->id)->first();
            $salary = new salary();
            $salary->user_id = $user->id;
            $salary->payment_method = $fulltime->payment_method ;
            $salary->salary_amount = $fulltime->salary_amount;
            $salary->tax = $fulltime->tax;
            $salary->total_salary = $fulltime->salary_amount * ((100-$fulltime->tax)/100) ;
            $salary->save();
            return redirect()->route('salary.index');
        }elseif($user->user_type == "parttime"){
            $parttime = PartTimeEmployee::where('user_id' , $user->id)->first();
            $salary = new salary();
            $salary->user_id = $user->id;
            $salary->payment_method = $parttime->payment_method ;

            $tasks = PartTimeEmployeeHourWorked::where('user_id',$user->id)->where('notes' ,'<>' , 'paid')->get();
            $total_hours = 0 ;
            foreach ($tasks as $task){
                $total_hours= $total_hours + $task->hours_amounts ;
                $task->update(['notes'=>'paid']);
            }
//            dd($total_hours);
            if($total_hours > 0) {
                $salary->salary_amount = $parttime->hour_price * $total_hours;
                if ($parttime->tax == '') {
                    $salary->tax = 'NO TAX';
                    $salary->total_salary = $salary->salary_amount;
                } else {
                    $salary->tax = $parttime->tax;
                    $salary->total_salary = $salary->salary_amount * ((100 - $salary->tax) / 100);
                }
                $salary->save();
            }
            return redirect()->route('salary.index');
        }
    }
    public function payForAllEmployess()
    {
        $users = User::where('user_type' , '<>' , 'admin')->get();
//        dd($users);
        foreach ($users as $user)
        if($user->user_type == "fulltime"){
            $fulltime = FullTimeEmployee::where('user_id' , $user->id)->first();
            $salary = new salary();
            $salary->user_id = $user->id;
            $salary->payment_method = $fulltime->payment_method ;
            $salary->salary_amount = $fulltime->salary_amount;
            $salary->tax = $fulltime->tax;
            $salary->total_salary = $fulltime->salary_amount * ((100-$fulltime->tax)/100) ;
            $salary->save();
        }elseif($user->user_type == "parttime"){
            $parttime = PartTimeEmployee::where('user_id' , $user->id)->first();
            $salary = new salary();
            $salary->user_id = $user->id;
            $salary->payment_method = $parttime->payment_method ;

            $tasks = PartTimeEmployeeHourWorked::where('user_id',$user->id)->where('notes' ,'<>' , 'paid')->get();
            $total_hours = 0 ;
            foreach ($tasks as $task){
                $total_hours= $total_hours + $task->hours_amounts ;
                $task->update(['notes'=>'paid']);
            }
//            dd($total_hours);
            if($total_hours > 0) {
                $salary->salary_amount = $parttime->hour_price * $total_hours;
                if ($parttime->tax == '') {
                    $salary->tax = 'NO TAX';
                    $salary->total_salary = $salary->salary_amount;
                } else {
                    $salary->tax = $parttime->tax;
                    $salary->total_salary = $salary->salary_amount * ((100 - $salary->tax) / 100);
                }
                $salary->save();
            }

        }
        return redirect()->route('salary.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHistory($id)
    {
        $user = User::find($id);
        $salaries = salary::where('user_id' , $user->id)->get();
        if($user->user_type == "fulltime"){
            $fulltime = FullTimeEmployee::where('user_id' , $user->id)->first();
            return view('admin.salary.history',[
                'employee' => $user,
                'fulltime' => $fulltime,
                'salaries'=>$salaries
            ]);
     }elseif($user->user_type == "parttime") {
            $parttime = PartTimeEmployee::where('user_id', $user->id)->first();
            return view('admin.salary.history',[
                'employee' => $user,
                'parttime'=>$parttime,
                'salaries'=>$salaries
            ]);
        }


    }
}
