@props([
    'name'      => '',
    'checked'   => 0
])

@php
    $classes = 'form-check-input';
@endphp

<input 
    {{ 
        $attributes->merge([
            'class' => $classes
        ])
    }} 
    type="checkbox" 
    name="{{ $name }}" 
    id="{{ $name }}" 
    {{ $checked ? 'checked' : '' }}
>