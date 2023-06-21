<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crudController extends Controller
{
    public function showData(Request $request){
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $names = DB::table('employees')->where('firstname','LIKE','%'.$search_text.'%')->paginate(2);
            $names->appends($request->all());
            return view('index',['names'=>$names]);
        }else{

            $allData = employee::orderBy('id','desc')->Paginate(2);  //for keep only previous and next button (::simplePaginate(2))
            return view('index',compact('allData'));
        }
       
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
    public function deleteData(Request $request,$id=null){
        $deleteData = employee::find($id);
        $deleteData->delete();
        session()->flash('msg', "Data has been deleted!");
        return redirect('/');

    }
}
