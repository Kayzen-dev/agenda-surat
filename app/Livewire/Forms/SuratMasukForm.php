<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\SuratMasuk;
use Livewire\Attributes\Validate;

class SuratMasukForm extends Form
{
    #[Validate('required', message: 'Tipe surat wajib diisi')]
    #[Validate('in:kearsipan,sekretariat,layanan,pengembangan', message: 'Tipe surat tidak valid')]
    public $type_surat;

    #[Validate('required', message: 'Kategori surat wajib diisi')]
    public $kategori_surat;

    #[Validate('required', message: 'Tanggal terima surat wajib diisi')]
    #[Validate('date', message: 'Tanggal terima surat harus berupa tanggal yang valid')]
    public $tanggal_terima_surat;

    #[Validate('required', message: 'Nomor agenda wajib diisi')]
    public $no_agenda;

    #[Validate('required', message: 'Nomor surat wajib diisi')]
    public $nomor_surat;

    #[Validate('required', message: 'Tanggal surat wajib diisi')]
    #[Validate('date', message: 'Tanggal surat harus berupa tanggal yang valid')]
    public $tanggal_surat;

    #[Validate('required', message: 'Asal surat atau pengirim wajib diisi')]
    public $asal_surat_pengirim;

    #[Validate('required', message: 'Perihal atau isi surat wajib diisi')]
    public $perihal_isi_surat;

    #[Validate('nullable', message: 'Isi disposisi tidak wajib diisi')]
    public $isi_disposisi;

    #[Validate('nullable', message: 'Keterangan tidak wajib diisi')]
    public $keterangan;

    public function store()
    {
        $this->validate();

        return SuratMasuk::create([
            'type_surat' => $this->type_surat,
            'kategori_surat' => $this->kategori_surat,
            'tanggal_terima_surat' => $this->tanggal_terima_surat,
            'no_agenda' => $this->no_agenda,
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'asal_surat_pengirim' => $this->asal_surat_pengirim,
            'perihal_isi_surat' => $this->perihal_isi_surat,
            'isi_disposisi' => $this->isi_disposisi,
            'keterangan' => $this->keterangan,
        ]);
    }

    public function update($id)
    {
        $this->validate();

        $suratMasuk = SuratMasuk::findOrFail($id);

        $suratMasuk->update([
            'type_surat' => $this->type_surat,
            'kategori_surat' => $this->kategori_surat,
            'tanggal_terima_surat' => $this->tanggal_terima_surat,
            'no_agenda' => $this->no_agenda,
            'nomor_surat' => $this->nomor_surat,
            'tanggal_surat' => $this->tanggal_surat,
            'asal_surat_pengirim' => $this->asal_surat_pengirim,
            'perihal_isi_surat' => $this->perihal_isi_surat,
            'isi_disposisi' => $this->isi_disposisi,
            'keterangan' => $this->keterangan,
        ]);

        return $suratMasuk;
    }

    public function delete($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return $suratMasuk->delete();
    }
}