{{-- <div {{ $attributes->merge(['class' => 'alert alert-'.$validType, 'role' => 'alert' ])  }} >
{{ $message }}</div> --}}

{{-- <div {{ $attributes->class(['alert-dismissible fade show' => $dismissible ])->merge(['role' => $attributes->prepends('alert')])  }} >
    {{ $message }}

    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aia-label ></button>
    @endif
</div> --}}

@props(['type' => 'info', 'message' => '', 'dismissible' => false])

@php
    $validType = 'alert-' . $type;
@endphp

<div 
    {{ $attributes->merge([
        'class' => "alert $validType" . ($dismissible ? ' alert-dismissible fade show' : ''),
        'role' => 'alert'
    ]) }}
>
    {{ $message }}

    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
