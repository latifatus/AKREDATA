<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - AKREDATA</title>
    <!-- Google Fonts Poppins Terbuka Sempurna -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px; background: #8fe7c3fd; }
        .wrapper { width: 1150px; max-width: 100%; min-height: 640px; display: grid; grid-template-columns: 1fr 1fr; background: #fff; border-radius: 32px; overflow: hidden; box-shadow: 0 25px 70px -15px rgba(0,0,0,.5); }
        .left { background: linear-gradient(to bottom, #aef1cf, #e6f1ea); padding: 60px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; position: relative; }
        .logo { width: 160px; height: 160px; object-fit: contain; margin-bottom: 24px; }
        .left h2 { font-size: 40px; color: #042E1F; font-weight: 800; letter-spacing: 2.8px; text-transform: uppercase; }
        .left .tagline { font-size: 12px; color: rgba(4, 46, 31, 0.6); font-weight: 600; letter-spacing: 2.4px; text-transform: uppercase; margin-top: 8px; }
        .left .divider-dot { width: 8px; height: 8px; background-color: #042E1F; border-radius: 50%; margin: 20px 0; }
        .subtitle { color: #4b5563; max-width: 380px; font-size: 14px; line-height: 1.6; }
        .subtitle span { font-weight: 700; color: #042E1F; }
        .left-footer { position: absolute; bottom: 24px; font-size: 11px; color: rgba(4, 46, 31, 0.4); letter-spacing: 1.1px; text-transform: uppercase; }
        .right { background: #042E1F; padding: 40px 80px; display: flex; flex-direction: column; justify-content: center; position: relative; color: white; }
        .form-box { width: 100%; max-width: 360px; margin: 0 auto; }
        .right h1 { font-size: 32px; font-weight: 700; margin-bottom: 4px; }
        .right .desc { font-size: 14px; color: #d1d5db; font-weight: 300; margin-bottom: 24px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 6px; font-size: 11px; font-weight: 500; color: #d1d5db; text-transform: uppercase; letter-spacing: 1.2px; }
        .input-icon { position: relative; display: flex; align-items: center; }
        .input-icon span { position: absolute; left: 16px; color: #9ca3af; display: flex; align-items: center; pointer-events: none; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; height: 48px; padding: 0 16px 0 48px; border-radius: 12px; border: 1px solid rgba(156, 163, 175, 0.4); background: transparent; color: white; font-size: 14px; transition: .25s; }
        input:focus { outline: none; border-color: #4CAF50; box-shadow: 0 0 0 1px #4CAF50; }
        .btn-submit { width: 100%; height: 50px; border: none; border-radius: 12px; cursor: pointer; color: white; font-size: 14px; font-weight: 600; background: #4CAF50; letter-spacing: 1.2px; box-shadow: 0 10px 25px -5px rgba(76,175,80,0.3); transition: .3s; display: flex; justify-content: center; align-items: center; gap: 8px; margin-top: 12px; }
        .btn-submit:hover { background: #43a047; transform: translateY(-1px); }
        .divider { display: flex; align-items: center; margin: 20px 0; }
        .divider-line { flex-grow: 1; border-top: 1px solid rgba(255, 255, 255, 0.1); }
        .divider span { padding: 0 16px; color: rgba(255, 255, 255, 0.3); font-size: 11px; text-transform: uppercase; }
        .signin { text-align: center; color: #d1d5db; font-size: 13px; }
        .signin a { color: #4CAF50; text-decoration: none; font-weight: 500; margin-left: 4px; }
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
                <h1>Daftar Akun</h1>
                <p class="desc">Silakan lengkapi data diri Anda</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-icon">
                            <span>👤</span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap">
                        </div>
                        @error('name')
                            <p style="color: #f87171; font-size: 11px; margin-top: 4px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-icon">
                            <span>📧</span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                        </div>
                        @error('email')
                            <p style="color: #f87171; font-size: 11px; margin-top: 4px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-icon">
                            <span>🔒</span>
                            <input type="password" id="password" name="password" required placeholder="Buat password baru">
                        </div>
                        @error('password')
                            <p style="color: #f87171; font-size: 11px; margin-top: 4px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-icon">
                            <span>🛡️</span>
                            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password Anda">
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="btn-submit">
                        <span>DAFTAR AKUN</span>
                    </button>
                </form>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span>atau</span>
                    <div class="divider-line"></div>
                </div>

                <div class="signin">
                    Sudah punya akun?<a href="/login">Masuk</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
