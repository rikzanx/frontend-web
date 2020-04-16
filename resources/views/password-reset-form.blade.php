<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset</title>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-register.css') }}">
        <script src="{{ asset('js/login-register.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        </style>
    </head>

    <body>
        <!-- <div class="background"></div> -->

        <img src="{{ asset('img/login-register/Group 1300.png') }}" alt="" class="mobile-icon">
        <div class="container">
            <div class="left">
                <div class="content">
                    <p class="sub-head">Dapatkan Aplikasi Ternaknesia</p>
                    <div class="bottom">
                        <a href="#" class="playstore">

                        </a>
                        <a href="#" class="appstore">
                        </a>
                    </div>
                </div>
            </div>
            <div class="right">
                <form action="/password-reset-action" method="POST" class="form-container">
                    <h1></h1>
                    <h3 class="login-heading">Password Reset</h3>
                    @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        {{ Session::get('alert-success') }}
                    </div>
                    @endif
                    @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        {{ Session::get('alert') }}
                    </div>
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value="{{ Session::get('email_reset') }}" required>
                    <input type="text" name="token" value="$2y$10$700qFzJ9mlF47JiNq6fHJ.kUu7c/SX.dLrGa5jGA4h.z/Gprc1Nlm" required>
                    <div class="input-div email">
                        <div class="label">Password baru</div>
                        <input type="password" placeholder="********" name="password" value="" required>   
                    </div>
                    <div class="input-div email">
                        <div class="label">Konfirmasi password baru</div>
                        <input type="password" placeholder="********" name="password_confirmation" value="" required>   
                    </div>
                    <div class="login-bottom">
                        <div class="hint">
                            <a href="/login">Login</a>
                        </div>
                        <input type="submit" value="Submit New Password" class="btn-submit">
                    </div>


                </form>
            </div>


        </div>

    </body>

</html>
