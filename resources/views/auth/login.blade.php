<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - AKREDATA</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px; background: #8fe7c3fd; }
        .wrapper { width: 1250px; max-width: 100%; min-height: 640px; display: grid; grid-template-columns: 1fr 1fr; background: #fff; border-radius: 32px; overflow: hidden; box-shadow: 0 25px 70px -15px rgba(0,0,0,.5); }
        .left { background: linear-gradient(to bottom, #aef1cf, #e6f1ea); padding: 60px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; position: relative; }
        .logo { width: 160px; height: 160px; object-fit: contain; margin-bottom: 24px; }
        .left h2 { font-size: 40px; color: #042E1F; font-weight: 800; letter-spacing: 2.8px; text-transform: uppercase; }
        .left .tagline { font-size: 12px; color: rgba(4, 46, 31, 0.6); font-weight: 600; letter-spacing: 2.4px; text-transform: uppercase; margin-top: 8px; }
        .left .divider-dot { width: 8px; height: 8px; background-color: #042E1F; border-radius: 50%; margin: 20px 0; }
        .subtitle { color: #4b5563; max-width: 380px; font-size: 14px; line-height: 1.6; }
        .subtitle span { font-weight: 700; color: #042E1F; }
        .left-footer { position: absolute; bottom: 24px; font-size: 11px; color: rgba(4, 46, 31, 0.4); letter-spacing: 1.1px; text-transform: uppercase; }
        .right { background: #042E1F; padding: 60px 80px; display: flex; flex-direction: column; justify-content: center; position: relative; color: white; }
        .form-box { width: 100%; max-width: 360px; margin: 0 auto; }
        .right h1 { font-size: 32px; font-weight: 700; margin-bottom: 4px; }
        .right .desc { font-size: 14px; color: #d1d5db; font-weight: 300; margin-bottom: 32px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 12px; font-weight: 500; color: #d1d5db; text-transform: uppercase; letter-spacing: 1.2px; }
        .input-icon { position: relative; display: flex; align-items: center; }
        .input-icon span { position: absolute; left: 16px; color: #9ca3af; display: flex; align-items: center; pointer-events: none; }
        input[type="email"], input[type="password"] { width: 100%; height: 52px; padding: 0 16px 0 48px; border-radius: 12px; border: 1px solid rgba(156, 163, 175, 0.4); background: transparent; color: white; font-size: 14px; transition: .25s; }
        input[type="email"]:focus, input[type="password"]:focus { outline: none; border-color: #4CAF50; box-shadow: 0 0 0 1px #4CAF50; }
        .options { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; font-size: 13px; }
        .options label { display: flex; align-items: center; gap: 10px; margin: 0; color: #d1d5db; cursor: pointer; text-transform: none; letter-spacing: normal; }
        .options input { width: 16px; height: 16px; accent-color: #4CAF50; cursor: pointer; }
        .options a { text-decoration: none; color: #4CAF50; font-weight: 500; }
        .btn-submit { width: 100%; height: 54px; border: none; border-radius: 12px; cursor: pointer; color: white; font-size: 14px; font-weight: 600; background: #4CAF50; letter-spacing: 1.2px; box-shadow: 0 10px 25px -5px rgba(76,175,80,0.3); transition: .3s; display: flex; justify-content: center; align-items: center; gap: 8px; }
        .btn-submit:hover { background: #43a047; transform: translateY(-1px); }
        .divider { display: flex; align-items: center; margin: 24px 0; }
        .divider-line { flex-grow: 1; border-top: 1px solid rgba(255, 255, 255, 0.1); }
        .divider span { padding: 0 16px; color: rgba(255, 255, 255, 0.3); font-size: 11px; text-transform: uppercase; }
        .signup { text-align: center; color: #d1d5db; font-size: 13px; }
        .signup a { color: #4CAF50; text-decoration: none; font-weight: 500; margin-left: 4px; }
        @media (max-width: 900px) { .wrapper { grid-template-columns: 1fr; } .left { display: none; } .right { padding: 40px 24px; } }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- LEFT PANEL -->
        <div class="left">
            <img src="/images/logo-ti.png" alt="Logo" class="logo">
            <h2>AKREDATA</h2>
            <div class="tagline">Sistem Informasi Pendukung Akreditasi</div>
            <div class="divider-dot"></div>
            <p class="subtitle">
                Kelola data pendukung akreditasi program studi <br>
                <span>Teknik Informatika Universitas Malikussaleh</span> <br>
                dengan lebih terintegrasi, aman, dan mudah diakses.
            </p>
            <div class="left-footer">© 2026 AKREDATA UNIMAL. All Rights Reserved.</div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="right">
            <div class="form-box">
                <h1>Selamat Datang!</h1>
                <p class="desc">Silakan masuk ke akun Anda</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-icon">
                            <span>
                                <svg xmlns="http://w3.org" style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email Anda">
                        </div>
                        @error('email')
                            <p style="color: #f87171; font-size: 11px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-icon">
                            <span>
                                <svg xmlns="http://w3.org" style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" required placeholder="Masukkan password Anda">
                        </div>
                        @error('password')
                            <p style="color: #f87171; font-size: 11px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="options">
                        <label for="remember_me">
                            <input type="checkbox" id="remember_me" name="remember">
                            <span>Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Lupa password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-submit">
                        <svg xmlns="http://w3.org" style="width:18px;height:18px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>MASUK</span>
                    </button>
                </form>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span>atau</span>
                    <div class="divider-line"></div>
                </div>

                <div class="signup">
                    Belum punya akun?<a href="/register">Daftar</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
