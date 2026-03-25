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
                    Create Post
                </h2>

                <form wire:submit.prevent='save' wire:loading.attr='disabled' wire:target='image'>
                    <div class="grid gap-4 lg:gap-6">
                        <!-- Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                            <div>
                                <label for="hs-post-title"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Title</label>
                                <input type="text" name="hs-post-title" id="hs-post-title" wire:model="title"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                @error('title')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label for="hs-email-contacts-1"
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Image</label>
                                <input type="file" name="hs-email-contacts-1" id="hs-email-contacts-1"
                                    autocomplete="email" wire:model="image"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <div wire:loading wire:target="image" class="text-sm text-blue-500 mt-1">
                                    Uploading image...
                                </div>
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
                                    class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Animal</label>
                                <select name="hs-phone-number-1" id="hs-phone-number-1" wire:model="animal_id"
                                    class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="">-- Select Animal --</option>
                                    @foreach ($this->animals() as $animal)
                                        <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                                    @endforeach
                                </select>
                                @error('animal_id')
                                    <div>
                                        <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div>
                            <label for="hs-post-details"
                                class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Content</label>
                            <textarea id="hs-post-details" name="hs-post-details" wire:model="content" rows="8"
                                class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"></textarea>
                            @error('content')
                                <div>
                                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- End Grid -->

                    <div class="mt-6 grid">
                        <button type="submit" wire:loading.attr="disabled"
                            class="w-50 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white">

                            <span wire:loading.remove>Save</span>
                            <span wire:loading>Saving...</span>
                        </button>
                    </div>

                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Contact Us -->
</div>
