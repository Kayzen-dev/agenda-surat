<div>

    <x-dialog-modal wire:model.live="modalSuratDelete" > 
        <x-slot name="title">
            Delete User
        </x-slot>
    
        <x-slot name="content">
            <p>Apakah anda ingin menghapus data surat dengan ID: {{ $id }} dan dengan isi surat : {{ $isi }}</p>

        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalSuratDelete', false)" wire:loading.attr="disabled">
               Batal
            </x-secondary-button>
    
            <x-danger-button  @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                Delete
            </x-danger-button>

        </x-slot>
    </x-dialog-modal>

</div>
