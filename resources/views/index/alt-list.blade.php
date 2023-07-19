<div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
    id="tabs-{{ $data->id }}"
    role="tabpanel"
    aria-labelledby="tabs-{{ $data->id }}">
    <ul>
        @php
            $foundRecords = false;
        @endphp

        @foreach ($todo as $todo_list)
            @if ($todo_list->category_id == $data->id)
                @php
                    $foundRecords = true;
                @endphp

                <li class="flex justify-between items-center">
                    <p>{{ $todo_list->todo }}</p>
                    <form action="{{ route('todos.destroy', $todo_list->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-auto flex-grow text-red-500 tooltipTick">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg> --}}
                            {{-- <i class="fa-solid fa-trash-can" style="color: #f61e1e;"></i> --}}
                            <i class="fa-solid fa-check" style="color: #57af55;"></i>
                                <span class="tooltipTicktext">Done</span>
                        </button>
                    </form>
                </li>
            @endif
        @endforeach

        @if (!$foundRecords)
            <li>empty..</li>
        @endif
    </ul>
</div>
