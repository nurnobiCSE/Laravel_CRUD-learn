<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
 
class crudController extends Controller
{
    public function showData(){
        return view('index');
    }

    public function addData(){
        return view('add_data');
    }
    public function storeData(Request $request){
        $filds = [
            'fname'=>'required|max:15',
            'lname'=>'required|max:10',
            'email'=>'required|email'
        ];
        $this->validate($request,$filds);


        $employee = new employee();
        $employee->firstname = $request->fname;
        $employee->lastname = $request->lname;
        $employee->email = $request->email;
        $employee->save();
        session()->flash('msg', "added successfully!");
        return redirect()->back();
    }
}
