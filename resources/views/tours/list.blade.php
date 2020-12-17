@extends('layouts.app')
@section('content')
@include('partials.header')
    <ul class="grid grid-cols-1 gap-8 my-8 sm:my-16 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($trips as $trip)

            <li class="transition-transform duration-200 transform group sm:hover:-translate-y-1">
                <a href="{{ route('tours.details',$trip->id) }}">
                    <div class="relative flex-shrink-0">
                        <img loading="lazy" src="{{asset('storage/'.$trip->photos[0]->image)}}" srcset="{{asset('storage/'.$trip->photos[0]->image)}} 1x, {{asset('storage/'.$trip->photos[0]->image)}} 2x" width="352" height="256" class="object-cover w-full h-64 transition duration-200 rounded-lg shadow-md group-hover:shadow-2xl" alt="Five-Bedroom Apartment with Terrace and Balcony for Sale in Belém, Lisboa">
                    </div>
                    <div class="relative px-4 -mt-12 text-left">
                        <div class="px-4 py-3 transition duration-200 bg-white rounded-lg shadow-md sm:group-hover:shadow-2xl">
                            <div class="text-xs font-semibold text-gray-600"> <span class="uppercase">{{$trip->city_arrival->name}} </span> <span class="mx-2 text-sm text-gray-400"> • </span> {{$trip->city_arrival->country->name}},{{$trip->city_arrival->name}},{{$trip->name}}</div>
                        <h4 class="my-1 text-sm font-bold leading-tight text-gray-900 truncate">{{$trip->name}}</h4>
                            <span class="text-sm font-semibold text-teal-500">
                                A partir de {{$trip->price}} € par pers
                                <span class="mx-2 text-gray-400"> • </span><span class="inline-block text-sm font-semibold leading-none text-orange-500">{{$trip->duration}}</span>
                            </span>
                        </div>
                    </div>
                </a>
            </li>

        @empty
            <h3>empty</h3>
        @endforelse



    </ul>


<!-- test  -->



@endsection

@section('js')

@endsection
