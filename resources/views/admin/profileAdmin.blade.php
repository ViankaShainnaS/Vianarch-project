@extends('admin.adminMenu')

@section('content')
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
@if(session('error'))
    <div>{{ session('error') }}</div>
@endif
<div class="bg-[#54382E] w-[780px] h-[640px] rounded-[5px]">
            <div class="p-10 flex gap-3">
                <img src="{{ asset('assets/profile2.svg') }}" alt="Profile Icon" class="">
                <h1 class="text-[#F3F3F3] font-albertSans text-[15px]">Profile Settings</h1>
            </div>
            <div>
            <form action="{{ route('profile.update') }}" method="POST" class="flex ml-17 gap-20">
                @csrf
            <div class="flex flex-col gap-7">

                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label for="name" class="text-[#F4DCCE] text-[13px] font-albertSans">Name</label>
                        <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]">
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label for="email" class="text-[#F4DCCE] text-[13px] font-albertSans">Email</label>
                        <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE]">
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label for="mobile" class="text-[#F4DCCE] text-[13px] font-albertSans">Mobile</label>
                        <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                    </div>
                    <input type="text" id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]">
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex">
                        <label for="address" class="text-[#F4DCCE] text-[13px] font-albertSans">Address</label>
                        <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                    </div>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px] ">
                </div>

                <button type="submit" class="bg-[#E8D9D0] font-albertSans text-[15px] mt-10 w-32 px-5 h-fit py-2 rounded-[5px]">Save</button>
            </div>

            <div class="flex flex-col gap-7">
            <div class="flex flex-col gap-2">
                <div class="flex">
                    <label for="address" class="text-[#F4DCCE] text-[13px] font-albertSans">Address</label>
                    <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                </div>
            <select id="gender" name="gender" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px] w-[200px]">
                <option value="">Select Gender</option>
                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex">
                    <label for="birthdate" class="text-[#F4DCCE] text-[13px] font-albertSans">Birthdate</label>
                    <img src="{{ asset('assets/required.svg') }}" alt="required Icon" class="w-[5px] h-[5px] mt-1 ml-1">
                </div>
                <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="p-3 border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]">
            </div>
        </div>
        </form>
            </div>
        </div>
@endsection
