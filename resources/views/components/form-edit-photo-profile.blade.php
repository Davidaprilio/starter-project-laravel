<div class="" x-data>
    <x-pack-img size="200" class="mx-auto" src="{{ Auth::user()->photo_url }}" id="previewImageEl" />
    <div class="d-flex justify-content-around mx-auto mt-3" style="max-width: 250px">
        <button class="btn btn-sm btn-primary" x-on:click="$refs.filePhoto.click()">Pilih Photo</button>
        <button class="btn btn-sm btn-danger" onclick="previewRemoveImage('#file_photo', '#previewImageEl', '#btn_save_photo')">Hapus Photo</button>
    </div>
    <x-lb5-form action="{{ route('user.profile.photo') }}" method="PUT" class="needs-validation" {{ $attributes }} enctype="multipart/form-data">
        <input type="file" class="d-none" id="file_photo" name="photo_profile" accept="image/*" x-ref="filePhoto" onchange="previewImage(this, '#previewImageEl', '#btn_save_photo')">
        <button disabled id="btn_save_photo" class="btn btn-sm btn-success d-block px-3 mt-2 mx-auto">Simpan perubahan</button>
    </x-lb5-form>
</div>