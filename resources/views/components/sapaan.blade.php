@props([
    'parentClass' => 'mb-3',
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes">
    <option value="Pak">Pak</option>
    <option value="Bu">Bu</option>
    <option value="Mas">Mas</option>
    <option value="Mbak">Mbak</option>
    <option value="Om">Om</option>
    <option value="Tante">Tante</option>
    <option value="Kak">Kak</option>
    <option value="Ce">Ce</option>
    <option value="Ko">Ko</option>
    <option value="Bro">Bro</option>
    <option value="Sist">Sist</option>
    <option value="Abi">Abi</option>
    <option value="Umi">Umi</option>
    <option value="Abah">Abah</option>
</x-lb5-select>