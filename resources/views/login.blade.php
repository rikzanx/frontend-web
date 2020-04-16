<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
        <script src="{{ asset('js/login-register.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        </style>
    </head>
    <body>
        <img src="{{ asset('img/login-register/Group 1294.png') }}" alt="" class="mobile-icon">
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
                <form action="/login_check" method="POST" class="form-container">
                    
                    <h3 class="login-heading">Login</h3>
                    <div class="sub-heading">Masuk ke akun Ternaknesia</div>
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
                    <div class="input-div email">
                        <div class="label">Email</div>
                        <input type="text" name="email" placeholder="email@gmail.com" required>
                    </div>
                    <div class="input-div">
                        <div class="label">Password</div>
                        <div class="show">
                            <input class="password" type="password" name="password" placeholder="*******" required>
                            <i class="fas fa-eye eye pass"></i>
                        </div>
                    </div>
                    <div class="eye-off satu"></div>
                    <div class="login-bottom">
                        <div class="hint">
                            <a href="/password-reset">Lupa password?</a>
                        </div>
                        <input type="submit" value="Masuk" class="btn-submit">
                    </div>
                </form>
                <div class="right-bottom">
                    Belum punya akun? <a href="/register">Buat baru</a>
                </div>
            </div>
        </div>
    </body>
</html>
