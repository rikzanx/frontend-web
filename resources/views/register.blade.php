<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style-register.css') }}">
        <script src="{{ asset('js/login-register.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        </style>
    </head>
    <body>
        <img src="{{ asset('img/login-register/Group 1300.png') }}" alt="" class="mobile-icon">
        <div class="container">
            <div class="left">
                <div class="content">
                    <p class="sub-head">Dapatkan Aplikasi Ternaknesia</p>
                    <div class="bottom">
                        <a href="#" class="playstore"></a>
                        <a href="#" class="appstore"></a>
                    </div>
                </div>
            </div>
            <div class="right">
                <form action="/register_post" method="POST" class="form-container">
                    <h3 class="login-heading">Daftar</h3>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="input-div nama">
                        <div class="label">Nama</div>
                        <input type="text" placeholder="Martina Desi" name="name" required>
                    </div>
                    <div class="input-div email">
                        <div class="label">Email</div>
                        <input type="text" placeholder="email@gmail.com" name="email" required>
                    </div>
                    <div class="input-div nomor">
                        <div class="label">Nomor Handphone</div>
                        <input type="text" placeholder="0836626222" name="telp" required>
                    </div>
                    <div class="input-div">
                        <div class="label">Password</div>
                        <div class="show">
                            <input class="password" name="password" minlength="6" type="password" placeholder="*******" required>
                            <i class="fas fa-eye eye pass"></i>
                        </div>
                    </div>
                    <div class="eye-off satu"></div>
                    <div class="input-div">
                        <div class="label">Password Konfirmasi</div>
                        <div class="show">
                            <input class="password-verif" name="password_verif" minlength="6" type="password" placeholder="*******" required>
                            <i class="fas fa-eye eye pass-verif"></i>
                        </div>
                    </div>
                    <div class="login-bottom">
                        <div class="hint">
                            <a href="/login">Login</a>
                        </div>
                        <input type="submit" value="Daftar" class="btn-submit">
                    </div>
                </form>
                <div class="right-bottom">
                    <br>
                    Sudah daftar? <a href="/register-verification">Aktivasi akun</a>
                </div>
            </div>
        </div>
    </body>
</html>
