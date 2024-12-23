<?php

namespace App\Livewire\SuratMasuk;

use App\Livewire\SuratMasuk\SuratMasukTable;
use App\Models\SuratMasuk;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

class SuratMasukDelete extends Component
{
    #[Locked]
    public $id;

    public $modalSuratDelete = false;


    #[Locked]
    public $isi;

    #[On('dispatch-surat-masuk-table-delete')]
    public function set_surat($id,$isi){

        dd($isi);
        $this->id = $id;
        $this->isi = $isi;

        $this->modalSuratDelete = true;
    }

    public function del() {
        $del = SuratMasuk::destroy( $this->id );

        ($del)
        ? $this->dispatch('notify', title: 'success',message: 'data berhasil dihapus')
        : $this->dispatch('notify', title: 'fail', message: 'data gagal dihapus ');
        // $this->form->reset();
        $this->dispatch('dispatch-admin-crud-user-delete-del')->to(SuratMasukTable::class);
        $this->modalSuratDelete = false;
    }
    
    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-delete');
    }
}
