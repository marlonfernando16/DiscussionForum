@include('includes.menu');
@include('includes.styleshow')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<div class="section">
	<h3>{{ucfirst(trans($post->titulo))}}</h3>
	<hr class="#f5f5f5 grey lighten-4">
	<div>
		{!! $post->post !!}
	</div>

	@forelse($post->answers()->get() as $answer)
       <div style="border-top:20px;">
        <hr size="1" style="border:1px dashed gray;">
        <div class="comments-list">
	       <div class="media">
	           <span class="i-circle md-userpost  blue left " style="margin:0">{{strtoupper(str_limit($post->user->first()->name,1,''))}}</span>
	           <p class="pull-right"><small>5 days ago</small></p>
	           <div class="media-body">
	           	<div  class="usernamepost blue-text">{{ucfirst(trans($post->user->first()->name ))}}</div>
                  <div class="userdatepost grey-text">{{date('d-m-Y',strtotime($post->created_at))}}</div>
	              <p>{{$answer->answer}}</p>
	              
	              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
	            </div>
	        </div>
	    </div>      
              	         
    @empty
    	jfjffgfgj
	@endforelse
	<form action="{{ url('/posts/answer') }}" method="post">
		{{csrf_field()}}
		
		<input hidden name="post_id" value="{{$post->id}}">

	 @if(Auth()->user())
	  <input type="text" name="answer" id="answer">
	  <div class="input-field col s12 center">
			<button class="btn waves-effect  #1976d2 blue darken-2 waves-light" id="saveData" type="submit" name="action">Submit <i class="material-icons right">send</i>
  			</button>
	</div>
	@endif	
	</form>
	<!--
	<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('answer');
        answer = document.getElementById('answer').value;
    </script>
 -->