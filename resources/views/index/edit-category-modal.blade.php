
<!-- Modal -->
<div
  data-te-modal-init
  class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
  id="exampleModal2"
  tabindex="-1"
  aria-labelledby="exampleModalLabel2"
  aria-hidden="true">
  <div
    data-te-modal-dialog-ref
    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
    <div
      class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
      <div
        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <!--Modal title-->
        <h5
          class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
          id="exampleModalLabel2">
          Edit Category
        </h5>
        <!--Close button-->
        <button
          type="button"
          class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
          data-te-modal-dismiss
          aria-label="Close">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!--Modal body-->
      <div class="relative flex-auto p-4" data-te-modal-body-ref>
        
        <p class="py-2 pb-3 text-sm">Choose the category : </p>

          @php
              $foundCats = false;
          @endphp
          @foreach ($categories as $data)
          @if ($data->user_id == auth()->user()->id) 
          @php
          $foundCats = true;
      @endphp
            <div class="grid grid-cols-6 gap-4 p-0">
              <div class="col-span-4">
                {{ $data->category_name }} 
              </div>
              <div class="col-span-2">
                <div class="inline-flex shadow-sm rounded-md mb-5" role="group">
                  <!-- Add a unique identifier to the "Edit" button using data-category-id -->
                  <button type="button" class="edit-button rounded-l-lg border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700" data-category-id="{{ $data->id }}">
                    Edit
                  </button>
                  <form action="{{ route('todos-cat.deletecat', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="border-t border-r rounded-r-md border-b border-gray-200 bg-red-800 text-sm font-medium px-4 py-2 text-white hover:bg-red-500 hover:text-orange-300 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                    Delete
                  </button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Add a class to the edit input div for easy targeting -->
            <form action="{{ route('todos-cat.editcat', $data->id) }}" method="POST">
              @csrf
              @method('PUT')
            <div class="py-2 hidden edit-input" id="cat_name_{{ $data->id }}" name="cat_name_{{ $data->id }}">
              <div class="relative mb-4 flex flex-wrap items-stretch">
                <input
                  type="text"
                  class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                  placeholder="new name for {{ $data->category_name }}..."
                  name="category_name"
                  aria-describedby="button-addon2" />
                <button
                  class="z-[2] inline-block rounded-r bg-green-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-green-900 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:z-[3] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                  data-te-ripple-init
                  type="submit"
                  id="button-addon2">
                  save
                </button>
              </div>
            </div>

          </form>
          @endif
        @endforeach

          {{-- @foreach ($categories as $data)
            @if ($data->user_id == auth()->user()->id) 
            @php
                $foundCats = true;
            @endphp
            <div class="grid grid-cols-6 gap-4">
              <div class="col-span-4">
                {{ $data->category_name }} 
              </div>
              <div class="col-span-2">
                <div class="inline-flex shadow-sm rounded-md mb-5" role="group">
                  <button type="button" class="rounded-l-lg border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                      Edit
                  </button>
                  <button type="button" class="border-t border-r rounded-r-md border-b border-gray-200 bg-red-800 text-sm font-medium px-4 py-2 text-white hover:bg-red-500 hover:text-orange-300 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                      Delete
                  </button>
              </div>
              </div>
            </div>
            <div class="relative flex-auto p-4 hidden" id="cat_name_{{ $data->id }}" name="cat_name_{{ $data->id }}">
              <input type="text" id="category_name" name="category_name" class="block w-full p-2 pl-2 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="">
            </div>
            @endif
          @endforeach --}}
          @if (!$foundCats)
              no category yey
          @endif


        
      </div>


      <!--Modal footer-->
      <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button
          type="button"
          class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
          data-te-modal-dismiss
          data-te-ripple-init
          data-te-ripple-color="light">
          Cancel
        </button>
        {{-- <button
          type="submit"
          class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
          data-te-ripple-init
          data-te-ripple-color="light">
          Save
        </button> --}}

      </div>
    </div>
  </div>
</div>

