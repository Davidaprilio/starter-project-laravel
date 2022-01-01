@props([
    'parentClass' => 'mb-3',
    'target' => '#kota'
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes"
    x-data="{ prov: [] }"
    x-init="prov = await (await fetch('{{ url('/api/provinsi') }}')).json()"
    >
    <template x-for="pv in prov" :key="pv.id">
        <option x-init="$el.setAttribute('value', pv.id)" x-text="pv.name"></option>
    </template>
</x-lb5-select>