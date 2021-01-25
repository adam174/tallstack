@extends('layouts.app')
@section('content')
<div class="relative flex items-center justify-center h-48 overflow-hidden bg-gray-600 sm:h-96">
        <figure id="slide-1" class="absolute top-0 left-0 w-full h-full bg-center bg-cover" style="background-image:url(https://cdn.pixabay.com/photo/2020/09/10/13/28/crowd-5560458_1280.jpg)"></figure>
        <figure id="slide-2" class="absolute top-0 left-0 w-full h-full bg-center bg-cover" style="background-image:url(https://cdn.pixabay.com/photo/2017/04/10/09/05/makkah-2217845_1280.jpg)"></figure>
        <figure id="slide-3" class="absolute top-0 left-0 w-full h-full bg-center bg-cover" style="background-image:url(https://cdn.pixabay.com/photo/2014/07/30/12/55/mosque-405239_1280.jpg)"></figure>
        <figure id="slide-4" class="absolute top-0 left-0 w-full h-full bg-center bg-cover" style="background-image:url(https://cdn.pixabay.com/photo/2017/04/10/09/06/house-of-allah-2217859_1280.jpg)"></figure>
        <div class="absolute w-full h-full bg-gray-900 opacity-50"></div>
<h1 class="absolute z-10 font-serif text-2xl font-bold leading-tight text-center text-white shadow-lg sm:text-4xl">lieux d'exceptions et un service unique.</h1>
</div>
<!-- test -->
<h1 class="max-w-4xl mx-auto mt-5 font-serif text-4xl leading-tight text-center text-teal-500 sm:text-4xl">{{$trip->name}}</h1>
<div class="mt-2 font-semibold text-center text-gray-600 text-1xl sm:mt-1">A partir de {{$trip->price}} € par pers</div>
<div x-data="{ open: false }" class="flex flex-wrap mt-4 mb-5 lg:mt-8 lg:mb-12">
<div class="w-full lg:w-2/3 lg:pr-8">
<div class="mb-6 overflow-hidden">
<ul id="lightSlider">
    @forelse ($trip->photos as $photo)

    <li data-thumb="{{asset('storage/'.$photo->image)}}">
        <img src="{{asset('storage/'.$photo->image)}}" />
    </li>
    @empty
    @endforelse
    </ul>
</div>
<h2 class="m-5 text-lg font-bold text-gray-800">Détails</h2>
<div class="pb-6 m-5 text-sm text-gray-900 border-b border-gray-300 border-dashed lg:pb-0 lg:border-0 lg:mb-5">
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Prix: <span class="font-bold">{{$trip->price}} €</span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Pays: <span class="font-bold"> {{$trip->city_arrival->country->name}} </span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Pays de depart: <span class="font-bold"> {{$trip->city_departure->country->name}} </span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Periode: <span class="font-bold">{{$trip->duration}}</span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Date: <span class="font-bold">{{$trip->departure ?? 'Flexible'}} => {{$trip->arrival ?? ''}}</span></span>
</div>
<h3 class="m-5 text-lg font-bold text-gray-800">Ce qui est inclus</h3>
<div class="pb-4 m-5 border-b border-gray-300 border-dashed rounded lg:p-4 lg:border lg:mb-8">
<div class="flex flex-wrap items-center text-sm text-gray-800">
    @forelse ($trip->services as $service)
    <span class="mb-2 mr-6">
    <svg class="inline-block mr-1 text-teal-400 fill-current" height="17" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M21.652 3.211c-.293-.295-.77-.295-1.061 0L9.41 14.34c-.293.297-.771.297-1.062 0L3.449 9.351c-.145-.148-.335-.221-.526-.222-.193-.001-.389.072-.536.222L.222 11.297c-.144.148-.222.333-.222.526 0 .194.078.397.223.544l4.94 5.184c.292.296.771.776 1.062 1.07l2.124 2.141c.292.293.769.293 1.062 0l14.366-14.34c.293-.294.293-.777 0-1.071l-2.125-2.14z" fill-rule="evenodd" /></svg>
    <span class="whitespace-no-wrap">{{$service->name}}</span>
    </span>
    @empty

    @endforelse


