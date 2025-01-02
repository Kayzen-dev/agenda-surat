<div>


    <x-dialog-surat-masuk wire:model="modalSuratKeluarEdit" :id="'modal-surat-keluar-create'" submit="edit">
        <x-slot name="title">
            Tambah Surat Keluar
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">


                <!-- Tanggal Surat -->
                <div>
                    <label for="tanggal_surat" class="label dark:text-grey">Tanggal Surat</label>
                    <input wire:model="form.tanggal_surat" type="date" id="tanggal_surat" required class="input input-bordered w-full">
                    <x-input-form-error for="form.tanggal_surat" class="mt-1" />
                </div>

                <!-- Tanggal Kirim Surat -->
                <div>
                    <label for="tanggal_kirim_surat" class="label dark:text-grey">Tanggal Kirim Surat</label>
                    <input wire:model="form.tanggal_kirim_surat" type="date" id="tanggal_kirim_surat" required class="input input-bordered w-full">
                    <x-input-form-error for="form.tanggal_kirim_surat" class="mt-1" />
                </div>


            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Pilih Surat Masuk -->
                <div>
                    <label for="suratMasuk" class="label dark:text-grey">Surat Masuk</label>
                    <input wire:model="suratMasuk" type="text" id="suratMasuk" disabled class="input input-bordered w-full" required placeholder="Masukkan Nomor Surat">
                    <x-input-form-error for="suratMasuk" class="mt-1" />
                </div>


                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="label dark:text-grey">Nomor Surat</label>
                    <input wire:model="form.nomor_surat" type="text" id="nomor_surat" class="input input-bordered w-full" required placeholder="Masukkan Nomor Surat">
                    <x-input-form-error for="form.nomor_surat" class="mt-1" />
                </div>


            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Tujuan Surat -->
                <div>
                    <label for="tujuan_surat" class="label dark:text-grey">Tujuan Surat</label>
                    <textarea wire:model="form.tujuan_surat" id="tujuan_surat" class="textarea textarea-bordered w-full" required placeholder="Masukkan Tujuan Surat"></textarea>
                    <x-input-form-error for="form.tujuan_surat" class="mt-1" />
                </div>

                <!-- Perihal Isi Surat -->
                <div>
                    <label for="perihal_isi_surat" class="label dark:text-grey">Perihal Isi Surat</label>
                    <textarea wire:model="form.perihal_isi_surat" id="perihal_isi_surat" class="textarea textarea-bordered w-full" required placeholder="Masukkan Perihal/Isi Surat"></textarea>
                    <x-input-form-error for="form.perihal_isi_surat" class="mt-1" />
                </div>
            </div>

            <div>
                <!-- Keterangan -->
                <label for="keterangan" class="label dark:text-grey">Keterangan</label>
                <textarea wire:model="form.keterangan" id="keterangan" class="textarea textarea-bordered w-full" placeholder="Masukkan Keterangan (opsional)"></textarea>
                <x-input-form-error for="form.keterangan" class="mt-1" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalSuratKeluarEdit', false)">
                Batal
            </x-secondary-button>

                    <x-btn-accent type="submit" class="ms-3 btn-accent">
                        Ubah
                    </x-btn-accent>
        </x-slot>
    </x-dialog-surat-masuk>


</div>
