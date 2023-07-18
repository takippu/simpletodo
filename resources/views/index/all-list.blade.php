<div
    class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
    id="tabs-home01"
    role="tabpanel"
    aria-labelledby="tabs-home-tab01"
    data-te-tab-active>
    <ul class="space-y-4">
      @forelse ($todo as $todo_list)
      <li class="flex justify-between items-center">
          <p>{{ $todo_list->todo }}</p>
          <form action="{{ route('todos.destroy', $todo_list->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="ml-auto flex-grow text-red-500">
                <i class="fa-solid fa-trash-can" style="color: #f61e1e;"></i>
            </button>
          </form>
      </li>
      @empty
            empty
      @endforelse
    </ul>
</div>