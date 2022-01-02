@props([
    'parentClass' => 'mb-3',
    'value' => false
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes"
    x-data="{
        oldValue: {{ $value ? $value : 'false' }},
        getKec: async function(id) {
            kec = [];
            kec = await getApi('{{ url('/api/kecamatan') }}/'+id);
            createOption($el, kec, false)
            if(this.oldValue) { $el.value = this.oldValue; this.oldValue = false }
        }
    }"
    x-on:change="kecId = $el.value"
    x-init="$watch('kotaId', value => getKec(value))">
</x-lb5-select>