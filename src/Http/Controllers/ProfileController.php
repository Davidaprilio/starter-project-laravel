<?php

namespace Davidaprilio\LaravelStarter\Http\Controllers;

use App\Actions\DavPack\PasswordRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    use PasswordRules;
    /**
     * Show My Profile
     */
    public function show(Request $request)
    {
        return view('user.profile.show', [
            'users' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = [
            "alamat" => null,
            "bank" => null,
            'sapaan' => $request->sapaan,
            'panggilan' => $request->panggilan,
            'jk' => $request->jk,
            'name' => $request->name,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'phone' => $request->phone,
            'birthday' => $request->tgllahir,
            'provinsi' => $request->prov,
            'kota' => $request->kota,
            'kecamatan' => $request->kec,
        ];
        $update = $user->update($data);
        if ($update) {
            return redirect()->back()->with('profile-updated', 'Profile berhasil di perbarui');
        } else {
            return redirect()->back()->withError('profile-cant-updated', 'Profile gagal di perbarui');
        }
    }


    public function photo(Request $request)
    {
        $request->validate([
            'photo_profile' => 'image|mimes:jpg,png,jpeg'
        ], [
            'image' => 'File harus berupa gambar',
            'mimes' => 'Jenis gambar tidak didukung'
        ]);

        $user = $request->user();
        $user == null ? abort('403') : false;

        # Cek data lama jika ada hapus filenya
        if ($user->photo != null) {
            Storage::delete($user->photo);
        }

        # Simpan data baru
        $file = $request->file('photo_profile');
        if ($file) {
            // $stored = $file->store('profile');
            $imager = new ImageManager();
            $img = $imager->make($file)->fit(400);
            $ext = $img->extension ?? 'jpg';
            $img->encode($ext);
            $hash = md5($img->__toString());
            $stored = "profile/{$hash}.{$ext}";
            $img->save(storage_path("app/{$stored}"));
        } else {
            $stored = null;
        }

        $update = $user->update(['photo' => $stored]);
        if ($update) {
            return redirect()->back()->with('changed-photo', 'Photo profile berhasil disimpan');
        } else {
            return redirect()->back()->withErrors(['fail-change-photo' => 'Gagal menyimpan foto']);
        }
    }

    public function getPhoto(Request $request)
    {
        $file = $request->file ?? $request->sizeorfile;
        $size = $request->file ? $request->sizeorfile : 400;
        $path = "profile/{$file}";
        if (Storage::missing($path)) {
            abort(404, 'Photo Not Found');
        }
        $imager = new ImageManager();
        $img = $imager->make(storage_path("app/{$path}"));
        $img->fit($size);
        // dd($response);
        return $img->response($img->extension);
    }


    /** PUT **
     * ---------------------------------------------------------
     * Update Password
     * ---------------------------------------------------------
     * 
     * @return FlashMessage
     * Success => password-changed
     * Failed => password-change-fail
     * Wrong => password-wrong
     * 
     */
    public function password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => "{$this->passwordRules}|confirmed",
        ], $this->messageValidationRules);

        if (password_verify($request->password, $request->user()->password)) {
            // dd($request->password);
            $updated = $request->user()->update([
                'password' => Hash::make($request->password)
            ]);
            if ($updated) {
                return redirect()->back()->with('password-changed', 'Password berhasil dirubah');
            }
            return redirect()->back()->with('password-change-fail', 'Password gagal dirubah');
        }
        return redirect()->back()->with('password-wrong', 'Password salah');
    }
}
