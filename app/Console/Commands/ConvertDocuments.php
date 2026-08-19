<?php

namespace App\Console\Commands;

use App\Models\Dokumen;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ConvertDocuments extends Command
{
    protected $signature = 'convert:documents';

    protected $description = 'Convert Word, Excel, dan PowerPoint menjadi PDF';

    public function handle()
    {
        $soffice = '"C:\Program Files\LibreOffice\program\soffice.exe"';

        $dokumen = Dokumen::whereNull('file_pdf')->get();

        foreach ($dokumen as $item) {

            if (!Storage::disk('public')->exists($item->file)) {
                $this->error("File tidak ditemukan: {$item->file}");
                continue;
            }

            $input = Storage::disk('public')->path($item->file);
            $output = storage_path('app/public/pdf');

            if (!file_exists($output)) {
                mkdir($output, 0777, true);
            }

            exec($soffice.' --headless --convert-to pdf --outdir "'.$output.'" "'.$input.'"');

            $pdfName = pathinfo($input, PATHINFO_FILENAME).'.pdf';

            if (file_exists($output.'/'.$pdfName)) {

                $item->file_pdf = 'pdf/'.$pdfName;
                $item->save();

                $this->info("Berhasil: {$pdfName}");
            } else {

                $this->error("Gagal convert {$item->nama_dokumen}");
            }
        }

        $this->info('Selesai.');
    }
}