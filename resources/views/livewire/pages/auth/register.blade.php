<div>
    <!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="mx-auto max-w-2xl">
    <div class="text-center">
      <h2 class="text-xl text-foreground font-bold sm:text-3xl">
        Sign Up
      </h2>
    </div>

    <!-- Card -->
    <div class="mt-5 p-4 relative z-10 bg-card border border-card-line rounded-xl sm:mt-10 md:p-10">
      <form>
        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium text-foreground">Full name</label>
          <input type="text" id="hs-feedback-post-comment-name-1" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Full name">
        </div>

        <div class="mb-4 sm:mb-8">
          <label for="hs-feedback-post-comment-email-1" class="block mb-2 text-sm font-medium text-foreground">Email address</label>
          <input type="email" id="hs-feedback-post-comment-email-1" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" placeholder="Email address">
        </div>
        <div>
            <div class="flex flex-wrap items-center gap-2">
              <label for="password" class="block text-sm mb-2 text-foreground">Password</label>
            </div>
            <div class="relative">
              <input type="password" id="password" name="password" class="py-2.5 sm:py-3 px-4 block w-full bg-layer border-layer-line rounded-lg sm:text-sm text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus disabled:opacity-50 disabled:pointer-events-none" required aria-describedby="password-error">
              <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
            </div>
            <p class="hidden text-xs text-red-600 mt-2" id="password-error">8+ characters required</p>
          </div>

        <div class="mt-6 grid">
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-primary border border-primary-line text-primary-foreground hover:bg-primary-hover focus:outline-hidden focus:bg-primary-focus disabled:opacity-50 disabled:pointer-events-none">Submit</button>
        </div>
      </form>
    </div>
    <!-- End Card -->
  </div>
</div>
<!-- End Comment Form -->
</div>