<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\User;



new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login()
    {
        $this->validate();

        $this->form->authenticate();
        $auth = Auth::user();
        $user = User::find($auth->id);

        // Periksa apakah pengguna sudah login di perangkat lain
        if (Auth::check() && $user->status_login) {
        // Logout pengguna yang mencoba login dari perangkat baru
            Auth::logout();
        // Redirect dengan pesan error
            // return redirect('\login')->route('guest.page');
            return redirect()->route('login')->with('error_message', 'Akun sedang digunakan');
        }

        // Set status_login menjadi true setelah login berhasil
        if (Auth::check()) {
            $auth = Auth::user();
            $user = User::find($auth->id);
            $user->status_login = true;
            $user->save();
        }

        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('sekretariat')) {
            return redirect()->route('sekretariat')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('layanan')) {
            return redirect()->route('layanan')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('pengembangan')) {
            return redirect()->route('pengembangan')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('kearsipan')) {
            return redirect()->route('kearsipan')->with('success', 'Log in Berhasil');
        }


        Session::regenerate();

        // $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>


<div>
    @if (session('error_message'))
        <div class="text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error_message') }}
        </div>
        {{-- <div role="alert" class="alert alert-error">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 shrink-0 stroke-current"
              fill="none"
              viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>
                {{ session('error_message') }}
            </span>
        </div> --}}
    @endif

    @if(session('message'))
        <div class="text-yellow-500 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div> --}}

                <!-- id_user Address username -->
                <div>
                    <x-input-label for="id_user" :value="__('Email atau Username')" />
                    <x-text-input wire:model="form.id_user" id="id_user" class="block mt-1 w-full" type="text" name="id_user" required autofocus autocomplete="id_user" />
                    <x-input-error :messages="$errors->get('form.id_user')" class="mt-2" />
                </div>
        

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div> --}}

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
        
            <div class="relative">
                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
        
                <!-- Ikon mata -->
                <span id="toggle-password" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer dark:text-white">
                    <i class="fas fa-eye" id="eye-icon"></i> <!-- Ikon mata -->
                </span>
            </div>
        
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Lupa Password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                <span  wire:loading.class="loading loading-spinner loading-md" ></span>

                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
    </form>


    <script>
        // Mengubah tipe input password ketika ikon diklik
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
    
        togglePassword.addEventListener('click', function() {
            // Toggle password visibility
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
    
            // Ubah ikon berdasarkan kondisi
            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</div>