<!-- This example requires Tailwind CSS v2.0+ -->
 <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">

        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

          {{ $musics->links() }}
  
      </nav>

    </div>

  </div>   
  