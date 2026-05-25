<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <title>Contact Us</title>
</head>
<body >
    <nav id="navbar" class="px-15 py-3 md:flex md:items-center md:justify-evenly md:gap-100 bg-[#ede1cadd]">
        <a href="{{ route('dashboard') }}" id="brand" class="flex gap-2 items-center">
            <img src="{{ asset('assets/logo-beneran-contoh.svg') }}" alt="Logo" class="h-[36px] object-cover ">
            <span class="font-libreBodoni italic text-dark text-[20px]">Vianarch</span>
        </a>
        <button class="md:hidden py-5 cursor-pointer transition delay-150 duration-300 ease-in-out" id="menu-button" aria-label="Toggle Menu" onclick="document.getElementById('menu').classList.toggle('hidden');">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 21 21"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.5h12m-12.002 4h11.997M4.5 14.5h11.995" stroke-width="1"/></svg>
        </button>
        <ul class="hidden font-albertSans flex-col md:gap-[55px] md:flex p-5 md:w-auto md:flex-row md:items-center bg-choco md:bg-transparent rounded-md" id="menu">
            <li><a href="{{ route('dashboard') }}" class="text-creme md:text-darkA text-[15px]">Home</a></li>
            <li><a href="{{route('dashboard')}}#product" class="text-creme md:text-darkA text-[15px] md:hover:text-black">Product</a></li>
            <li><a href="{{route('dashboard')}}#order" class="text-creme md:text-darkA text-[15px] md:hover:text-black active:md:text-black">Order</a></li>
            <li><a href="{{route('dashboard')}}#gallery" class="text-creme md:text-darkA text-[15px] md:hover:text-black active:md:text-black">Gallery</a></li>


        <div class="md:flex md:gap-4 flex flex-col md:flex-row md:ml-60">
        <!--Jika blm login-->
        @guest
            <button onclick="window.location='{{ route('login') }}'" class="md:bg-transparentt
            outline-2 md:outline-black outline-lightBone outline-solid  px-30 py-2 md:px-8 md:py-2 rounded-md text-[15px] my-4 mx-2 md:my-0
             hover:bg-lightBone hover:outline-0 text-lightBone hover:text-choco transition-all duration-300 ease-in delay-75
             bg-transparent md:text-black md:hover:bg-choco md:hover:text-creme cursor-pointer">
                Sign In
            </button>

            <a href={{ route('contact') }} class="md:bg-choco outline-0 md:outline-black outline-lightBone outline-solid  flex justify-center px-28 py-2 md:px-8 md:py-2 mx-2 md:mx-0 rounded-md text-[15px] my-4 md:my-0
             hover:bg-choco  text-choco hover:outline-2 hover:text-lightBone transition-all duration-300 ease-in delay-75
             bg-lightBone md:text-lightBone md:hover:bg-creme md:hover:text-choco">
                Contact us
            </a>
        @endguest
        <!--Jika sudah login-->
        @auth
        <a href={{ route('contact') }} class="md:bg-choco outline-0 md:outline-black outline-lightBone outline-solid items-center flex justify-center px-28 py-2 md:px-6 md:ml-[-15px] md:py-2 mx-2 md:mx-0 rounded-md text-[15px] my-4 md:my-0
             hover:bg-choco  text-choco hover:outline-2 hover:text-lightBone transition-all duration-300 ease-in delay-75
             bg-lightBone md:text-lightBone md:hover:bg-creme md:hover:text-choco">
                Contact us
            </a>
            <a href={{ route('profile') }} class="md:flex md:flex-col justify-center hidden">
                <img src="{{ asset('assets/profile-svg.svg') }}" alt="user-icon" class="md:h-[45px] md:object-cover md:ml-0 md:px-5">
            </a>
            <button href=# class="md:hidden md:bg-choco outline-0 md:outline-black outline-lightBone outline-solid  flex justify-center px-28 py-2 md:px-6 md:ml-[-15px] md:py-2 mx-2 md:mx-0 rounded-md text-[15px] my-2 md:my-0
             hover:bg-choco  text-choco hover:outline-2 hover:text-lightBone transition-all duration-300 ease-in delay-75
             bg-lightBone md:text-lightBone md:hover:bg-creme md:hover:text-choco">
                Edit profile
            </button>
        @endauth
        </div>
        </ul>
    </nav>
    {{-- form contact --}}
    <div class="flex flex-col p-10 bg-gradient-to-b from-[#ede1cadd] to-[#E8D9D0] md:flex-row gap-20">
        <div class="flex w-1/2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1093180347734!2d110.45701997563864!3d-6.996405293004738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708dc78732bab7%3A0xff8f709ab8d262b0!2scluster%20taman%20buah%20kalicari!5e0!3m2!1sen!2sid!4v1776011400095!5m2!1sen!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="rounded-xl shadow-2xl"></iframe>
        </div>
        <div class="flex flex-col gap-5">
            <div class="flex flex-col  max-w-[600px]">
                <h1 class="font-dmSerifText text-[70px] text-[#3b2c2c]">Get in Touch</h1>
                <p class="text-[18px] text-[#54382eac] ml-1">Have questions or want to work together? Get in touch with us—we’d be happy to help and respond to your needs as soon as possible.</p>
            </div>
            <div class="flex mt-5">
                <div for="icon" class="flex flex-col gap-2">
                    <img src="{{ asset('assets/location-filled.svg') }}" alt="location-icon" class="w-[20px] h-[20px] ml-1 mt-1">
                    <img src="{{ asset('assets/telephone.svg') }}" alt="telephone-icon" class="w-[20px] h-[20px] ml-1 mt-14">
                    <img src="{{ asset('assets/email.svg') }}" alt="email-icon" class="w-[30px] h-[20px] mt-8">
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col max-w-[400px] ml-5">
                        <p class="font-bold font-albertSans text-[18px]">Address</p>
                        <a href="https://maps.app.goo.gl/opT8pWxcCUoW5BQSA">
                            <p class="font-albertSans text-[15px] text-[#54382eac] hover:text-[#3b2c2c]">Cluster Taman Buah Kalicari No. 12A, Kec. Palebon, Kel. Pedurungan, Kota Semarang, Indonesia</p>
                        </a> 
                    </div>
                    <div class="flex flex-col ml-5 mt-3">
                        <p class="font-bold font-albertSans text-[18px]">Phone</p>
                        <a href="https://wa.me/6285842225735">
                            <p class="font-albertSans text-[15px] text-[#54382eac] hover:text-[#3b2c2c]">+62 858 4222 5738</p>
                        </a>
                    </div>
                    <div class="flex flex-col ml-5 mt-3">
                        <p class="font-bold font-albertSans text-[18px]">Email</p>
                        <a href="mailto:vianarch@gmail.com">
                            <p class="font-albertSans text-[15px] text-[#54382eac]  hover:text-[#3b2c2c]">vianarch@gmail.com</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    <footer class="w-screen h-[261px] bg-[#54382E] flex flex-col">
            <div class="flex flex-col ml-27">
                <div class="flex justify-between mt-8">
                    <div class="flex">
                        <img src="{{ asset('assets/logo-beneran-contoh.svg') }}" class="w-[34px] h-[34px] ">
                        <h3 class="font-libreBodoni italic text-[30px] font-bold text-[#D6D6D6] mt-[-3px] ml-3">Vianarch</h3>
                    </div>
                    <div class="flex gap-10 mr-27 mt-5 font-albertSans text[20px] text-[#D6D6D6]">
                        <a href="{{ route('dashboard') }}">HOME</a>
                        <a href="{{ route('dashboard') }}#aboutUs">ABOUT US</a>
                        <a href="{{ route('dashboard') }}#gallery">GALLERY</a>
                        <a href="{{ route('dashboard') }}#contact">CONTACT</a>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <p class="font-albertSans text-[15px] text-[#D6D6D6] max-w-100">
                        We are a team of passionate architects and designers dedicated to creating stunning 3D visualizations that bring your architectural dreams to life. 
                    <div class="flex gap-10 mr-27 font-albertSans text[20px] text-[#D6D6D6]">
                        <a href="{{ route('user.order') }}">ORDER</a>
                        <a href="{{ route('profile') }}">PROFILE</a>
                    </div>
                </div>
                <div class="bg-[#D6D6D6] w-80% h-[0.5px] mt-8 mr-27"></div>
                <div class="flex justify-between">
                    <div class="flex mt-3 gap-5">
                        <a href="https://facebook.com">
                            <img src="{{ asset ('assets/facebook.svg') }}">
                        </a>
                        <a href="https://whatsapp.com">
                            <img src="{{ asset ('assets/whatsapp.svg') }}">
                        </a>
                        <a href="https://instagram.com">
                            <img src="{{ asset ('assets/instagram.svg') }}">
                        </a>
                    </div>
                    <div class="font-albertSans text-[12px] text-[#D6D6D6] opacity-65 mr-27 mt-3">
                        <p>© 2025 Dreamy Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
    </footer>
</body>