<?php

namespace App\Livewire\SuratMasuk;

use App\Livewire\Forms\SuratMasukForm;
use Livewire\Component;

class SuratMasukCreate extends Component
{
    
    public SuratMasukForm $form;
    public $modalSuratMasukCreate = false;
    public $tanggal_terima_surat;

    public function mount()
    {
        $this->form->tanggal_terima_surat = now()->toDateString();
    }




    public function save() {
        dd($this->form);
        $this->validate();
        $simpan = $this->form->store();
        is_null($simpan)
        ? $this->dispatch('notify', title: 'fail', message: 'data gagal disimpan')
        : $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan');
        $this->form->reset();
        $this->dispatch('dispatch-surat-masuk-create-save')->to(SuratMasukTable::class);
        $this->modalSuratMasukCreate = false;
    }

    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-create');
    }
}
