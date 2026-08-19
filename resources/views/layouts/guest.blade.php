<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKREDATA - Teknik Informatika</title>
    
    <!-- Vite Asset Laravel -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <!-- Google Fonts Poppins -->
     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background: #020d08; /* Latar belakang luar gelap premium serasi */
        }

        .login-wrapper{
            width: 1150px;
            max-width: 100%;
            min-height: 640px;
            display: grid;
            grid-template-columns: 1fr 1fr; /* Membagi dua sisi sama rata secara simetris */
            background: #fff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 70px -15px rgba(0,0,0,.5);
        }

        /* ========================================================
           SISI KIRI: BRANDING (Kompak di semua halaman Auth)
        ======================================================== */
        .left{
            background: linear-gradient(to bottom, #aef1cf, #e6f1ea); /* Gradasi hijau muda tipis */
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
        }

        /* Ornamen Lingkaran Sisi Kiri */
        .left::before {
            content: "";
            position: absolute;
            top: -64px; left: -64px;
            width: 192px; height: 192px;
            border: 1px solid rgba(4, 46, 31, 0.07);
            border-radius: 50%;
        }

        .logo{
            width: 160px;
            height: 160px;
            object-fit: contain;
            display: block;
            margin-bottom: 24px;
            transition: .3s;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .left h2{
            font-size: 40px;
            color: #042E1F;
            font-weight: 800;
            letter-spacing: 2.8px;
            text-transform: uppercase;
        }

        .left .tagline {
            font-size: 12px;
            color: rgba(4, 46, 31, 0.6);
            font-weight: 600;
            letter-spacing: 2.4px;
            text-transform: uppercase;
            margin-top: 8px;
        }

        .left .divider-dot {
            width: 8px;
            height: 8px;
            background-color: #042E1F;
            border-radius: 50%;
            margin: 20px 0;
        }

        .subtitle{
            color: #4b5563;
            max-width: 380px;
            font-size: 14px;
            line-height: 1.6;
        }

        .subtitle span {
            font-weight: 700;
            color: #042E1F;
        }

        .left-footer {
            position: absolute;
            bottom: 24px;
            font-size: 11px;
            color: rgba(4, 46, 31, 0.4);
            letter-spacing: 1.1px;
            text-transform: uppercase;
        }

        /* Responsive Layout untuk Layar Handphone */
        @media (max-width: 900px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }
            .left {
                display: none; /* Sembunyikan branding kiri di HP agar fokus ke form */
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        <!-- SISI KIRI AUTOMATIS (Sama untuk Login & Register) -->
        <div class="left">
            <img src="/images/logo-ti.png" alt="Logo AKREDATA" class="logo" onerror="this.style.opacity='0.3';">
            
            <h2>AKREDATA</h2>
            <div class="tagline">Sistem Informasi Pendukung Akreditasi</div>
            
            <div class="divider-dot"></div>
            
            <p class="subtitle">
                Kelola data pendukung akreditasi program studi <br>
                <span>Teknik Informatika Universitas Malikussaleh</span> <br>
                dengan lebih terintegrasi, aman, dan mudah diakses.
            </p>

            <div class="left-footer">
                © 2026 AKREDATA UNIMAL. All Rights Reserved.
            </div>
        </div>

        <!-- SISI KANAN KUSTOM (Akan diisi otomatis oleh file login.blade.php atau register.blade.php) -->
        {{ $slot }}

    </div>

</body>
</html>
