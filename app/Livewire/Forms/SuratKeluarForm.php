<?php

namespace App\Livewire\Forms;

use App\Models\SuratKeluar;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SuratKeluarForm extends Form
{
    public ?SuratKeluar $SuratKeluar = null;
    public $id;

    #[Validate('required', message: 'Tanggal kirim surat wajib diisi')]
    #[Validate('date', message: 'Tanggal kirim surat harus berupa tanggal yang valid')]
    public $tanggal_kirim_surat;

    #[Validate('required', message: 'Nomor surat wajib diisi')]
    public $nomor_surat;

    #[Validate('required', message: 'Tanggal surat wajib diisi')]
    public $tanggal_surat;

    #[Validate('required', message: 'Tujuan surat wajib diisi')]
    public $tujuan_surat;

    #[Validate('required', message: 'Perihal isi surat wajib diisi')]
    public $perihal_isi_surat;

    #[Validate('required', message: 'Keterangan wajib diisi')]
    public $keterangan;

    #[Validate('required', message: 'ID Surat Masuk wajib diisi')]
    #[Validate('integer', message: 'ID Surat Masuk harus berupa angka')]
    public $id_surat_masuk;

    
    public function store()
    {
        $this->validate();

        return SuratKeluar::create([
            'tanggal_kirim_surat' => $this->tanggal_kirim_surat,
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'tujuan_surat' => $this->tujuan_surat,
            'perihal_isi_surat' => $this->perihal_isi_surat,
            'keterangan' => $this->keterangan,
            'id_surat_masuk' => $this->id_surat_masuk,
        ]);
    }

    public function update($id)
    {
        $this->validate();

        $SuratKeluar = SuratKeluar::findOrFail($id);

        $SuratKeluar->update([
            'tanggal_kirim_surat' => $this->tanggal_kirim_surat,
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'tujuan_surat' => $this->tujuan_surat,
            'perihal_isi_surat' => $this->perihal_isi_surat,
            'keterangan' => $this->keterangan,
            'id_surat_masuk' => $this->id_surat_masuk,
        ]);

        return $SuratKeluar;
    }

    public function setSuratKeluar(SuratKeluar $SuratKeluar)
    {
        $this->SuratKeluar = $SuratKeluar;
        $this->id = $SuratKeluar->id;

        $this->tanggal_kirim_surat = $SuratKeluar->tanggal_kirim_surat;
        $this->nomor_surat = $SuratKeluar->nomor_surat;
        $this->tanggal_surat = $SuratKeluar->tanggal_surat;
        $this->tujuan_surat = $SuratKeluar->tujuan_surat;
        $this->perihal_isi_surat = $SuratKeluar->perihal_isi_surat;
        $this->keterangan = $SuratKeluar->keterangan;
        $this->id_surat_masuk = $SuratKeluar->id_surat_masuk;
    }

    public function delete($id)
    {
        $SuratKeluar = SuratKeluar::findOrFail($id);
        return $SuratKeluar->delete();
    }
}