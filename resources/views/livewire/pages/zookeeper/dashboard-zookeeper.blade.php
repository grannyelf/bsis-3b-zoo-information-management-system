<div>
    <!-- Card Grid -->
    <div class="py-12 grid grid-cols-1 sm:grid-cols-2 gap-8 lg:gap-12">
        @forelse ($this->animals() as $animal_key => $animal)
            <div wire:key="{{ $animal_key }}">
                <!-- Card -->
                <a class="group flex flex-col focus:outline-hidden" href="{{ route('zookeeper.animal.update', $animal->id) }}">
                    <div
                        class="aspect-w-16 aspect-h-12 overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-2xl max-h-96">
                        <img class="w-full h-full max-h-96 object-cover rounded-2xl group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out"
                            src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}">
                    </div>

                    <div class="pt-4">
                        <h3
                            class="relative inline-block font-medium text-lg text-white dark:text-gray-200 before:absolute before:bottom-0.5 before:start-0 before:-z-1 before:w-full before:h-1 before:bg-cyan-600 dark:before:bg-cyan-500 before:transition before:origin-left before:scale-x-0 group-hover:before:scale-x-100">
                            {{ $animal->name }}
                        </h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-300">
                            {{ Str::limit($animal->description, 100) }}
                        </p>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-300">No animals found.</p>
        @endforelse
    </div>
    <!-- End Card Grid -->
</div>
