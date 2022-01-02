<div class="" x-data>
    <x-pack-img size="200" class="mx-auto" src="http://starter.localhost/photo" id="previewImageEl" />
    <div class="d-flex justify-content-around mx-auto mt-3" style="max-width: 250px">
        <button class="btn btn-sm btn-primary" x-on:click="$refs.filePhoto.click()">Pilih Photo</button>
        <button class="btn btn-sm btn-danger" onclick="previewRemoveImage('#previewImageEl')">Hapus Photo</button>
    </div>
    <x-lb5-form action="{{ route('user.profile') }}" method="PUT" class="needs-validation" {{ $attributes }}>
        <input type="file" class="d-none" name="photo" accept="image/*" x-ref="filePhoto" onchange="previewImage(this, '#previewImageEl')">
        <button class="btn btn-sm btn-success d-block px-3 mt-2 mx-auto">Simpan perubahan</button>
    </x-lb5-form>
</div>