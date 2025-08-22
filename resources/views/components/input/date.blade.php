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
    type="date" 
    name="{{ $name }}" 
    id="{{ $name }}"
>