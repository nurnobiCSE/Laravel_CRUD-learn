<?php

namespace App\Http\Controllers;

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
        return $request->all();
    }
}
