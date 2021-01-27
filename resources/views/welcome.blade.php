@extends('layouts.app')

@section('content')
    @include('partials.header')
    <div class="py-10 bg-white">
        <h3
            class="mb-10 text-3xl font-extrabold leading-normal tracking-tight text-center text-gray-900 sm:text-5xl sm:mb-16">
            <span class="text-indigo-600"> Pourquoi voyager avec Oumma Voyages ?</span>
        </h3>
        <div class="flex flex-col justify-between max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8 sm:flex-row">

            <div class="mx-auto">
                <ul class="md:grid md:grid-cols-3 md:col-gap-10 md:row-gap-10">
                    <li class="p-5 py-16 text-center transition duration-500 ease-in-out border group hover:shadow-xl hover:border-gray-500">
                        <a href="#">
                            <div class="flex flex-col items-center">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center text-indigo-500 group-hover:text-indigo-600">
                                        <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-6 group-hover:text-white">
                                    <h4 class="text-lg font-semibold leading-6 text-gray-900">Oumma Voyages vous garantit
                                    </h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Séjours testés par notre équipe pour vous offrir la meilleure expérience de voyage
                                        possible.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li
                        class="p-5 py-16 mt-10 text-center transition duration-500 ease-in-out border md:mt-0 hover:shadow-xl hover:border-gray-500">
                        <a href="#">
                            <div class="flex flex-col items-center">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center text-indigo-500 hover:text-indigo-600">
                                        <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <h4 class="text-lg font-semibold leading-6 text-gray-900">Oumma Voyages vous protège
                                    </h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Pour un séjour en toute sécurité, Oumma Voyages est agréee par l’APST, le IATA et
                                        Atout France.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="p-5 py-16 mt-10 text-center border md:mt-0 hover:shadow-lg hover:border-gray-500">
                        <a href="#">
                            <div class="flex flex-col items-center">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center text-indigo-500 hover:text-indigo-600">
                                        <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4 class="text-lg font-semibold leading-6 text-gray-900">Oumma Voyages vous accueille
                                    </h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Notre équipe d’agents de voyage experimentés vous accueille au sein de son agence
                                        aux portes de Paris.
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <!--  details section   -->
    <div class="max-w-screen-lg py-20 mx-auto">
        <div class="mb-16 text-center">
            <h3 class="text-3xl font-extrabold leading-normal tracking-tight text-gray-900 sm:text-4xl">
                <span class="text-indigo-600"> Des offres 100% adaptées à la communauté Musulmane !</span>
            </h3>
        </div>

        <div class="grid col-gap-5 xl:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @forelse ($trips as $trip)
            <div class="my-3 border-4 border-dashed hover:border-indigo-400">
                <div class="py-3 text-sm font-medium text-center text-gray-500 uppercase bg-gray-200">
                    {{$trip->category->name}}
                </div>
                <a href="{{route('tours.details',[$trip->id,$trip->slug])}}">
                <img class="object-cover w-full pt-5 rounded-lg shadow-md h-4/5"
                    src="{{asset('storage/'.$trip->photos[0]->image)}}" alt="{{$trip->name}}" />
                </a>
                <div class="flex justify-between py-3 text-gray-500 bg-gray-200">

                    <div class="text-sm">
                        <p class="font-semibold">{{$trip->duration}}</p>
                    </div>
                    <div class="text-xs">
                        <p class="font-bold text-green-500 ">
                           à partir de {{$trip->price}} €
                        </p>
                    </div>

                </div>

            </div>

            @empty

            @endforelse


        </div>

    </div>
    <!--  faq  -->
    <div class="container px-4 mx-auto mt-12 mb-20 xl:px-64">
        <h3 class="text-3xl font-extrabold leading-normal tracking-tight text-gray-900 sm:text-4xl">
            <span class="text-indigo-600"> Questions fréquentes</span>
        </h3>
        <div class="mt-6 text-lg leading-loose" x-data="{
                                                      faqs: [
                                                      {
                                                      question: 'Modalités de paiement acceptés',
                                                      answer: ' 1- Carte bleue  2-Espèces 3-Chèque',
                                                      isOpen: false,
                                                      },
                                                      {
                                                      question: 'Peut-on payer en plusieurs fois ?',
                                                      answer: 'Vous avez la possibilité de payer votre commande en 3 ou 4 fois.',
                                                      isOpen: false,
                                                      },
                                                      ]
                                                      }">
            <template x-for="faq in faqs" :key="faq">
                <div>
                    <button @click="faq.isOpen = !faq.isOpen"
                        class="flex items-center justify-between w-full py-3 mt-4 font-bold border-b border-gray-400">
                        <div x-text="faq.question"></div>
                        <svg x-show="!faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                        </svg>
                        <svg x-show="faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                        </svg>

                    </button>
                    <div class="mt-2 text-gray-700 origin-top transform" x-show="faq.isOpen" x-text="faq.answer">
                    </div>
                </div>
            </template>
        </div>
    </div>

@endsection
