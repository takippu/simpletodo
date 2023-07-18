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