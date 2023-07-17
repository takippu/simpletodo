@extends('layouts.app')



@section('content')
<!--
  Welcome to Tailwind Play, the official Tailwind CSS playground!

  Everything here works just like it does when you're running Tailwind locally
  with a real build pipeline. You can customize your config file, use features
  like `@apply`, or even add third-party plugins.

  Feel free to play with this example if you're just learning, or trash it and
  start from scratch if you know enough to be dangerous. Have fun!
-->
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12 ">
    <img src="/img/beams.jpg" alt="" class="absolute left-1/2 top-1/2 max-w-none -translate-x-1/2 -translate-y-1/2" width="1308" />
    <div class="absolute inset-0 bg-[url(/img/grid.svg)] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"></div>
    <div class="relative bg-white px-6 pb-8 pt-10 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
      <div class="mx-auto max-w-md">
        <!-- <img src="/img/logo.svg" class="h-6" alt="Tailwind Play" /> -->
        <div class="container mx-auto">
          <div class="flex justify-between items-start">
            <div class="w-1/2 p-4">
              <h2 class="dark:text-dark text-4xl font-bold">Simple2Do</h2>
            </div>
            <div class="w-1/2 p-4">
              <h2 class="text-2xl font-bold"></h2>
      
            </div>
            @guest
            <div class="p-4">
              <h2 class="text-sm font-bold"><a href="/login" class="text-blue-700">log in</a> or <a href="/register" class="text-blue-700">register</a></h2> 
              
              <!-- Add your log in form or button here -->
            </div>
            @endguest
          </div>
        </div>
        <div class="divide-y divide-gray-300/50">
          @auth
            
          <div class="space-y-6 py-8 text-base leading-7 text-gray-600">
            <p>ur2do list :-</p>
            <!--Tabs navigation-->
            <ul
              class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0"
              role="tablist"
              data-te-nav-ref>
              <li role="presentation" class="flex-auto text-center">
                <a
                  href="#tabs-home01"
                  class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                  data-te-toggle="pill"
                  data-te-target="#tabs-home01"
                  data-te-nav-active
                  role="tab"
                  aria-controls="tabs-home01"
                  aria-selected="true"
                  >All</a
                >
              </li>
              @foreach ($categories as $data)
                @if ($data->user_id == auth()->user()->id) 
                <li role="presentation">
                  <a
                    href="#tabs-{{ $data->id }}"
                    class="focus:border-transparen my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                    data-te-toggle="pill"
                    data-te-target="#tabs-{{ $data->id }}"
                    role="tab"
                    aria-controls="tabs-{{ $data->id }}"
                    aria-selected="false"
                    >{{ $data->category }}</a
                  >
                </li>
                @endif
              @endforeach
              <li role="presentation" class="flex-auto text-center">
                
                <a
                  href="#tabs-contact01"
                  class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-0 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                  data-te-toggle="modal"
                  data-te-target="#exampleModal"
                  data-te-ripple-init
                  data-te-ripple-color="light"
                  ><i class="fas fa-plus mr-2"></i></a
                >
              </li>
            </ul>
            @include('index.category-modal')
            <!--Tabs content-->
            <div class="mb-6">
              <div
                class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                id="tabs-home01"
                role="tabpanel"
                aria-labelledby="tabs-home-tab01"
                data-te-tab-active>
                Tab 1 content
              </div>
              @foreach ($categories as $data)
                @if ($data->user_id == auth()->user()->id) 
                <div
                  class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                  id="tabs-{{ $data->id }}"
                  role="tabpanel"
                  aria-labelledby="tabs-{{ $data->id }}">
                  Tab 2 content
                </div>
                @endif
              @endforeach
            </div>
            <ul class="space-y-4">

              @foreach ($todo as $todolist)
                @if ($todolist->user_id == auth()->user()->id) {{-- Assuming user_id is the foreign key for the user --}}
                  <li class="flex items-center">
                    <p class="ml-4">{{ __($todolist->name) }}</p>
                    <form action="{{ route('todos.destroy', $todolist->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="ml-auto flex-grow text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </form>
                  </li>
                @else
                  <li class="flex items-center">
                    <p class="ml-4">{{ __("Seems like you still didn't add anything..") }}</p>
                  </li>
                  @break
                @endif

              @endforeach


   
            </ul>
          </div>
          <div class="pt-8 text-base font-semibold leading-7">
            <p class="text-gray-900">i have something to do</p>
            @if(session()->has('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-gray-200">

                    {{ session()->get('success') }}

                </div>
            @endif
            @if(session()->has('successdelete'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-gray-200">

                    {{ session()->get('successdelete') }}

                </div>
            @endif
            <form action="{{ route('store') }}" method="POST">   
              @csrf
              <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                  </div>
                  <input type="text" id="name" name="name" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="add new 2 do" required>
                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Add</button>
              </div>
            </form>

          </div>

          @endauth  
        </div>
      </div>
    </div>
  </div>
  

@endsection