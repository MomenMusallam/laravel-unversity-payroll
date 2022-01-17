<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use App\Models\PartTimeEmployee;
use App\Models\PartTimeEmployeeHourWorked;
use App\Models\salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartTimeEmployeeController extends Controller
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
          $hours  =  PartTimeEmployeeHourWorked::where('notes' ,'not paid')->get();
            $hours_amounts = 0 ;
            foreach ($hours as $hour){
                $hours_amounts=   $hours_amounts + $hour->hours_amounts;
            }

$user->total = $totalIncome;
$user->hours_amounts =   $hours_amounts;
        $parttime = PartTimeEmployee::where('user_id' , $user->id)->first();
        $user->avrg =      $hours_amounts / $parttime->total_hours ;

        return view('parttime.index' , ['user' => $user , 'parttime' => $parttime]);
    }
    public function index()
    {
        $employees = User::join('part_time_employees', 'part_time_employees.user_id', '=', 'users.id')
            ->select()
            ->paginate(10);
//            dd($employees);
        return view('admin.parttime.index', [
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
        return view('admin.parttime.create', [
            'employee' => new user(),
            'partTime' => new PartTimeEmployee(),
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
        $request['user_type'] = 'parttime';
        $user = User::create( $request->all());
        $request['user_id'] = $user->id;
        PartTimeEmployee::create($request->all());
        return redirect()->route('part-time.index');
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
        $partTime = PartTimeEmployee::where('user_id' , $employee->id)->first();
        return view('admin.parttime.edit', [
            'employee' =>$employee ,
            'partTime' => $partTime,
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
        $employeePart = PartTimeEmployee::where('user_id' , $id)->first();
        $employee->update( $request->all() );
        $employeePart->update( $request->all() );
        return redirect()->route('part-time.index');
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
        PartTimeEmployee::where('user_id' , $employee->id)->delete();
        $employee->delete();
        return redirect()->route('part-time.index');

    }
    public function fullTimeIndex()
    {

    }
    public function profile()
    {
        $id = Auth::id();
        $employee = User::findOrFail($id);
        $partTime = PartTimeEmployee::where('user_id' , $employee->id)->first();
        return view('parttime.profile', [
            'employee' =>$employee ,
            'partTime' => $partTime,
        ]);
    }


    public function updateProfile(Request $request)
    {
        $userId = Auth::id();
        $employee = User::findOrFail($userId);
        $employeePart = PartTimeEmployee::where('user_id' , $userId)->first();
        if($request['password'] != '') {
            $request['password'] = Hash::make($request['password']);
        }else{
            $request['password'] = $employee->password;
        }
        $employee->update( $request->all() );
        $employeePart->update( $request->all() );
        return redirect()->route('parttime.index');
    }
}
