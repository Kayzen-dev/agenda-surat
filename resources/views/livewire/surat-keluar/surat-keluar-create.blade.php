<div x-data="suratMasukRealtime()" x-init="init()">
    <x-secondary-button @click="$wire.set('modalSuratKeluarCreate', true)">
        Tambah Surat Keluar
    </x-secondary-button>

    <x-dialog-surat-masuk wire:model="modalSuratKeluarCreate" :id="'modal-surat-keluar-create'" submit="save">
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
                    <label for="id_surat_masuk" class="label dark:text-grey">Pilih Surat Masuk</label>
                    <select wire:model.defer="form.id_surat_masuk" id="id_surat_masuk" required class="select select-bordered w-full">
                        <option value="">Pilih Surat Masuk</option>
                        <template x-for="surat in suratMasukList" :key="surat.id">
                            <option :value="surat.id" x-text="`${surat.nomor_surat} - ${surat.asal_surat_pengirim}`"></option>
                        </template>
                    </select>
                    <x-input-form-error for="form.id_surat_masuk" class="mt-1" />
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
            <x-secondary-button @click="$wire.set('modalSuratKeluarCreate', false)">
                Batal
            </x-secondary-button>

                <template x-if="suratMasukList.length > 0">
                    <x-btn-accent type="submit" class="ms-3 btn-accent">
                        Simpan
                    </x-btn-accent>
                </template>
        </x-slot>
    </x-dialog-surat-masuk>


    <script>
        function suratMasukRealtime() {
            return {
                suratMasukList: [],
                fetchSuratMasukList() {
                    fetch('/sekretariat/surat-masuk')
                        .then((response) => response.json())
                        .then((data) => {
                            this.suratMasukList = data;
                        })
                        .catch((error) => {
                            console.error('Gagal memuat daftar surat masuk:', error);
                        });
                },
                init() {
                    this.fetchSuratMasukList();

                    setInterval(() => {
                        this.fetchSuratMasukList();
                    }, 3000);
                },
            };
        }

    </script>
</div>
