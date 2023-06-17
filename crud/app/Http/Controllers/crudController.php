<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
 
class crudController extends Controller
{
    public function showData(){
        $allData = employee::Paginate(2);  //for keep only previous and next button (::simplePaginate(2))
        return view('index',compact('allData'));
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
        return redirect('/');
    }

    public function editData($id=null){
        $editData = employee::find($id);
        return view('edit_data',compact('editData'));
    }

    public function updateData(Request $request,$id){
        $filds = [
            'fname'=>'required|max:15',
            'lname'=>'required|max:10',
            'email'=>'required|email'
        ];
        $this->validate($request,$filds);


        $employee = employee::find($id);
        $employee->firstname = $request->fname;
        $employee->lastname = $request->lname;
        $employee->email = $request->email;
        $employee->save();
        session()->flash('msg', "Updateed successfully!");
        return redirect('/');
    }
}
