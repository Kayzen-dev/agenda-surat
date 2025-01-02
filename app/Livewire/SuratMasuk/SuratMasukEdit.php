<?php

namespace App\Livewire\SuratMasuk;

use App\Livewire\Forms\SuratMasukForm;
use App\Models\SuratMasuk;
use Livewire\Component;
use Livewire\Attributes\On;

class SuratMasukEdit extends Component
{
    public $modalSuratMasukEdit = false;

    public SuratMasukForm $form;


    #[On('dispatch-surat-masuk-table-edit')]
    public function set_surat(SuratMasuk $id){

        $this->form->setSuratMasuk($id);
        
        // dd($this->form);
        $this->modalSuratMasukEdit = true;
    }


    public function edit() {

        $update = $this->form->update($this->form->id);

        is_null($update)
        ? $this->dispatch('notify', title: 'fail', message: 'data gagal diUpdate')
        : $this->dispatch('notify', title: 'success',message: 'data berhasil diUpdate');
        $this->form->reset();
        $this->dispatch('dispatch-surat-masuk-update-edit')->to(SuratMasukTable::class);
        $this->modalSuratMasukEdit = false;


    }
    
    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-edit');
    }


}
