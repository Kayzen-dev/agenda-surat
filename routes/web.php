<?php

use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');


Route::get('/guest', function(){
    return view('guest');
})->middleware('guest')->name('guest.page');


Route::middleware(['auth','verified','chek_role'])->group(function(){
    Route::get('/home', function(){
        Auth::logout();
        return view('welcome');
    })->name('dashboard');



    Route::get('/admin', function () {
        return view('admin.index');
    })->middleware('role:admin')->name('admin');


    Route::get('/sekretariat', function () {
        return view('sekre.index');
    })->middleware('role:sekretariat')->name('sekretariat');





    Route::prefix('admin')->middleware('role:admin')->group(function () {
        
        Route::get('/export-users', function () {
            return Excel::download(new UsersExport(), 'users.xlsx');
        })->name('export.user');

        Route::get('/users', \App\Livewire\User\AdminCrudUser::class)->name('admin.users.index');
        
        Route::get('/logout/{id}/{route}', function ($id, $route) {
            $user = \App\Models\User::findOrFail($id);
            $user->status_login = false;
            $user->save();
            return redirect('/admin/' . $route)->with('logout','Berhasil Log out '.$user->name);
        })->name('logout');
    });
    
    
    Route::prefix('sekretariat')->middleware('role:sekretariat')->group(function () {
        
        Route::get('/index', \App\Livewire\Sekre\SekreIndex::class)->name('sekretariat.index');
        // Route::get('/kearsipan', \App\Livewire\Arsip\Kearsipan::class)->name('sekretariat.kearsipan.index');

    });



    Route::view('profile', 'profile')->name('profile');

});



require __DIR__.'/auth.php';
