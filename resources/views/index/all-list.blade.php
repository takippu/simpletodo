<div
    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
    id="tabs-home01"
    role="tabpanel"
    aria-labelledby="tabs-home-tab01"
    data-te-tab-active>
    <ul class="space-y-4">
      @forelse ($todo as $todo_list)
      <li class="flex justify-between items-center">
          <p>{{ $todo_list->todo }} <span class="text-xs font-thin italic ml-3">
              @if ($todo_list->category == null)
                (uncategorized)
              @else
                ({{ $todo_list->category->category_name }})
              @endif
              </span>
            </p> 
          <form action="{{ route('todos.destroy', $todo_list->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="tooltipTick ml-auto flex-grow text-red-500">
                {{-- <i class="fa-solid fa-trash-can" style="color: #f61e1e;"></i> --}}
                <i class="fa-solid fa-check" style="color: #57af55;"></i>
                <span class="tooltipTicktext">Done</span>
            </button>
          </form>
      </li>
      @empty
            empty
      @endforelse
    </ul>
</div>