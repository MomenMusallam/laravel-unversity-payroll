<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{
    public function adminIndex()
    {
        $vacations = Vacation::where('notes' , 'pending')
            ->paginate(10);
        foreach ($vacations as $vacation){
            $user = User::find($vacation->user_id);
            $fulltime = FullTimeEmployee::where('user_id' , $vacation->user_id)->first();
            $vacation->name = $user->name;
            $vacation->vacations_amounts = $fulltime->number_of_vacations;

        }

        return view('admin.vacations', [
            'vacations' => $vacations,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacation = Vacation::where('user_id' , Auth::id())
            ->paginate(10);
//            dd($hours);
        return view('fulltime.vacation.index', [
            'vacations' => $vacation,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fulltime.vacation.create', [
            'vacation' => new Vacation(),
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
        $request['notes'] = 'pending';
        $request['user_id'] = Auth::id();
        Vacation::create($request->all());
        return redirect()->route('vacation.index');

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
    public function aprove( $id)
    {
        $vacation = Vacation::find($id);
        $vacation->notes = 'approved';
        $vacation->save();
        return redirect()->route('admin.vacation');
    }
    public function history( $id)
    {
        $vacation = Vacation::where('user_id' , $id)
            ->paginate(10);
        return view('fulltime.vacation.index', [
            'vacations' => $vacation,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacation = Vacation::findOrFail($id);
        if($vacation->notes == "pending"){
            $vacation->delete();
        }
        return redirect()->route('vacation.index');

    }
}
