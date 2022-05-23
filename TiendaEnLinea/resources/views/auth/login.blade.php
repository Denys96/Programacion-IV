<!DOCTYPE html>
<html lang="en">
<head>
   <title>S.P.S by ever|ever</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
           <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-10 p-b-15">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                     @csrf
                    <span class="login100-form-title p-b-35">
                        Inciar sesión
                    </span>
                   <!--  <span class="login100-form-avatar">
                        <img src="img/logo-uta.png" alt="AVATAR">
                    </span> -->

                    <div class="wrap-input100 validate-input m-t-45 m-b-35" data-validate = "Enter username">
                        <input id="email" class="input100  @error('mail') is-invalid @enderror" placeholder="Correo electrónico" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100" ></span>
                        @error('email')
                              <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                               </span>
                        @enderror

                    </div>

                    <div class="wrap-input100 validate-input m-b-50  @error('password') is-invalid @enderror" data-validate="Enter password">
                        <input placeholder="Contraseña" class="input100" type="password" id="password" name="password" required autocomplete="current-password">
                        <span class="focus-input100" ></span>
                        @error('password')
                              <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                               </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                     @if (Route::has('password.request'))
                                    
                    <ul class="login-more p-t-15">
                        <li class="m-b-8">
                            <span class="txt1">
                                ¿Olvidaste tu 
                            </span>

                            <a href="{{ route('password.request') }}" class="txt2">
                                contraseña?
                            </a>
                        </li>

                    </ul>  @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>