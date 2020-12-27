
@extends('admin.layouts.master')

@section('body')



<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
<div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Tour details</h3>
        <p class="mt-1 text-sm text-gray-600">
          This information will be displayed publicly so be careful what you share.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{route('voyager.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  Titre
                </label>
                <div class="flex mt-1 rounded-md shadow-sm">

                  <input type="text" name="name" id="company_website" class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm" value="">
                </div>
              </div>
            </div>



             <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6">
                      <label for="parent_id" class="block text-sm font-medium text-gray-700">Categorie</label>
                       <select name="parent_id" class="w-full px-3 py-2 bg-white border rounded outline-none">
                           @foreach ($parents as $parent)
                           <option class="py-1" value="{{$parent->id}}">{{$parent->name}}</option>
                           @endforeach
                       </select>
                  </div>

             </div>
             <div class="mt-5 md:mt-0 md:col-span-2">

        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="md:col-span-3">
                       <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload a file</span>
                      <input id="file-upload" name="image" type="file" class="sr-only">
                      <input type="hidden" name="type_slug" id="type_slug" value="categories">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                    </div>

            </div>
            @if ($errors->any())
                <div class="text-red-700 alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>

        </div>

    </div>

          </div>
          <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

@endsection
