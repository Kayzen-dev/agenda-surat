<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    // Tabel yang digunakan
    protected $table = 'surat_masuk';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'type_surat',
        'kategori_surat',
        'tanggal_terima_surat',
        'no_agenda',
        'nomor_surat',
        'tanggal_surat',
        'asal_surat_pengirim',
        'perihal_isi_surat',
        'isi_disposisi',
        'keterangan',
    ];

    // Casting untuk kolom dengan tipe data tertentu
    protected $casts = [
        'tanggal_terima_surat' => 'date',
        'tanggal_surat' => 'date',
    ];
}
