<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reg;
use Illuminate\Support\Facades\Validator;

class register extends Controller
{
  function insert_reg(Request $request){
    $val=Validator::make($request->all(),[
        'name' => 'required|min:3',
        'email' => 'required|unique:regs,email',
        'password' => 'required|min:5|max:8',
        'cpassword' => 'required|same:password'
    ])->validate();
    if($val->fails()){
        return view('regform',['validation_errors'=>$val->errors()]);
    }
    $name=$request->name;
    $email=$request->email;
    $password=$request->password;
    $cpassword=$request->cpassword;
    $obj=new reg(['name'=>$name,'email'=>$email,'password'=>$password,'cpassword'=>$cpassword]);
    $obj->save;
  }   
}
