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
<style>
  .tooltipTick {
    position: relative;
    display: inline-block;
    /* border-bottom: 1px dotted black; */
  }
  
  .tooltipTick .tooltipTicktext {
    visibility: hidden;
    width: 70px;
    background-color: gray;
    color: #fff;
    text-align: center;
    border-radius: 8px;
    padding: 2px 0;
    
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 150%;
  }
  
  .tooltipTick:hover .tooltipTicktext {
    visibility: visible;
  }
  </style>
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
    @guest
   <div class="relative bg-white px-6 pb-8 pt-5 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
    @endguest
    @auth
    <div class="relative bg-white px-6 pb-8 pt-5 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 h-[600px] w-[600px]">
    @endauth
    
      <div class="mx-auto max-w-md">
        <!-- <img src="/img/logo.svg" class="h-6" alt="Tailwind Play" /> -->
        <div class="container mx-auto">
          
          <div class="flex flex-row justify-between items-start">
            <div class="basis-1/2 p-0 ml-1">
              <h2 class="dark:text-dark text-4xl font-bold">Simple2Do</h2>
            </div>
            <div class="basis-1/4 p-0 ml-5">
              @auth
              <!-- Settings Dropdown -->
              <div class="flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
              </div>
              @endauth

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
            
          <div class="space-y-6 py-6 text-base leading-7 text-gray-600">
            <!--Tabs navigation-->

            @include('index.tabs-nav')

            <!--Category Modal-->

            @include('index.category-modal')

            <!--Edit Category Modal-->

            @include('index.edit-category-modal')

            <!--Tabs content-->
            <div class="mb-6">

              @include('index.all-list')

              @foreach ($categories as $data)
                @if ($data->user_id == auth()->user()->id) 
                  @include('index.alt-list')
                @endif
              @endforeach
            </div>
            
          </div>
          <div class="pt-8 text-base font-semibold leading-7">
            <p class="text-gray-500">i have something to do</p>
            
            @include('index.session-messages')
            
            <form action="{{ route('store') }}" method="POST">   
              @csrf

              <div class="relative">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                  </div>
                  <input type="text" id="todoAdd" name="todoAdd" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="add new 2 do" required>
                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Add</button>
              </div>

              <p class="text-gray-600 my-3">Custom Options : </p>

              <div class="relative my-3">
                <select data-te-select-init data-te-select-visible-options="3" id="category" name="category">
                  <option value="">Choose Category:</option>
                  @php
                      $foundCats = false;
                  @endphp
                  @foreach ($categories as $data)
                    @if ($data->user_id == auth()->user()->id) 
                    @php
                        $foundCats = true;
                    @endphp
                    <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                    @endif
                  @endforeach
                  @if (!$foundCats)
                      no category yey
                  @endif
                </select>
              </div>


            </form>

          </div>

          @endauth  
        </div>
      
    </div>
  </div>
  

@endsection