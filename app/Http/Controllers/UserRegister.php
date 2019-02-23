<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Theme;
use App\User;

class UserRegister extends Controller
{
    function create(){
    	return view('register');
    }


    function store(Request $request){
        //$themes = Theme::orderBy('theme','asc')->get();
		$messages= ["name.required"=>"name is required","email.required"=>"email is required"];
		$this->validate(request(), [
            'name' => 'required|unique:users||min:4',
            'email' => 'required|unique:users||email',
            'password' => 'required|min:6'
        ],$messages);
        
			$user = User::create(request(['name', 'email', 'password']));
			auth()->login($user);
			return redirect()->to('login')->with('sucess','User registration sucessfull !');
            //return view('index')->with(['sucess'=>'User registration sucessfull !','themes'=>$themes]);
		
    }
}
