@props([
'size' => 70,
'src'
])
<div {{ $attributes->class(['rounded-circle', 'shadow-sm','p-1 img-photo skeleton']) }} style="width: {{ $size }}px;
    height: {{ $size }}px; background-image: url('{{ $src }}'); opacity: 1"></div>