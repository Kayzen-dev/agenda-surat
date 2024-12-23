<div wire:poll>
    <x-select wire:model="paginate" class="text-xs mt-8">
        <option value="3">3</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </x-select>

    <div class="overflow-x-auto mt-4">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-sm">Action</th>
                    <th class="text-sm cursor-pointer" @click="$wire.sortField('id')">
                        <x-sort :$sortDirection :$sortBy :field="'id'" /> ID
                    </th>
                    <th class="text-sm cursor-pointer" @click="$wire.sortField('type_surat')">
                        <x-sort :$sortDirection :$sortBy :field="'type_surat'" /> Tipe Surat
                    </th>
                    <th class="text-sm cursor-pointer" @click="$wire.sortField('kategori_surat')">
                        <x-sort :$sortDirection :$sortBy :field="'kategori_surat'" /> Kategori Surat
                    </th>
                    <th class="text-sm cursor-pointer" @click="$wire.sortField('asal_surat_pengirim')">
                        <x-sort :$sortDirection :$sortBy :field="'asal_surat_pengirim'" /> Asal Surat
                    </th>
                    <th class="text-sm cursor-pointer" @click="$wire.sortField('perihal_isi_surat')">
                        <x-sort :$sortDirection :$sortBy :field="'perihal_isi_surat'" /> Perihal
                    </th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <span wire:loading.class="loading loading-spinner loading-lg text-white"></span>
                    </td>
                    <td>
                        <x-input wire:model="form.id" type="search" placeholder="Cari ID" class="w-full text-sm" />
                    </td>
                    <td>
                        <x-input wire:model="form.type_surat" type="search" placeholder="Cari Tipe Surat" class="w-full text-sm" />
                    </td>
                    <td>
                        <x-input wire:model="form.kategori_surat" type="search" placeholder="Cari Kategori" class="w-full text-sm" />
                    </td>
                    <td>
                        <x-input wire:model="form.asal_surat_pengirim" type="search" placeholder="Cari Pengirim" class="w-full text-sm" />
                    </td>
                    <td>
                        <x-input wire:model="form.perihal_isi_surat" type="search" placeholder="Cari Perihal" class="w-full text-sm" />
                    </td>
                </tr>
            </thead>

            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <x-button @click="$dispatch('dispatch-surat-masuk-table-edit', { id: '{{ $item->id }}' })"
                                type="button" class="text-sm">Edit</x-button>

                            <x-danger-button
                                @click="$dispatch('dispatch-surat-masuk-table-delete', { id: '{{ $item->id }}', isi : '{{ $item->perihal_isi_surat }}' })">
                                Delete</x-danger-button>
                        </td>
                        <td class="text-center">{{ $item->id }}</td>
                        <td>{{ $item->type_surat }}</td>
                        <td>{{ $item->kategori_surat }}</td>
                        <td>{{ $item->asal_surat_pengirim }}</td>
                        <td>{{ $item->perihal_isi_surat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $data->onEachSide(1)->links() }}
    </div>
</div>
