<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau Berkas - {{ $dokuman->nama_dokumen }}</title>
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif; }
        body { background:#020d08; padding:30px; min-height:100vh; display:flex; justify-content:center; align-items:center; }
        .container { width:100%; max-width:1200px; background:#fff; border-radius:24px; padding:40px; min-height:85vh; box-shadow:0 25px 60px rgba(0,0,0,0.4); display: flex; flex-direction: column; }
        
        /* HEADER PREVIEW: Mengatur susunan tombol kembali dan judul */
        .header-preview { border-b: 2px solid #f3f4f6; padding-bottom: 15px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; width: 100%; }
        .header-left { display: flex; align-items: center; gap: 15px; }
        
        /* TOMBOL KEMBALI MODERN */
        .btn-kembali { background: #042E1F; color: #fff; text-decoration: none; font-size: 13px; font-weight: 600; padding: 8px 16px; border-radius: 10px; transition: all 0.2s ease-in-out; border: 1px solid transparent; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .btn-kembali:hover { background: #fff; color: #042E1F; border-color: #042E1F; }
        
        .title-text { font-size: 18px; font-weight: 700; color: #042E1F; }
        .badge { background: #e6f1ea; color: #042E1F; padding: 4px 12px; border-radius: 8px; font-size: 12px; font-weight: 700; text-transform: uppercase; }
        
        .viewer-area { flex-grow: 1; width: 100%; min-height: 65vh; border-radius: 12px; overflow: hidden; border: 1px solid #e5e7eb; background: #f9fafb; }
        iframe { width: 100%; height: 68vh; border: none; display: block; }
        .img-wrapper { display: flex; justify-content: center; align-items: center; height: 100%; padding: 20px; background: #f3f4f6; }
        .img-wrapper img { max-width: 100%; max-height: 62vh; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <div class="container">
        <div class="header-preview">
            <div class="header-left">
                <!-- 🌟 TOMBOL KEMBALI: Langsung kembali ke halaman utama tabel dokumen -->
                <a href="{{ route('dokumen.index') }}" class="btn-kembali">← Kembali</a>
                <span class="title-text">📄 {{ $dokuman->nama_dokumen }}</span>
            </div>
            <span class="badge">{{ strtolower(pathinfo($dokuman->file, PATHINFO_EXTENSION)) }}</span>
        </div>
        
        <div class="viewer-area">
            @php 
                $extAsli = strtolower(pathinfo($dokuman->file, PATHINFO_EXTENSION)); 
            @endphp

            @if(in_array($extAsli, ['png', 'jpg', 'jpeg', 'gif', 'svg']))
                <!-- JIKA GAMBAR: Tampilkan murni dengan tag img gambar asli -->
                <div class="img-wrapper">
                    <img src="{{ route('dokumen.file', $dokuman->id) }}" alt="{{ $dokuman->nama_dokumen }}">
                </div>
            @else
                <!-- JIKA PDF/WORD/EXCEL/PPT: Buka via Iframe penampil PDF bawaan browser -->
                <!-- Fungsi viewFile di controller otomatis memilih file_pdf hasil convert jika tersedia -->
                <iframe src="{{ route('dokumen.file', $dokuman->id) }}"></iframe>
            @endif
        </div>
    </div>

</body>
</html>
