<?php

namespace App\Livewire\SuratMasuk;

use App\Livewire\Forms\SuratMasukForm;
use Livewire\Component;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\SuratMasuk;

class SuratMasukTable extends Component
{
    use WithPagination, WithSorting;

    public SuratMasukForm $form;

    public $paginate = 5; // Jumlah data per halaman
    public $sortBy = 'surat_masuk.id'; // Kolom default untuk pengurutan
    public $sortDirection = 'desc'; // Arah pengurutan default

    // Realtime proses
    #[On('dispatch-surat-masuk-create-save')]
    #[On('dispatch-surat-masuk-update-edit')]
    #[On('dispatch-surat-masuk-delete-del')]
    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-table', [
            'data' => SuratMasuk::where('id', 'like', '%' . $this->form->id . '%')
                ->where('kategori_surat', 'like', '%' . $this->form->kategori_surat . '%')
                ->where('tanggal_terima_surat', 'like', '%' . $this->form->tanggal_terima_surat . '%')
                ->where('no_agenda', 'like', '%' . $this->form->no_agenda . '%')
                ->where('nomor_surat', 'like', '%' . $this->form->nomor_surat . '%')
                ->where('asal_surat_pengirim', 'like', '%' . $this->form->asal_surat_pengirim . '%')
                ->with('suratKeluar')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate),
        ]);
    }

    
}
