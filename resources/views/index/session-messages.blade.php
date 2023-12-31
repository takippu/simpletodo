@if(session()->has('success'))
<div
class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-2 py-2 text-base text-success-700"
role="alert"
data-te-alert-init
data-te-alert-show>
<strong class="mr-1">Success! </strong> {{ session()->get('success') }}
<button
  type="button"
  class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
  data-te-alert-dismiss
  aria-label="Close">
  <span
    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
</div>
@endif
@if(session()->has('successdelete'))
<div
class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-2 py-2 text-base text-success-700"
role="alert"
data-te-alert-init
data-te-alert-show>
<strong class="mr-1">Success! </strong>  {{ session()->get('successdelete') }}

<button
  type="button"
  class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
  data-te-alert-dismiss
  aria-label="Close">
  <span
    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
</div>
@endif
@if(session()->has('success2'))
<div
class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-2 py-2 text-base text-success-700"
role="alert"
data-te-alert-init
data-te-alert-show>
<strong class="mr-1">Success! </strong>  {{ session()->get('success2') }}

<button
  type="button"
  class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
  data-te-alert-dismiss
  aria-label="Close">
  <span
    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
</div>
@endif
@if(session()->has('success3'))
<div
class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-2 py-2 text-base text-success-700"
role="alert"
data-te-alert-init
data-te-alert-show>
<strong class="mr-1">Success! </strong>  {{ session()->get('success3') }}

<button
  type="button"
  class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
  data-te-alert-dismiss
  aria-label="Close">
  <span
    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
</div>
@endif
@if(session()->has('successcat'))
<div
class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-2 py-2 text-base text-success-700"
role="alert"
data-te-alert-init
data-te-alert-show>
<strong class="mr-1">Success! </strong>  {{ session()->get('successcat') }}

<button
  type="button"
  class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
  data-te-alert-dismiss
  aria-label="Close">
  <span
    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="h-5 w-5">
      <path
        fill-rule="evenodd"
        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
        clip-rule="evenodd" />
    </svg>
  </span>
</button>
</div>
@endif
