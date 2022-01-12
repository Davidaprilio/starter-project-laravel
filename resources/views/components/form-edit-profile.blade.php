<x-lb5-form action="{{ route('user.profile') }}" method="PUT" class="needs-validation" {{ $attributes }}>
    <div class="row">
        <x-pack-sapaan label="Sapaan" name="sapaan" value="{{ Auth::user()->sapaan }}"
            parent-class="form-group col-md-4 col-5" />

        <x-lb5-input label="Panggilan" placeholder="nama panggilan" name="panggilan"
            value="{{ Auth::user()->panggilan }}" parent-class="form-group col-md-5 col-12" />

        <x-lb5-select label="Jenis Kelamin" name="jk" value="{{ Auth::user()->jenis_kelamin }}"
            parent-class="form-group col-md-3 col-12">
            <option value="L">Pria</option>
            <option value="P">Wanita</option>
        </x-lb5-select>

        <x-lb5-input label="Nama" placeholder="nama lengkap" name="name" value="{{ Auth::user()->name }}"
            parent-class="form-group col-md-6 col-12" />

        <x-lb5-input label="Email" placeholder="alamat email" name="email" value="{{ Auth::user()->email }}"
            parent-class="form-group col-md-6 col-12" />

        <x-lb5-input label="Pekerjaan" placeholder="pekerjaan" name="pekerjaan" value="{{ Auth::user()->pekerjaan }}"
            parent-class="form-group col-md-7 col-12" />

        <x-lb5-select parent-class="form-group col-md-5 col-12" label="Agama" name="agama">
            <option value="Islam">Islam</option>
        </x-lb5-select>
    </div>
    <div class="row">
        <x-lb5-input type="number" label="Phone" placeholder="Nomor Handphone" name="phone"
            value="{{ Auth::user()->phone }}" parent-class="form-group col-md-6 col-12" />

        <x-lb5-input type="date" label="Tanggal Lahir" placeholder="tanggal lahir" name="tgllahir"
            value="{{ Auth::user()->tgl_lahir }}" parent-class="form-group col-md-6 col-12" />
    </div>
    <x-pack-daerah class="row mt-1">
        <div class="col-12">
            <h6>Alamat</h6>
        </div>
        <x-pack-provinsi parent-class="form-group col-md-4 col-12" name="prov" label="Provinsi" />
        <x-pack-kota parent-class="form-group col-md-4 col-12" name="kota" label="Kota" />
        <x-pack-kecamatan parent-class="form-group col-md-4 col-12" name="kec" label="Kecamatan" />
    </x-pack-daerah>
</x-lb5-form>