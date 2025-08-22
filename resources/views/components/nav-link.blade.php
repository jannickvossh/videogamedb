@props([
    'active' => false,
    'type' => 'link'
])

@php
$classes = '';

switch ($type) :
    case 'link':
        $classes .= 'nav-link';
        break;
    case 'button':
        $classes .= 'btn';
        break;
    default:
        $classes .= 'nav-link';
        break;
endswitch;
@endphp

<a 
    {{
        $attributes->merge([
            'class' => $active ? $classes . ' active' : $classes
        ])
    }}
    aria-current="{{ $active ? 'true' : 'false' }}"
>{{ $slot }}</a>