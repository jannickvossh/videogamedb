@props([
    'name' => ''
])

@php
    $classes = 'form-control';
@endphp

@error($name)
    @php
        $classes .= ' is-invalid'
    @endphp
@enderror

<input 
    {{ 
        $attributes->merge([
            'class' => $classes
        ])
    }} 
    type="file" 
    name="{{ $name }}" 
    id="{{ $name }}"
>