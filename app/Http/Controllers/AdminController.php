<?php

namespace App\Http\Controllers;

use App\Models\FullTimeEmployee;
use App\Models\PartTimeEmployee;
use App\Models\salary;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $part = PartTimeEmployee::all();
        $user->partNum = $part->count();
        $full = FullTimeEmployee::all();
        $user->fullNum = $full->count();
        $full = Vacation::where('notes' , 'pending')->get();
        $user->vacarions = $full->count();


        $salaries= salary::all();
        $total = 0 ;
//        dd($salaries);
        foreach ($salaries as $salary){
            $total = $total + $salary->salary_amount;
        }

    $user->amount_paid = $total ;

        return view('admin.index',['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit()
    {
        $id = Auth::id();
        $employee = User::findOrFail($id);
        return view('admin.profile', [
            'employee' =>$employee ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        $employee = User::findOrFail($userId);
        if($request['password'] != '') {
            $request['password'] = Hash::make($request['password']);
        }else{
            $request['password'] = $employee->password;
        }
        $employee->update( $request->all() );
        return redirect()->route('admin.edit');

//
//        $customer = new Buyer([
//            'name'          => 'John Doe',
//            'custom_fields' => [
//                'email' => 'test@example.com',
//            ],
//        ]);
//
//        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
//
//        $invoice = Invoice::make()
//            ->buyer($customer)
//            ->taxRate(15)
//            ->addItem($item);
//
//        return $invoice->stream();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
