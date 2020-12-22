
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
      <form action="{{route('voyager.trips.store')}}" method="POST">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  name
                </label>
                <div class="flex mt-1 rounded-md shadow-sm">

                  <input type="text" name="name" id="company_website" class="flex-1 block w-full border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm">
                </div>
              </div>
            </div>

            <div>
              <label for="description" class="block text-sm font-medium text-gray-700">
                description
              </label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="10" class="block w-full mt-1 border border-indigo-700 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
              </div>

            </div>

             <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6">
                      <label for="category" class="block text-sm font-medium text-gray-700">Categorie</label>
                       <select name="category_id" class="w-full px-3 py-2 bg-white border rounded outline-none">
                           @foreach ($categories as $category)
                           <option class="py-1" value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                       </select>
                  </div>
                  <div class="col-span-3">
                      <label for="city-depart" class="block text-sm font-medium text-gray-700">Ville depart</label>
                       <select name="city_departure_id" class="w-full px-3 py-2 bg-white border rounded outline-none">
                           @foreach ($cities as $city)
                           <option class="py-1" value="{{$city->id}}" >{{$city->name}}</option>
                           @endforeach
                       </select>
                  </div>
                  <div class="col-span-3">
                      <label for="city-arrive" class="block text-sm font-medium text-gray-700">Ville destination</label>
                       <select name="city_arrival_id" class="w-full px-3 py-2 bg-white border rounded outline-none">
                           @foreach ($cities as $city)
                           <option class="py-1" value="{{$city->id}}">{{$city->name}}</option>
                           @endforeach
                       </select>
                  </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-6">
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                <input type="text"  name="duration" id="duration" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="departure" class="block text-sm font-medium text-gray-700">Aller</label>
                <input type="date"  name="departure"  id="departure" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="arrival" class="block text-sm font-medium text-gray-700">Retour</label>
                <input type="date"  name="arrival"   id="arrival" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="text" name="price" id="price"  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
        <p class="mt-1 text-sm text-gray-600">
          Use a permanent address where you can receive mail.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">

        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-flow-col grid-cols-3 grid-rows-3 gap-4">



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
          <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>

    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>
@endsection
