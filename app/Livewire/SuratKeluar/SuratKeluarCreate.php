<?php

namespace App\Livewire\SuratKeluar;

use Livewire\Component;
use App\Livewire\Forms\SuratKeluarForm;

class SuratKeluarCreate extends Component
{
    public SuratKeluarForm $form;
    public $modalSuratKeluarCreate = false;

    public function save()
    {

        // dd($this->form);
        $this->validate();
        $simpan = $this->form->store();
        is_null($simpan)
            ? $this->dispatch('notify', title: 'fail', message: 'Data gagal disimpan')
            : $this->dispatch('notify', title: 'success', message: 'Data berhasil disimpan');
        $this->form->reset();
        $this->dispatch('dispatch-surat-masuk-create-save')->to(SuratKeluarTable::class);
        $this->modalSuratKeluarCreate = false;
    }

    public function render()
    {
        return view('livewire.surat-keluar.surat-keluar-create');
    }
}
