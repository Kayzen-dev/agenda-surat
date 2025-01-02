<?php

namespace App\Livewire\SuratKeluar;

use Livewire\Component;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Livewire\Attributes\On;
use App\Livewire\Forms\SuratKeluarForm;
use App\Livewire\SuratKeluar\SuratKeluarTable;

class SuratKeluarEdit extends Component
{


    public $modalSuratKeluarEdit = false;
    public $modelSuratMasuk;
    public $suratMasuk;
    public SuratKeluarForm $form;


    #[On('dispatch-surat-keluar-table-edit')]
    public function set_surat(SuratKeluar $id){

        $this->form->setSuratKeluar($id);
        
        $this->modelSuratMasuk = SuratMasuk::find($this->form->id_surat_masuk)->firstOrFail();
        // dd($this->modelSuratMasuk);
        $this->suratMasuk = $this->modelSuratMasuk->nomor_surat ." - " .$this->modelSuratMasuk->asal_surat_pengirim;
        // dd($this->suratMasuk);
        $this->modalSuratKeluarEdit = true;
    }


    public function edit() {
        // dd($this->form);
        $update = $this->form->update($this->form->id);

        is_null($update)
        ? $this->dispatch('notify', title: 'fail', message: 'data gagal diUpdate')
        : $this->dispatch('notify', title: 'success',message: 'data berhasil diUpdate');
        $this->form->reset();
        $this->dispatch('dispatch-surat-keluar-update-edit')->to(SuratKeluarTable::class);
        $this->modalSuratKeluarEdit = false;


    }



    public function render()
    {
        return view('livewire.surat-keluar.surat-keluar-edit');
    }
}
