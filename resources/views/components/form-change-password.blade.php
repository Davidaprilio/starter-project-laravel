<x-lb5-form id="password-form" action="{{ route('user.profile.password') }}" method="PUT" {{ $attributes }}>
    <x-lb5-input label="Password lama" name="current_password" type="password" />
    <x-lb5-input label="Password baru" name="password" type="password" />
    <x-lb5-input label="Konfirmasi password" name="password_confirmation" type="password" />
</x-lb5-form>