</div>
</div>
<h2 class="m-5 text-lg font-bold text-gray-800">Description</h2>
<div class="m-5 font-sans text-base antialiased font-medium leading-loose text-gray-700"><div>{!! html_entity_decode($trip->description) !!}</div>
<br />
</div>
</div>
<!--   form -->
<div class="fixed inset-0 z-40 justify-center w-full overflow-auto md:items-center md:flex max-w-prose lg:w-1/3 lg:relative lg:block lg:overflow-visible" :class="{ 'hidden' : open === false }">
    <div class="fixed inset-0 z-40 bg-black opacity-75 lg:relative"></div>
    <div class="relative z-40 p-6 bg-gray-200 rounded shadow-lg lg:sticky lg:top-0 lg:p-8 lg:shadow-none" @click.away="open = false">
        <button type="button" aria-label="close modal" class="absolute top-0 right-0 flex items-center px-6 py-2 -mt-10 -mr-6 text-white focus:outline-none" @click="open = false" :class="{ 'hidden': open === false }">
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"></path></svg>
        </button>
        <h2 class="mb-px text-lg font-bold leading-tight text-gray-800">interessé par ce voyage ?.</h2>
        <p class="mb-4 text-sm text-gray-600">Nous vous contacterons dans les prochaines 24 heures.</p>
        <form method="POST" action="{{ route('reservation.store',$trip->id) }}" class="text-sm">
            @csrf
            @guest


            <label class="block">
                <span class="text-gray-700">Name</span>
                <input name="name" type="text" class="block w-full mt-1 form-input" required>
            </label>

            <label class="block mt-4 sm:mt-6">
                <span class="text-gray-700">E-mail address</span>
                <input name="email" type="email" class="block w-full mt-1 form-input" required>
            </label>

            <label class="block mt-4 sm:mt-6">
                <span class="block mb-1 text-gray-700">Phone number</span>
                <input name="mobile" type="tel" class="block w-full mt-1 form-input" required>
            </label>

            @endguest

            <div class="mt-4 md:flex sm:mt-6">
                <label class="flex items-start">
                    <span class="block m-auto text-gray-700">Aller</span>
                    <input name="departure" type="date" class="block w-full mt-1 form-input" required>
                </label>

                <label class="flex items-end">
                    <span class="block m-auto text-gray-700">Retour </span>
                    <input name="arrival" type="date" class="block w-full mt-1 form-input" required>
                </label>
            </div>

            <div class="mt-4 md:flex sm:mt-6">
               <label class="flex items-start">
                 <select name="adults" class="block w-full mt-1 form-input">
                     <option class="py-4" selected>Adulte(s) > 11 ans</option>
                           @for ($i = 0; $i < 10; $i++)
                           <option class="py-4" value="{{$i}}">{{$i}} </option>
                           @endfor
                 </select>
               </label>

                <label class="flex items-center">
                    <select name="children" class="block w-full mt-1 form-input">
                        <option class="py-4" selected>Enfants: 2 à 11 ans</option>
                           @for ($i = 0; $i < 10; $i++)
                           <option class="py-4" value="{{$i}}">{{$i}}</option>
                           @endfor
                    </select>
                </label>

                <label class="flex items-start">
                    <select name="infant" class="block w-full mt-1 form-input">
                           <option class="py-4" selected>Bébés: < 2 ans</option>
                           @for ($i = 0; $i < 10; $i++)
                           <option class="py-4" value="{{$i}}">{{$i}}</option>
                           @endfor
                    </select>
                </label>
            </div>
            <label class="block mt-4 sm:mt-6">
                <span class="block mb-1 text-gray-700">Message (facultatif )</span>
                <textarea name="message" rows="4" cols="50" class="block w-full mt-1 border border-green-600"></textarea>
            </label>
            <button id="js-submit" type="submit" class="w-full px-16 py-3 mt-4 font-semibold text-teal-900 transition-colors duration-100 bg-teal-300 border border-transparent rounded focus:outline-none hover:bg-teal-200 hover:border-teal-300 sm:mt-6">ENVOYER MA DEMANDE</button>
        </form>
    </div>
</div>




<div class="fixed bottom-0 left-0 right-0 w-full px-4 py-4" :class="{ 'hidden': open === true }" @click="open = true">
<button type="button" class="z-40 w-full py-5 text-sm font-bold text-gray-900 uppercase bg-teal-400 rounded shadow-lg focus:outline-none lg:hidden">ENVOYER MA DEMANDE</button>
</div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.10.0/dist/js/lightgallery.min.js"></script>
<script>
$(document).ready(function() {

$('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop:true,
    slideMargin: 0,
    thumbItem: 9
});
});
</script>
@endsection
