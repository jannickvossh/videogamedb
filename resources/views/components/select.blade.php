@props([
    'name'      => '',
    'multiple'  => false
])

@php
    $classes = 'form-select';
@endphp

@error($name)
    @php
        $classes .= ' is-invalid'
    @endphp
@enderror

<select 
    {{
        $attributes->merge([
            'class' => $classes
        ])
    }}
    name="{{ $name }}{{ $multiple ? '[]' : '' }}" 
    id="{{ $name }}" 
    {{ $multiple ? 'multiple' : '' }}
>
    {{ $slot }}
</select>