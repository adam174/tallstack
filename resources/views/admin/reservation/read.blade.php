@extends('admin.layouts.master')

@section('body')
     <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>

    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 ">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="w-full p-3 bg-indigo-600 bg-opacity-75 rounded-full ">
                        Client details :
                    </div>
                    <div class="w-full border-b-4 border-indigo-600"></div>
                </div>
                <div class="ml-9">
                    <h4 class="text-2xl font-semibold text-gray-700">{{$reservation->user->name}}</h4>
                    <div class="text-gray-600">{{$reservation->user->mobile}}</div>
                    <div class="text-gray-600">{{$reservation->user->email}}</div>
                </div>
            </div>

            <div class="w-full px-6 mt-6 sm:mt-0">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="w-full p-3 bg-orange-600 bg-opacity-75 rounded-full ">
                       Tour details :
                    </div>
                    <div class="w-full border-b-4 border-orange-600"></div>
                </div>
                <div class="ml-9">
                    <h4 class="text-2xl font-semibold text-gray-700">{{$reservation->trip->name}}</h4>
                    <div class="text-gray-500">{{$reservation->trip->category->name}}</div>
                </div>
            </div>

            <div class="w-full px-6 mt-6 xl:mt-0">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                    <div class="w-full p-3 bg-pink-600 bg-opacity-75 rounded-full">
                        Reservation details
                    </div>
                    <div class="w-full border-b-4 border-orange-600"></div>
                </div>
                <div class="ml-9">
                    <h4 class="text-2xl font-semibold text-gray-700">{{ \Carbon\Carbon::parse($reservation->departure)->format('j F, Y') }} => {{ \Carbon\Carbon::parse($reservation->arrival)->format('j F, Y') }}</h4>
                    <div class="text-gray-600">Adultes : {{$reservation->adults}}</div>
                    <div class="text-gray-600">Enfants < 12 ans : {{$reservation->children}}</div>
                    <div class="text-gray-600">Bebes < 2 ans : {{$reservation->infant}}</div>
                </div>
                <div class="ml-9">
                    <label for="w3review">Message:</label>
                    <textarea rows="4" class="w-full border-4 border-orange-600" readonly>
                    {{$reservation->message}}
                    </textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">

    </div>


@endsection
