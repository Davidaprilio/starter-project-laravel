@props([
'parentClass' => 'mb-3',
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes">
    <option value="l">Pria</option>
    <option value="p">Wanita</option>
</x-lb5-select>