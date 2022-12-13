<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\reg;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class register extends Controller
{
  function insert_reg(Request $request){
    $val=Validator::make($request->all(),[
        'name' => 'required|min:3|string',
        'email' => 'required|unique:regs,email',
        'password' => 'required|min:5|max:8',
        'cpassword' => 'required|same:password'
    ])->validate();
    // if($val->fails()){
    //     return view('regform',['validation_errors'=>$val->errors()]);
    // }
    $name=$request->name;
    $email=$request->email;
    $password=$request->password;
    $cpassword=$request->cpassword;
    $obj=new reg(['name'=>$name,'email'=>$email,'password'=>$password,'cpassword'=>$cpassword]);
    $obj->save();

    $token=$obj->createToken('apitoken')->plainTextToken;

    $res=['reg'=>$obj,'token'=>$token];
    return response($res,201);
  }   

  function get_users(){
    $users=reg::get();
    return response(['all_users'=>$users]);
  }

  function login(Request $request){
    // $request->validate([
    //   'email' => 'required|unique:regs,email',
    //   'password' => 'required'
    // ]);
    $email=$request->email;
    $password=$request->password;
    $user=reg::where('email','=',$email)->first();
    if($user){
      if($password==$user->password){
        $token=$user->createToken('apitoken')->plainTextToken;
        $res=['user'=>$user,'token'=>$token];
        return response($res,201);
      }  
    }
    else{
      return response(['msg'=>'incorrect email or password'],401);
    }
  }

  function logout(){
    auth()->user()->tokens()->delete();
    return response(['message'=>'user logged out']);
  }
}
