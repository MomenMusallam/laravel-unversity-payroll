<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use App\Models\salary;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FullTimeEmployeeController extends Controller
{
    public function incomes(){
        $user = Auth::user();
        $incomes = salary::where('user_id' , $user->id)->paginate(20);
        return view('parttime.income',['user'=>$user , 'incomes' => $incomes]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::user();
        $sallary = salary::where('user_id' , $user->id)->get();
        $totalIncome = 0 ;
        foreach ($sallary as $sa){
            $totalIncome = $totalIncome + $sa->total_salary;
        }
        $vacations  =  Vacation::where('notes' ,'approved')->get();
        $vacation_num = 0 ;
        foreach ($vacations as $vacation){
            $vacation_num=   $vacation_num + 1;
        }

        $user->total = $totalIncome;
        $user->vacation_num =   $vacation_num;
        $fulltime = FullTimeEmployee::where('user_id' , $user->id)->first();
        $user->avrg =      $vacation_num / $fulltime->number_of_vacations ;

        return view('fulltime.index' , ['user' => $user , 'fulltime' => $fulltime]);
    }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::join('full_time_employees', 'full_time_employees.user_id', '=', 'users.id')
            ->select()
            ->paginate(10);
//            dd($employees);
        return view('admin.fulltime.index', [
            'employees' => $employees,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fulltime.create', [
            'employee' => new user(),
            'fullTimeEmployee' => new FullTimeEmployee(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['password'] = Hash::make($request['password']);
        $request['user_type'] = 'fulltime';
        $user = User::create( $request->all());
        $request['user_id'] = $user->id;
        FullTimeEmployee::create($request->all());
        return redirect()->route('full-time.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
//        dd($employee->id);
        $fullTimeEmployee = FullTimeEmployee::where('user_id' , $employee->id)->first();

        return view('admin.fulltime.edit', [
            'employee' => $employee,
            'fullTimeEmployee' =>$fullTimeEmployee

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $employeeFull = FullTimeEmployee::where('user_id' , $id)->first();
        $employee->update( $request->all() );
        $employeeFull->update( $request->all() );
        return redirect()->route('full-time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        FullTimeEmployee::where('user_id' , $employee->id)->delete();
        $employee->delete();
        return redirect()->route('full-time.index');
    }

    public function fullTimeIndex()
    {

    }
    public function profile()
    {
        $id = Auth::id();
        $employee = User::findOrFail($id);
        $fullTimeEmployee = FullTimeEmployee::where('user_id' , $employee->id)->first();
        return view('fulltime.profile', [
            'employee' => $employee,
            'fullTime' =>$fullTimeEmployee
        ]);


    }


    public function updateProfile(Request $request)
    {
        $userId = Auth::id();
        $employee = User::findOrFail($userId);
        $employeeFull = FullTimeEmployee::where('user_id' , $userId)->first();
        if($request['password'] != '') {
            $request['password'] = Hash::make($request['password']);
        }else{
           $request['password'] = $employee->password;
        }
        $employee->update( $request->all() );
        $employeeFull->update( $request->all() );
        return redirect()->route('fulltime.index');
    }

}
