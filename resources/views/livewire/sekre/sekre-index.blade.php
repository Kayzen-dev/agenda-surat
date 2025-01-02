<div>

    
    <div x-data="{ activeTab: 'tab1' }" class="tab-section">
        <!-- Tabs Navigation -->
        <div class="tabs tabs-lifted mb-5 mt-5">
            <button 
                :class="{'tab-active': activeTab === 'tab1'}"
                @click="activeTab = 'tab1'"
                class="tab">Surat Masuk</button>

            <button 
                :class="{'tab-active': activeTab === 'tab2'}"
                @click="activeTab = 'tab2'"
                class="tab">Surat Keluar</button>
        </div>

        <!-- Tabs Content -->
        <div>
            <div x-show="activeTab === 'tab1'">
                    <livewire:SuratMasuk.surat-masuk-index />
            </div>

            <div x-show="activeTab === 'tab2'">
                {{-- <h4 class="font-bold mt-4 mb-2 text-xl">Tab 2 Content</h4>
                <p class="text-md">This is the content for Tab 2. You can put any information here.</p> --}}
                <livewire:SuratKeluar.surat-keluar-index />

            </div>
        </div>

    </div>



</div>