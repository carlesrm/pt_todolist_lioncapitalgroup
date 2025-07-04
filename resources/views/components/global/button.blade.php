{{-- resources/views/components/button.blade.php --}}

@php
$baseClasses = 'flex justify-center items-center cursor-pointer transition-colors';

    $typeClasses = [
        'ghost' => 'hover:bg-indigo-100 border hover:border-indigo-700 text-indigo-600',
        'filled' => 'bg-indigo-600 hover:bg-indigo-700 text-white',
        'underline' => '',
    ][$type] ?? 'bg-indigo-600 hover:bg-indigo-700 text-white';

    $sizeClasses = [
        'sm' => 'px-2 py-1 text-sm rounded-sm',
        'md' => 'px-3 py-1.5 text-base rounded-md',
        'lg' => 'px-4 py-2 text-lg rounded-lg',
    ][$size] ?? 'px-3 py-1.5 text-base';
@endphp

@if(!empty($link))
    <a {{ $attributes->merge([
    'class' => "$baseClasses $typeClasses $sizeClasses $classnames",
    'href' => $link
    ]) }}
    >
        {{ $slot }}
    </a>

@else

    <button {{ $attributes->merge([
    'class' => "$baseClasses $typeClasses $sizeClasses $classnames",
    'type' => $buttonType
    ]) }}
    >
        {{ $slot }}
    </button>
@endif
