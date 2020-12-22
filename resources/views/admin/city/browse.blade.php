@extends('admin.layouts.master')

@section('body')
<!-- component -->
<h3 class="text-3xl font-medium text-gray-700">Les Villes</h3>
<div>
      <table class="min-w-full table-auto">
        <thead class="justify-between">
          <tr class="bg-gray-800">
            <th class="px-0 py-2">
            </th>
            <th class="px-3 py-2">
              <span class="text-gray-300">Ville</span>
            </th>

            <th class="px-3 py-2">
              <span class="text-gray-300">Details</span>
            </th>

            <th class="px-3 py-2">
              <span class="text-gray-300">Action</span>
            </th>
          </tr>
        </thead>
        <tbody class="bg-gray-200 ">
            @forelse($cities as $key => $city)


          <tr class="bg-white border-4 border-gray-200">
            <td class="px-0 py-2 text-center">
            <span class="ml-2 font-semibold">{{$key + 1}}</span>
            </td>
            <td class="px-3 py-2 text-center">
            <span class="font-semibold ">{{$city->name}}</span>
            </td>

            <td class="px-3 py-2 text-center">
              <button type="button"
                  x-on:click="window.location='{{ url("admin/cities/".$city->id) }}'" class="px-4 py-2 text-white bg-indigo-700 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                Details
              </button>
            </td>
            <td class="px-3 py-2 text-center">
                <form action="{{route('voyager.cities.destroy',$city->id)}}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <button type="submit" class="px-4 py-2 text-white bg-red-700 border rounded-md hover:bg-white hover:border-indigo-500 hover:text-black ">
                          Suprimer
                        </button>
                </form>
            </td>
          </tr>
          @empty
          <tr></tr>
            @endforelse
        </tbody>
      </table>
    </div>
@endsection
