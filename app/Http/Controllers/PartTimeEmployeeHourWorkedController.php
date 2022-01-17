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
        $request['notes'] = 'not paid';
        $request['user_id'] = Auth::id();
        PartTimeEmployeeHourWorked::create($request->all());
        return redirect()->route('workinghours.index');

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
