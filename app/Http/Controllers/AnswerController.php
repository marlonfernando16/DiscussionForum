<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Post;
use Illuminate\Support\Facades\Input;

class AnswerController extends Controller
{
    public function store(Request $request){
    	$post = Post::find($request->input('post_id'));
        $answer_post = new Answer;
        $answer_post->answer = $request->input('answer');
        $answer_post->user_id = \Auth::user()->id;
        $answer_post->post_id = $request->input('post_id');
        $answer_post->save();

         
        return view('posts.show')->with(['post' => $post, 'answer_post' => $answer_post]);
    }
}
