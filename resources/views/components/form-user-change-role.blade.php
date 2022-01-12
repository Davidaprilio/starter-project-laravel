@props([
'roles' => false
])
@if ($roles)
<x-lb5-form id="password-form" action="{{ route('user.profile.password') }}" method="PUT" {{ $attributes }}>
    <x-lb5-select label="Pilih Role" name="role">
        @foreach ($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
    </x-lb5-select>
</x-lb5-form>
@else
<x-lb5-alert type="warning">Attribute :roles="$roles" tidak ada</x-lb5-alert>
@endif