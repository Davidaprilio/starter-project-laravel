@props([
    'parentClass' => 'mb-3',
    'value' => false
])
{{-- @dd($attributes) --}}
<x-lb5-select :parentClass="$parentClass" :attributes="$attributes"
    x-data="{
        oldValue: {{ $value ? $value : 11 }},
        getProv: function() {
            provId = this.oldValue;
            fetch('{{ url('/api/provinsi') }}').then(res => res.json()).then(res => {
                prov = res;
                createOption($el, res, false)
                if(this.oldValue) { $el.value = this.oldValue; this.oldValue = false }
            })
        }
    }"
    x-init="getProv();"
    x-on:change="provId = $el.value">
</x-lb5-select>