@props([
'id' => 'form-register'
])
<x-lb5-form action="{{ route('register') }}" id="{{ $id }}" {{ $attributes }}>
    <div class="row text-start mb-3">
        <div class="col-4">
            <x-pack-sapaan label="Sapaan" name="sapaan" />
        </div>
        <div class="col-5">
            <x-lb5-input label="Panggilan" name="firstname" />
        </div>
        <div class="col-3">
            <x-pack-gender label="Jenis Kelamin" name="gender" />
        </div>
        <div class="col-7">
            <x-lb5-input label="Nama Lengkap" name="name" />
        </div>
        <div class="col-5">
            <x-lb5-input label="Phone" type="number" name="phone" />
        </div>
        <div class="col-5">
            <x-lb5-input label="Pekerjaan" name="work" />
        </div>
        <div class="col-7">
            <x-lb5-input label="Email" type="email" name="email" />
        </div>
        {{-- Handle dan Bundle input select Provinsi, Kota, Kecamatan --}}
        <x-pack-daerah-bundle />
    </div>
</x-lb5-form>