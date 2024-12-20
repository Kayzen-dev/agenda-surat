@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));
$maxWidth = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp

<div x-data="{ open: @entangle($attributes->wire('model')) }" 
     x-show="open" 
     id="{{ $id }}" 
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
     style="display: none;">


        <div @click.away="open = false"  class="modal-box w-11/12 max-w-5xl">
          <h3 class="text-lg font-bold">Hello!</h3>
          <p class="py-4">Click the button below to close</p>
                    <div class="modal-action">

                    {{ $slot }}

                    </div>
        </div>


</div>



