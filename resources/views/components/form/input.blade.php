@props([
    'name' => null,
    'type' => 'text',
    'required' => false,
    'value' => null,
    'label' => 'Label',
    'placeholder' => null,
    'readonly' => false,
    'id' => null,
])

@php
    $inputId = $id ?? $name;
@endphp

<div class="flex flex-col space-y-1.5 w-full mb-4">
    {{-- Label dengan warna cokelat gelap (meses) --}}
    @if($label)
        <label for="{{ $inputId }}" class="text-sm font-bold text-amber-950 tracking-wide">
            {{ $label }}
            @if($required)
                <span class="text-red-500 ml-0.5">*</span>
            @endif
        </label>
    @endif

    {{-- Input Field dengan tema adonan Kue Cubit yang lembut --}}
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $inputId }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($readonly) readonly @endif
        
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 text-sm rounded-xl border shadow-sm transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 disabled:bg-orange-100/50 disabled:text-orange-800 disabled:cursor-not-allowed ' . 
            ($errors->has($name) 
                // Style Error
                ? 'border-red-400 bg-red-50 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-200' 
                // Style Kue Cubit (Background kekuningan lembut, border oranye hangat, teks cokelat)
                : 'border-orange-200 bg-orange-50/70 text-amber-950 placeholder-amber-900/40 hover:border-orange-300 focus:bg-white focus:border-orange-400 focus:ring-orange-200/60')
        ]) }}
    >

    {{-- Error Message dengan Ikon --}}
    @error($name)
        <div class="flex items-center space-x-1 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <span class="text-xs font-semibold text-red-500">{{ $message }}</span>
        </div>
    @enderror
</div>