<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <script>

        function play(url)
        {
          var video = document.getElementById('videoplayer');
          video.src = "MyUploads/"+url;
          video.play();
        }

        function download(uri){
            var link = document.createElement("a");
    // If you don't know the name or want to use
    // the webserver default set name = ''
           
            link.href = "download/"+uri;
            document.body.appendChild(link);
            link.click();
            link.remove();

        }
    </script>
      
      <!-- Bottom right video player -->
      <div style="position: fixed;bottom: 10px;right: 10px;" class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        <div>
          <button>X</button>
        </div>
        <video id="videoplayer" width="320" height="240" controls>
          <source src="MyUploads/AZwsiDeG.mp4" type="video/mp4">
        </video>
      </div>
      

        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Dashboard') }}
          </h2>
        </x-slot>
       
      
        <div>
          <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        
            <table class="w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Uploaded at
                  </th>
        
                  <th class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
        
                  <th class="px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name in server
                  </th>
        
                  <th class="px-2 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white text-xs divide-y divide-gray-200">
                <!-- Table fill with musics... -->
                @foreach ($musics as $music)
                    <tr>
                      <td class="px-2 py-4 whitespace-nowrap">
                        {{ $music->created_at }}
                      </td>
      
                      <td class="px-2 py-4 whitespace-nowrap">
                        {{ $music->original_name }}
                      </td>
            
                      <td class="px-2 py-4 whitespace-nowrap" style="text-align: center;">
                        {{ $music->name_on_server }}
                      </td>
            
                      <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
            
                        <div class="flex justify-center space-x-1">
                          <button style="margin-right:20px;" onclick="play('{{ $music->name_on_server }}')" class="border-2 border-indigo-200 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-indigo-500">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                          </button>
                          <button style="margin-right:20px;" onclick="download('{{ $music['name_on_server'] }}')" class="border-2 border-indigo-200 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                              </svg>
                          </button>
                          <button style="margin-right:20px;" class="border-2 border-red-200 rounded-md p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-500">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                          </button>
                        </div>
            
                      </td>
                    </tr>
                @endforeach
      
              </tbody>
            </table>

            @include('components.pagination')

          </div>
        </div>


</x-app-layout>
