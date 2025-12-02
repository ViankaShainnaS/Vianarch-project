@extends('admin.adminMenu')

@section('content')
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
@if(session('error'))
    <div>{{ session('error') }}</div>
@endif

<h1>Profile Admin</h1>

@php $user = $user ?? auth()->user(); @endphp

<div>
    <p><strong>Current Picture:</strong></p>
    @if($user && $user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile" width="150">
    @else
        <p>No picture uploaded.</p>
    @endif
</div>

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label><br>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name ?? '') }}" required>
        @error('name') <div>{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="email">Email</label><br>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email ?? '') }}" required>
        @error('email') <div>{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="mobile">Phone Number</label><br>
        <input id="mobile" name="mobile" type="text" value="{{ old('mobile', $user->mobile ?? '') }}">
        @error('mobile') <div>{{ $message }}</div> @enderror
    </div>

    <div>
    <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="">Select Gender</option>
            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <div>
        <label for="birthdate">birthdate</label>
        <input id="birthdate" name="birthdate" type="date" value="{{ old('birthdate', isset($user->birthdate) ? $user->birthdate->format('Y-m-d') : '') }}">
        @error('birthdate') <div>{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="profile_picture">Profile Picture (jpg/png)</label><br>
        <input id="profile_picture" name="profile_picture" type="file" accept="image/*">
        @error('profile_picture') <div>{{ $message }}</div> @enderror
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</form>
@endsection
