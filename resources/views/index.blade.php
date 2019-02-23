  
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@include('includes.menu')
@include('includes.styleindex')

<body style="background-color: #fafafa">

<div class="section">
<div id="container">
  <nav class="nav-extended white pushpin z-depth-3" style="width:90%; margin-bottom:20px;">
    <div class="nav-wrapper ">
      <a href="#" class="brand-logo black-text left truncate">Themes</a>
      
      <form action="" class="browser-default right">
        <input id="search-input" placeholder="Search" type="text" class="browser-default search-field" name="query" value="" autocomplete="off" aria-label="Search box">
        <label for="search-input"><i class="material-icons search-icon">search</i></label> 
        <i class="material-icons search-close-icon">cancel</i>
        <!--<div class="search-popup">
          <div class="search-content">
            <label class="search-heading">Most Visited</label>
            <ul class="popup-list">
              <li class=""><a class="grey-text" href="#">laravel</a></li>
              <li class=""><a class="grey-text" href="#">jeniffer</a></li><li class="">
              <a class="grey-text" href="#">java</a></li><li class="">
              
            </ul>
          </div>
        </div>-->
      </form>

    </div>
      <div class="my-grey">
        <div class="nav-content container">
          <ul class="tabs tabs-transparent">
            <li id="scale" class="nav-btn top-margin scale-transition scale-out "><a  class="waves-effect waves-light btn blue search-hide" href="#">this will hide!</a></li>
          </ul>
        </div>
      </div>
  
  </nav>
  
<!-- FIM -->


@if(count([$themes])>0)
  @foreach($themes as $theme)
  <div class="col s12 m8 offset-m2 l6 offset-l3">
      <div class="card-panel white hoverable lighten-5 z-depth-1" style="width:90%;height:9em;padding-top:5px">
        <div class="row">
            <div class="col s12 m6 l3">
              <p><span class="i-circle md-login center blue ">{{strtoupper(str_limit($theme->theme,1,''))}}</span></p>
            </div>
            <div class="col s12 m4 l5">
            <span class="black-text">
                <h4><a href="{{ url('/posts', $theme->id) }}" class="black-text text-darken-3" style="font-weight:700"> {{ucfirst(trans($theme->theme))}} <a></h4>
                <small class="grey-text">created on {{date('d-m-Y',strtotime($theme->created_at))}}</small>
              </span>
            </div>
            <div class="col s12 m4 l2">
              <h4 class="numposts">{{count($theme->posts)}}</h4>
              <small class="grey-text">POSTS</small>
            </div>
          @if(Auth()->user() && Auth()->user()->id == $theme->user()->first()->id)
           <div class="col s12 m4 l2">
              <p>
                <a href="#" onclick="openModal( {{$theme->id}} )" class="modal-trigger right" id="url">
                  <i class="material-icons right md-24 grey-text">update</i></a>
              </p>
            </div>
          @endif  
        </div>
      </div>
  </div> 
  <div class="modal" id="theme{{$theme->id}}">
    <div class="modal-header blue">
        <div class="classemuda" style=" color: white; display: flex; flex-direction: row;">
            <i class="material-icons prefix " style="font-size: 30px; margin-bottom: 10px; margin-top:10px; margin-left:3px">
            add_circle_outline</i>
             <h5 style="margin-top:12px; margin-left:5px">Update your Theme</h5>
        </div>
    </div>
    <div class="modal-content">
        <form action="{{url('themes/update/'.$theme->id)}}"  method="post" class="col s12">
        {{csrf_field()}}
        <div class="oi">{{$theme->id}}</div>
        <!--Campo Tema -->
            <div class="input-field hoverable col s12 m6">
                <i class="material-icons prefix">title</i>
                <input type="text" name="new_theme" class ="validate" id="title"  maxlength="40" required autofocus>
                <label for="theme">Theme</label>
            </div> 
    
    <div class ="modal-footer">
      <input type="submit" name="update">ok</input>
      <a class="btn red modal-close modal-action">Cancel</a>
    </div>
    </form>
  </div>
</div>
 
  @endforeach
  
  {!! (new Landish\Pagination\Materialize($themes))->render() !!}
  
@else
  <p> No themes found </p>
@endif


@include('includes.footerindex')
</body>

<script>
$('#modal').modal();
function openModal($t){
  var id = "#theme"+ $t;
    $(id).modal('open'); 
}


</script>
</html>
