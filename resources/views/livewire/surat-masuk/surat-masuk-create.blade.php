<div>
  <x-button @click="$wire.set('modalSuratMasukCreate', true)">
    Tambah Surat Masuk
  </x-button>


  <x-dialog-surat-masuk wire:model.live="modalSuratMasukCreate" :id="'modal-surat-masuk-create'" :maxWidth="'xl'" submit="saveSuratMasuk">
      <x-slot name="title">
          Tambah Surat Masuk
      </x-slot>

      <x-slot name="content">
          <div class="grid grid-cols-2 gap-4">
              <div>
                <label for="kategori_surat" class="label dark:text-grey">Kategori Surat</label>
                    <select wire:model="form.kategori_surat" id="kategori_surat" class="select select-bordered w-full">
                      <option value="">Pilih Kategori Surat</option>
                      <option value="Surat Perintah">Surat Perintah</option>
                      <option value="Disposisi">Disposisi</option>
                      <option value="Instruksi">Instruksi</option>
                      <option value="Surat Edaran">Surat Edaran</option>
                      <option value="Surat Kuasa">Surat Kuasa</option>
                      <option value="Berita Acara">Berita Acara</option>
                      <option value="Surat Keterangan">Surat Keterangan</option>
                      <option value="Surat dinas">Surat dinas</option>
                      <option value="Pengumuman">Pengumuman</option>
                      <option value="Surat Pernyataan Melaksanakan Tugas">Surat Pernyataan Melaksanakan Tugas</option>
                      <option value="Surat Panggilan">Surat Panggilan</option>
                      <option value="Surat Izin">Surat Izin</option>
                      <option value="Lembaran Daerah">Lembaran Daerah</option>
                      <option value="Berita Daerah">Berita Daerah</option>
                      <option value="Rekomendasi">Rekomendasi</option>
                      <option value="Radiogram">Radiogram</option>
                      <option value="Surat Tanda Tamat Pendidikan dan Pelatihan">Surat Tanda Tamat Pendidikan dan Pelatihan</option>
                      <option value="Sertifikat">Sertifikat</option>
                      <option value="Piagam">Piagam</option>
                      <option value="Surat Perjanjian">Surat Perjanjian</option>
                    </select>
              </div>

                    <div>
                    <label for="tanggal_terima_surat" class="label">Tanggal Terima Surat</label>
                    <input wire:model="form.tanggal_terima_surat" type="date" id="tanggal_terima_surat" class="input input-bordered w-full">
                  </div>

          </div>


      <!-- Row 2 -->
      <div class="grid grid-cols-2 gap-4">

        <div>
          <label for="no_agenda" class="label dark:text-grey">No Agenda</label>
          <input wire:model="form.no_agenda" type="text" id="no_agenda" class="input input-bordered w-full" placeholder="Masukkan No Agenda">
        </div>

        <div>
          <label for="nomor_surat" class="label dark:text-grey">Nomor Surat</label>
          <input wire:model="form.nomor_surat" type="text" id="nomor_surat" class="input input-bordered w-full" placeholder="Masukkan Nomor Surat">
        </div>



        <div>
          <label for="tanggal_surat" class="label dark:text-grey">Tanggal Surat</label>
          <input wire:model="form.tanggal_surat" type="date" id="tanggal_surat" class="input input-bordered w-full">
        </div>
      </div>


            <!-- Row 3 -->
            <div class="grid grid-cols-2 gap-4">

      
              <div>
                <label for="asal_surat_pengirim" class="label dark:text-grey">Asal Surat/Pengirim</label>
                <input wire:model="form.asal_surat_pengirim" type="text" id="asal_surat_pengirim" class="input input-bordered w-full" placeholder="Masukkan Asal Surat">
              </div>
      
              <div>
                <label for="perihal_isi_surat" class="label dark:text-grey">Perihal/Isi Surat </label>
                <input wire:model="form.perihal_isi_surat" type="text" id="perihal_isi_surat" class="input input-bordered w-full" placeholder="Masukkan Perihal">
              </div>
            </div>


                  <!-- Row 4 -->
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label for="isi_disposisi" class="label dark:text-grey">Isi Disposisi</label>
          <input wire:model="form.isi_disposisi" type="text" id="isi_disposisi" class="input input-bordered w-full" placeholder="Masukkan Isi Disposisi">
        </div>

        <div>
          <label for="keterangan" class="label dark:text-grey">Keterangan</label>
          <textarea wire:model="form.keterangan" id="keterangan" class="textarea textarea-bordered w-full" placeholder="Masukkan Keterangan (opsional)"></textarea>
        </div>
      </div>



      </x-slot>

      <x-slot name="footer">
          <x-secondary-button @click="$wire.set('modalSuratMasukCreate', false)" wire:loading.attr="disabled">
              Batal
          </x-secondary-button>

          <x-danger-button type="submit" class="ms-3" wire:loading.attr="disabled">
              Simpan
          </x-danger-button>
      </x-slot>
  </x-dialog-surat-masuk>
</div>