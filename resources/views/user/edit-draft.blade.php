@extends ('profile')

@section('content')
<div class="w-3/4 p-6">
    <div class="flex-col bg-[#54382E] w-[780px] h-[640px] rounded-[5px] mt-7">
        <div class="flex justify-between">
            <div class="p-10 flex gap-3">
                <a href="{{ route('user.drafts') }}">
                    <img src="{{ asset('assets/arrow-back-white.svg') }}" alt="Arrow icon" class="">
                </a>
                <h1 class="text-[#F3F3F3] font-albertSans text-[15px] mt-1">Edit Draft</h1>
            </div>
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded-[5px] mt-10 items-center justify-center mr-10">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="">
            <form action="{{ route('user.draft.update', $draft->id) }}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <div class = "flex px-15">
                    {{-- sebelah kiri --}}
                    <div class="flex flex-col gap-[28px]">
                        {{-- name --}}
                        <div class="flex flex-col gap-3">
                            <label for="username" class="text-[#F4DCCE] text-[13px] font-albertSans">Name</label>
                            <input type="text" name="username" placeholder="Username" value="{{ $draft->username }}" class="p-3 w-[280px] border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]" required>
                        </div>
                        {{-- mobile phone --}}
                        <div class="flex flex-col gap-3">
                            <label for="phone_number" class="text-[#F4DCCE] text-[13px] font-albertSans">Mobile Phone</label>
                            <input type="text" name="phone_number" placeholder="Mobile Phone" value="{{ $draft->phone_number }}" class="p-3 w-[280px] border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]" required>
                        </div>
                        {{-- category --}}
                        <div class="flex flex-col gap-3">
                            <p class="text-[#F4DCCE] text-[13px] font-albertSans">Category</p>
                            <div class="flex gap-4">
                                <input type="radio" id="ext" name="category" class="peer/ext hidden" value="Exterior" {{ old('category', $draft->category) == 'Exterior' ? 'checked' : '' }}>
                                <label for="ext" class="w-fit p-4 rounded-[5px] border-1 border-solid border-[#F4DCCE] text-[#F4DCCE] bg-[#54382E] cursor-pointer peer-checked/ext:bg-[#F4DCCE] peer-checked/ext:text-[#54382E] transition duration-300">
                                    Exterior Design
                                </label>
                                <input type="radio" id="int" name="category" class="peer/int hidden" value="Interior" {{ old('category', $draft->category) == 'Interior' ? 'checked' : '' }}>
                                <label for="int" class="w-fit p-4 rounded-[5px] border-1 border-solid border-[#F4DCCE] text-[#F4DCCE] bg-[#54382E] cursor-pointer peer-checked/int:bg-[#F4DCCE] peer-checked/int:text-[#54382E] transition duration-300">
                                    Interior Design
                                </label>
                            </div>
                        </div>
                        {{-- visual --}}
                        <div class="flex flex-col gap-3">
                            <p class="text-[#F4DCCE] text-[13px] font-albertSans">Visual</p>
                            <div class="gap-4 flex">
                                <input type="radio" id="vis" name="visual" class="peer/vis hidden" value="3D Visualization" {{ old('visual', $draft->visual)  == '3D Visualization' ? 'checked' : ''}}>
                                <label for="vis" class="w-fit p-4 rounded-[5px] border-1 border-solid border-[#F4DCCE] text-[#F4DCCE] bg-[#54382E] cursor-pointer peer-checked/vis:bg-[#F4DCCE] peer-checked/vis:text-[#54382E] transition duration-300">
                                    3D Visualization
                                </label>
                                <input type="radio" id="anm" name="visual" class="peer/anm hidden" value="3DAnimation" {{ old('visual', $draft->visual)  == '3DAnimation' ? 'checked' : ''}}>
                                <label for="anm" class="w-fit p-4 rounded-[5px] border-1 border-solid border-[#F4DCCE] text-[#F4DCCE] bg-[#54382E] cursor-pointer peer-checked/anm:bg-[#F4DCCE] peer-checked/anm:text-[#54382E] transition duration-300">
                                    3D Animation
                                </label>
                                <input type="radio" id="flr" name="visual" class="peer/flr hidden" value="Floor Plan" {{ old('visual', $draft->visual)  == 'Floor Plan' ? 'checked' : ''}}>
                                <label for="flr" class="w-fit p-4 rounded-[5px] border-1 border-solid border-[#F4DCCE] text-[#F4DCCE] bg-[#54382E] cursor-pointer peer-checked/flr:bg-[#F4DCCE] peer-checked/flr:text-[#54382E] transition duration-300">
                                    Floor Plan
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- sebelah kanan --}}
                    <div class="flex flex-col gap-[28px]">
                        {{-- email --}}
                        <div class="flex flex-col gap-3">
                            <label for="email" class="text-[#F4DCCE] text-[13px] font-albertSans">Email</label>
                            <input type="email" name="email" placeholder="Email" value="{{ $draft->email }}" class="p-3 w-[280px] border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]" required>
                        </div>
                        {{-- area --}}
                        <div class="flex flex-col gap-3">
                            <label for="area" class="text-[#F4DCCE] text-[13px] font-albertSans">Area</label>
                            <input type="text" name="area" placeholder="Area" value="{{ $draft->area }}" class="p-3 w-[280px] border-1 border-[#F4DCCE] rounded-[5px] focus:outline-none focus:ring-2 focus:ring-[#9C755E] transition duration-300 bg-none text-[#F4DCCE] text-[15px]" required>
                        </div>
                        {{-- type of building --}}
                        <div class="flex flex-col gap-3">
                            <label for="typeOfBuilding" class="text-[#F4DCCE] text-[13px] font-albertSans">Type of Building</label>
                            <div class="relative w-[280px]">
                                <input type="hidden" name="typeOfBuilding" id="typeOfBuildingInput" value="{{ old('typeOfBuilding', $draft->typeOfBuilding) }}">
                                <button type="button" id="buildingDropdownButton" onclick="toggleBuildingDropdown()" class="w-full p-3 border-1 border-[#F4DCCE] rounded-[5px] flex items-center justify-between bg-none text-[#F4DCCE] text-[15px] focus:outline-none focus:ring-2 focus:ring-[#9C755E]">
                                    <span id="buildingDropdownLabel">{{ old('typeOfBuilding', $draft->typeOfBuilding) ?? 'Select building type' }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="buildingDropdownList" class="absolute left-0 right-0 z-20 mt-2 max-h-52 overflow-auto rounded-[5px] border border-[#F4DCCE] bg-[#54382E] shadow-lg hidden">
                                    <div data-value="Residential" class="building-option p-3 text-[#F4DCCE] cursor-pointer hover:bg-[#F4DCCE] hover:text-[#54382E] {{ old('typeOfBuilding', $draft->typeOfBuilding) == 'Residential' ? 'bg-[#F4DCCE] text-[#54382E]' : '' }}">Residential</div>
                                    <div data-value="Office" class="building-option p-3 text-[#F4DCCE] cursor-pointer hover:bg-[#F4DCCE] hover:text-[#54382E] {{ old('typeOfBuilding', $draft->typeOfBuilding) == 'Office' ? 'bg-[#F4DCCE] text-[#54382E]' : '' }}">Office</div>
                                    <div data-value="Industrial" class="building-option p-3 text-[#F4DCCE] cursor-pointer hover:bg-[#F4DCCE] hover:text-[#54382E] {{ old('typeOfBuilding', $draft->typeOfBuilding) == 'Industrial' ? 'bg-[#F4DCCE] text-[#54382E]' : '' }}">Industrial</div>
                                    <div data-value="Mansion" class="building-option p-3 text-[#F4DCCE] cursor-pointer hover:bg-[#F4DCCE] hover:text-[#54382E] {{ old('typeOfBuilding', $draft->typeOfBuilding) == 'Mansion' ? 'bg-[#F4DCCE] text-[#54382E]' : '' }}">Mansion</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex mx-15 mt-5 ">
                    <button type="submit" class="w-full hover:bg-[#54382E] hover:text-[#F4DCCE] py-2 px-4 rounded-[5px] hover:border-2 hover:border-solid hover:border-[#F4DCCE] bg-[#F4DCCE] text-[#54382E] transition duration-300">Update Draft</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const buildingButton = document.getElementById('buildingDropdownButton');
    const buildingList = document.getElementById('buildingDropdownList');
    const buildingInput = document.getElementById('typeOfBuildingInput');
    const buildingLabel = document.getElementById('buildingDropdownLabel');
    const buildingOptions = document.querySelectorAll('.building-option');

    function toggleBuildingDropdown() {
        buildingList.classList.toggle('hidden');
    }

    function selectBuildingOption(value, text) {
        buildingInput.value = value;
        buildingLabel.textContent = text;
        buildingOptions.forEach((option) => {
            if (option.dataset.value === value) {
                option.classList.add('bg-[#F4DCCE]', 'text-[#54382E]');
            } else {
                option.classList.remove('bg-[#F4DCCE]', 'text-[#54382E]');
            }
        });
        buildingList.classList.add('hidden');
    }

    buildingOptions.forEach((option) => {
        option.addEventListener('click', () => {
            selectBuildingOption(option.dataset.value, option.textContent.trim());
        });
    });

    document.addEventListener('click', (event) => {
        if (!buildingButton.contains(event.target) && !buildingList.contains(event.target)) {
            buildingList.classList.add('hidden');
        }
    });
</script>
@endsection