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
      title="This shows all of your todo list regardless of the categories :3"
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
        title="This shows all of your todo list that falls under {{ "$data->category_name" }}"
        >{{ $data->category_name }}</a
      >
    </li>
    @endif
  @endforeach
  <li role="presentation" class="flex-auto text-center">
                
    <a
      href="#add-category"
      class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-0 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
      data-te-toggle="modal"
      data-te-target="#exampleModal"
      data-te-ripple-init
      data-te-ripple-color="light"
      title="Add New Category"
      ><i class="fas fa-plus text-blue-800"></i></a
    >
  </li>
  <li role="presentation" class="flex-auto text-center">
                
    <a
      href="#edit-category"
      class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-0 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
      data-te-toggle="modal"
      data-te-target="#exampleModal2"
      data-te-ripple-init
      data-te-ripple-color="light"
      title="Edit Your Category"
      ><i class="fas fa-pen text-blue-800"></i></a
    >
  </li>
</ul>