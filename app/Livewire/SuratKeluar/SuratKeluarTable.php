<?php

namespace App\Livewire\SuratKeluar;

use Livewire\Component;
use App\Models\SuratKeluar;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Livewire\Forms\SuratKeluarForm;

class SuratKeluarTable extends Component
{
    use WithPagination, WithSorting;

    public SuratKeluarForm $form;

    public $paginate = 5; // Jumlah data per halaman
    public $sortBy = 'surat_keluar.id'; // Kolom default untuk pengurutan
    public $sortDirection = 'desc'; // Arah pengurutan default

    // Realtime proses
    #[On('dispatch-surat-keluar-create-save')]
    #[On('dispatch-surat-keluar-update-edit')]
    #[On('dispatch-surat-keluar-delete-del')]
    public function render()
    {
        return view('livewire.surat-keluar.surat-keluar-table',[
            'data' => SuratKeluar::where('id', 'like', '%' . $this->form->id . '%')
                ->where('tanggal_kirim_surat', 'like', '%' . $this->form->tanggal_kirim_surat . '%')
                ->where('tanggal_surat', 'like', '%' . $this->form->tanggal_surat . '%')
                ->where('nomor_surat', 'like', '%' . $this->form->nomor_surat . '%')
                ->where('tujuan_surat', 'like', '%' . $this->form->tujuan_surat . '%')
                ->where('perihal_isi_surat', 'like', '%' . $this->form->perihal_isi_surat . '%')
                ->with('suratMasuk')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }


}
