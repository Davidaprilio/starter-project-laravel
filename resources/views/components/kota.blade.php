@props([
    'parentClass' => 'mb-3',
    'value' => false
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes"
    x-data="{
        oldValue: {{ $value ? $value : 'false' }},
        getKota: async function(id) {
            kota = [];
            kota = await getApi('{{ url('/api/kota') }}/'+id);
            createOption($el, kota, false)
            
            kotaId = this.oldValue ? this.oldValue : $el.value;
            if(this.oldValue) { $el.value = this.oldValue; this.oldValue = false }
        }
    }"
    x-on:change="kotaId = $el.value"
    x-init="getKota(provId); $watch('provId', value => getKota(value))">
</x-lb5-select>