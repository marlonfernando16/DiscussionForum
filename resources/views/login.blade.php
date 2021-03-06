
@extends('layout')
@include('includes.stylelogin')
@include('includes.modalsucess')

<body class="#1565c0 blue darken-3">
    
  <div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link">Login</a>
      <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login">
    
    <ul class="social-network social-circle">
       <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
       <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
       <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
    </ul>

    </div>

    <form class="email-login" action="{{ url('/login' )}}" method="post">
        {{csrf_field()}}
        @if (isset($_COOKIE['last_email']))
        <div class="input-field hoverable col s12">
            <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email-login" value="<?=$_COOKIE['last_email']?>" maxlength="50" required>
                <label for="email">Email address</label>
        </div>
        @else
          <div class="input-field hoverable col s12">
            <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email-login" value="" maxlength="50" required>
                <label for="email">Email address</label>
        </div>
        @endif

                    
        <div class="input-field hoverable col s12">
            <i class="material-icons prefix">lock</i>
             <input id="password-login" type="password" name="password" value="" class="validate">
            <label for="password">Password</label>
        </div>

        <div class="input-field col s12 ">
            <p>
                <label>
                <input type="checkbox"  />
                <span>Remember me</span>
                </label>
            </p>
        </div>
        <br>
        
        <div class="form-field center-align">
            <button class="waves-effect waves-light btn #1e88e5 blue darken-1  hoverable ">Log in</button>
        </div>
        <div class="error">
        @if ($errors->any())
          @foreach ($errors->all() as $error)
              <span class="red-text text-darken-2">{{$error}}</span>
              <br>
          @endforeach
        @endif
        </div>
    </form>

    <form class="email-signup" action="{{ url('/register')}}" method="post">
          {{csrf_field()}}
            <!--Campo nome -->
            <div class="input-field hoverable col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="name" class ="validate" id="name" maxlength="40" required autofocus>
                <label for="nome">Name</label>
            </div>
            <!--Campo Email -->
            <div class="input-field hoverable col s12">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" class="validate"  maxlength="50" required>
                <label for="email" >Email</label>
            </div>


            <!--Senha -->
            <div class="input-field hoverable col s12">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" type="password" name="password" class="validate">
                  <label for="password">Password</label>
            </div>

            <!--Botões-->
            <div class="input-field col s12">
                <button class="waves-effect waves-light btn #1e88e5 blue darken-1  hoverable"><i class="large material-icons right">done</i>register</button>
            </div>
            <div class="error">
             @if ($errors->any())
              @foreach ($errors->all() as $error)
                <span class="red-text text-darken-2">{{$error}}</span>
                <br>
              @endforeach
            @endif
        </div>
    </form>
  </div>
  @include('includes.footer')
</body>

</html>