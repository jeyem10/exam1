<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employees;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employee = employee::get($id);
        return view ('employee.index',compact('employees'));
    }

    public function create()
    {
        return view ('employee.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255|string',
        'lname' => 'required|max:255|string',
        'midname' => 'required|max:255|string',
        'age' => 'required|integer',
        'address' => 'required|max:255|string',
        'zip' => 'required|integer',
        
    ]);

    employee::create($request->all());
    return view ('employee.index');
    }

    public function ( int $id)
    {
        $employee = employee::find($id);
        return view ('employee.edit');
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'midname' => 'required|max:255|string',
                'age' => 'required|integer',
                'address' => 'required|max:255|string',
                'zip' => 'required|integer',
                
            ]);
        
            employee::findOrFail($id)->update();
            return redirect ()->back()->('status','Employee Updated Successfully!');
            }
    }

    public function destroy(int $id){
        $employees = employee::findOrFail($id);
        $employees->delete();
        return  redirect()->back()->('status','Employee Deleted');
    }
}
