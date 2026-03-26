<div>
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
        <!-- Card Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
            @forelse ($this->animals as $akey => $animal)
                <div wire:click="animal-({{ $akey }})">
                    <!-- Card -->
                    <div class="group flex flex-col">
                        <div class="relative">
                            <div class="aspect-4/4 overflow-hidden rounded-2xl">
                                <img class="size-full object-cover rounded-2xl"
                                    src="{{ asset('storage/' . $animal->image) }}">
                            </div>

                            <div class="pt-4">
                                <h3 class="font-medium md:text-lg text-foreground">
                                    {{ $animal->name }}
                                </h3>

                                <p class="gap mt-2 font-semibold text-foreground">
                                    {{ $animal->species->species_name ?? 'Unknown Species' }} | {{ Str::ucfirst($animal->gender) ?? $animal->gender }} | {{ $animal->year_age }} Yr/s | {{ $animal->month_age }} Mth/s
                                </p>
                            </div>

                        </div>

                        <div class="mb-2 mt-4 text-sm">
                            <!-- List -->
                            <div class="flex flex-col">
                                <!-- Item -->
                                <div class="py-3 border-t border-line-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-foreground">Weight:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-foreground">{{ $animal->weight ?? 'N/A' }} kg</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-line-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-foreground">Height:</span>
                                        </div>

                                        <div class="text-end">
                                            <span class="text-foreground">{{ $animal->height ?? 'N/A' }} cm</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-line-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-foreground">Habitat:</span>
                                        </div>

                                        <div class="flex justify-end">
                                            <span
                                                class="text-foreground">{{ $animal->habitat->hab_name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->

                                <!-- Item -->
                                <div class="py-3 border-t border-line-2">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="font-medium text-foreground">Description:</span>
                                        </div>

                                        <div class="text-end">
                                            <span
                                                class="text-foreground">{{ Str::limit($animal->description, 10) ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Item -->
                            </div>
                            <!-- End List -->
                        </div>

                        <div class="mt-auto">
                            <a class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium text-nowrap rounded-xl bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus transition disabled:opacity-50 disabled:pointer-events-none"
                                href="{{ route('admin.animal.edit', $animal->id) }}">
                                Edit Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <span>No animals found.</span>
            @endforelse
            <!-- End Card -->
        </div>
        <!-- End Card Grid -->
    </div>
    <!-- End Listings -->
</div>
