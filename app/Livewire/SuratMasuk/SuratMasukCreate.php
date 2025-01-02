<?php

namespace App\Livewire\SuratMasuk;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\SuratMasukForm;

class SuratMasukCreate extends Component
{
    
    public SuratMasukForm $form;
    public $modalSuratMasukCreate = false;

    public function mount()
    {

        $this->form->tanggal_terima_surat = now()->toDateString();
    }


    public function save() {
        if (Auth::check()) {
            $auth = Auth::user();
            $user = User::find($auth->id);
            $roles = $user->getRoleNames();  
            $this->form->type_surat = $roles['0'];
        }

        // dd($this->form);

        $this->validate();
        $simpan = $this->form->store();
        is_null($simpan)
        ? $this->dispatch('notify', title: 'fail', message: 'data gagal disimpan')
        : $this->dispatch('notify', title: 'success', message: 'data berhasil disimpan');
        $this->form->reset();
        $this->dispatch('dispatch-surat-masuk-create-save')->to(SuratMasukTable::class);
        $this->modalSuratMasukCreate = false;
        $this->form->tanggal_terima_surat = now()->toDateString();

    }

    public function render()
    {
        return view('livewire.surat-masuk.surat-masuk-create');
    }
}
