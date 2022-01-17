<?php

namespace App\Http\Controllers;

use App\Models\PartTimeEmployee;
use App\Models\PartTimeEmployeeHourWorked;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartTimeEmployeeHourWorkedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userHours($id){
        $tasks = PartTimeEmployeeHourWorked::where('user_id' , $id)
            ->paginate(10);
        return view('parttime.workedhour.index', [
            'tasks' => $tasks,
        ]);
    }
    public function index()
    {
        $tasks = PartTimeEmployeeHourWorked::where('user_id' , Auth::id())
            ->paginate(10);
//            dd($hours);
        return view('parttime.workedhour.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $worked = PartTimeEmployeeHourWorked::where('user_id' , Auth::id())->where('notes','not paid')->get();
        $employee = PartTimeEmployee::where('user_id' , Auth::id())->first();
        $total_hours = 0 ;
        foreach ($worked as $task){
            $total_hours = $total_hours + $task->hours_amounts;
        }
        if($total_hours < $employee->total_hours){
            return view('parttime.workedhour.create', [
                'task' => new PartTimeEmployeeHourWorked(),
                'massge' => 'Please stick to the allowed hours',
                'available_hours' => $employee->total_hours - $total_hours ,
            ]);
        }else{
            return redirect()->route('workinghours.index');
        }

        return view('parttime.workedhour.create', [
            'task' => new PartTimeEmployeeHourWorked(),
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
        $worked = PartTimeEmployeeHourWorked::where('user_id' , Auth::id())->where('notes','not paid')->get();
        $employee = PartTimeEmployee::where('user_id' , Auth::id())->first();
        $total_hours = 0 ;
        foreach ($worked as $task){
            $total_hours = $total_hours + $task->hours_amounts;
        }
        $avalibile = $employee->total_hours - $total_hours ;
        if($request['hours_amounts'] <= $avalibile){
        $request['notes'] = 'not paid';
        $request['user_id'] = Auth::id();
        PartTimeEmployeeHourWorked::create($request->all());
        return redirect()->route('workinghours.index');
          }else {
        return view('parttime.workedhour.create', [
            'task' => new PartTimeEmployeeHourWorked(),
            'massge' => 'You have exceeded the limit of hours',
            'available_hours' => $avalibile ,
        ]);
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = PartTimeEmployeeHourWorked::findOrFail($id);
        if($task->notes == "not paid"){
            $task->delete();
        }
        return redirect()->route('workinghours.index');

    }
}
