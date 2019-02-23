<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
class ThemeController extends Controller
{
    public function store (Request $request){
        $this->validate($request,[
            'theme'=>'required|unique:themes'         
        ]);

    $theme = new Theme;
    $theme->theme = $request->input('theme');
    $theme->user_id = \Auth::user()->id;
    $theme->save();  
    
    return redirect('/posts/create')->with('theme',$theme);

    }

    public function edit($id){
        //$theme = Theme::find($id);
        return view('index');
    }
    
    public function update($id, Request $request){
        
        $theme = Theme::find($id);
        $theme->theme = $request->input('new_theme');
        $theme->save();
        return back()->with('success','Theme  Updated ');
        

    }
}
