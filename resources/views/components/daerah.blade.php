<div {{ $attributes }}
    x-data="{ 
        prov: [], 
        provId: 11,
        kota: [], 
        kotaId: 1,
        kec: [],
        kecId: 1
    }">
    {{ $slot }}
</div>