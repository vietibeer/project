<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Register</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{url('public/frontend/css/animateRegister.css')}}">
        <script src="{{url('public/backend/bootstrap/js/jquery-3.1.1.min.js')}}"></script>
    </head>
    <body>
        <div class="login-box">
            <div class="login-page">
                <div class="form">

                    <!-- From Register -->
                    <form class="register-form" method="POST" action="">
                        {{ csrf_field() }}
                        <p class="login-box-msg"><strong>{{ $message or '' }}</strong></p>
                        <input type="text" placeholder="Full Name" name="user_fullname" />
                        <input type="text" placeholder="Email" name="user_email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="Number" placeholder="Phone" name="phone"/>
                        <input type="text" placeholder="Address" name="address"/>
                        <button type="submit">Register</button>
                        <p class="message">Already registered? <a href="#">Sign In</a></p>
                    </form>

                    <!-- From Login -->
                    <p class="login-box-msg"><strong>{{ $message or '' }}</strong></p>
                    <form class="login-form" method="POST" action="{{ route('name-backend-check-login') }}">
                        {{ csrf_field() }}

                        <input type="email" placeholder="Email" name="user_email" value="{{ old('user_email') }}"/>
                        @if ($errors->has('user_email'))
                        <p>
                            <strong>{{ $errors->first('user_email') }}</strong>
                        </p>
                        @endif

                        <input type="password" placeholder="Password" name="password" />
                        @if ($errors->has('password'))
                        <p>
                            <strong>{{ $errors->first('password') }}</strong>
                        </p>
                        @endif
                        <button type="submit">Login</button>
                        <p class="message">Not registered? <a href="#">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.login-box -->
        <script>
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script>

    </body>
</html>