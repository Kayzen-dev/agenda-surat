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


        <div @click.away="open = false"  class="modal-box max-w-7xl">
            <div class="modal-action justify-center">

            {{ $slot }}

            </div>
        </div>


</div>



