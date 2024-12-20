<?php

namespace App\Livewire\SuratMasuk;


use App\Models\SuratMasuk;
use Livewire\Component;
use Livewire\WithPagination;

class SuratMasukTable extends Component
{
    use WithPagination;

    public $paginate = 10;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $form = [
        'id' => '',
        'type_surat' => '',
        'kategori_surat' => '',
        'asal_surat_pengirim' => '',
        'perihal_isi_surat' => '',
    ];

    protected $updatesQueryString = [
        'paginate',
        'sortBy',
        'sortDirection',
        'form' => ['except' => []],
    ];

    public function sortField($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingForm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = SuratMasuk::query();

        // Filter data berdasarkan input pencarian
        foreach ($this->form as $key => $value) {
            if (!empty($value)) {
                $query->where($key, 'like', "%$value%");
            }
        }

        $data = $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.surat-masuk.surat-masuk-table', compact('data'));
    }
}
