@extends('profile')

@section('content')
  <main class="w-3/4 p-6">
        @if(session('success'))
            <div class="" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <h1 class="text-2xl font-bold mb-4">Profile Settings</h1>
            <div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div>
                <label for="mobile">Mobile</label>
                <input type="text" id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}">
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
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
                <label for="birthdate">Date of Birth</label>
                <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}">
            </div>

            <button type="submit">Save</button>
        </form>

                    </div>
                </main>
                @endsection
