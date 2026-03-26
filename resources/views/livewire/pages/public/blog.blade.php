<div>
    <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">

    @forelse ($this->posts() as $pkey => $post)
      <!-- Card -->
      <a wire:key="post-{{ $pkey }}" class="group block rounded-xl overflow-hidden focus:outline-none" href="{{ route('blog.single', $post->id) }}">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
          <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            @if ($post->image)
              <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            @else
              <div class="bg-slate-200 h-full w-full flex items-center justify-center text-sm text-muted-foreground rounded-xl">No image available</div>
            @endif
          </div>

          <div class="grow">
            <h3 class="text-xl font-semibold text-foreground group-hover:text-muted-foreground-2">{{ $post->title }}</h3>
            <p class="mt-3 text-muted-foreground-2">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-primary decoration-2 group-hover:underline group-focus:underline font-medium">
              Read more
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </p>

            @if ($post->animal)
              <p class="mt-2 text-xs text-muted-foreground-2">Animal: {{ $post->animal->name }}</p>
            @endif
          </div>
        </div>
      </a>
      <!-- End Card -->
    @empty
      <div class="col-span-2 text-center p-8 bg-slate-50 rounded-xl">
        <p class="text-md text-black ">No blog posts found yet.</p>
      </div>
    @endforelse

  </div>
  <!-- End Grid -->
</div>
<!-- End Card Blog -->
</div>
