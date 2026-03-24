<div>
    @if (session()->has('success'))
        <div class="flex justify-center">
            <div class="p-3 w-80 mb-5 rounded-4xl bg-black text-center text-green-500">
                <h1>{{ session('success') }}</h1>
            </div>
        </div>
    @endif
    <!-- Contact Us -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mt-12 max-w-full mx-auto">
            <!-- Card -->
            <div class="flex flex-col border border-gray-200 rounded-xl p-4 sm:p-6 lg:p-8 dark:border-neutral-700">
                <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                    Create Animal
                </h2>

                <form wire:submit.prevent='update' enctype="multipart/form-data">
                    <div class="grid gap-4 lg:gap-6">
                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-post-name"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Name</label>
                                <input type="text" name="hs-post-name" id="hs-post-name" wire:model="name"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('name')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label for="hs-email-contacts-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Image</label>
                                <input type="file" name="hs-email-contacts-1" id="hs-email-contacts-1"
                                    autocomplete="off" wire:model="image"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('image')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End Grid -->

                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-phone-number-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Category</label>
                                <select name="hs-phone-number-1" id="hs-phone-number-1" wire:model="category_id"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($this->categories() as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                        <div>
                                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                        </div>
                                @enderror
                            </div>
                            <div>
                                <label for="hs-phone-number-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Species</label>
                                <select name="hs-phone-number-1" id="hs-phone-number-1" wire:model="species_id"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="">-- Select Species --</option>
                                    @foreach ($this->species() as $species)
                                        <option value="{{ $species->id }}">{{ $species->species_name }}</option>
                                    @endforeach
                                </select>
                                @error('species_id')
                                        <div>
                                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                        </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End Grid -->

                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-phone-number-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Habitat</label>
                                <select name="hs-phone-number-1" id="hs-phone-number-1" wire:model="habitat_id"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="">-- Select Habitat --</option>
                                    @foreach ($this->habitats() as $habitat)
                                        <option value="{{ $habitat->id }}">{{ $habitat->hab_name }}</option>
                                    @endforeach
                                </select>
                                @error('habitat_id')
                                        <div>
                                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                        </div>
                                @enderror
                            </div>
                            <div>
                                <label for="hs-phone-number-1"
                                    class="block mb-3 text-sm text-gray-700 font-medium dark:text-white">Needs</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                                    @forelse ($this->needs() as $need)
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="tag-{{ $need->id }}"
                                                value="{{ $need->id }}" wire:model="selectedNeeds"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label for="need-{{ $need->id }}"
                                                class="ml-2 block text-sm text-gray-700 dark:text-white">{{ $need->food_name }}</label>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 dark:text-gray-400">No tags available.</p>
                                    @endforelse
                                    @error('selectedNeeds')
                                        <div>
                                            <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- End Grid -->

                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-post-name"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Weight</label>
                                <input type="number" name="hs-post-name" id="hs-post-name" wire:model="weight"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('weight')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label for="hs-post-name"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Height</label>
                                <input type="number" name="hs-post-name" id="hs-post-name" wire:model="height"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('height')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End Grid -->

                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-post-name"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Age</label>
                                <input type="number" name="hs-post-name" id="hs-post-name" wire:model="age"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('age')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div>
                            <label for="hs-post-details"
                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Description</label>
                            <textarea id="hs-post-details" name="hs-post-details" wire:model="description" rows="8"
                                class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"></textarea>
                            @error('description')
                                <div>
                                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-6 grid">
                        <button type="submit"
                            class="w-50 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Save</button>
                    </div>

                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Contact Us -->
</div>
