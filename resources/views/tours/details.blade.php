@extends('layouts.app')
@section('content')
<h1 class="max-w-4xl mx-auto mt-5 font-serif text-4xl leading-tight text-center text-teal-500 sm:text-4xl">{{$trip->name}}</h1>
<div class="mt-2 font-semibold text-center text-gray-600 text-1xl sm:mt-1">A partir de {{$trip->price}} € par pers</div>
<div x-data="{ open: false }" class="flex flex-wrap mt-4 mb-5 lg:mt-8 lg:mb-12">
<div class="w-full lg:w-2/3 lg:pr-8">
<div class="mb-6 overflow-hidden">
<ul id="lightSlider">
    @foreach ($trip->photos as $photo)

    <li data-thumb="{{asset('storage/'.$photo->image)}}">
        <img src="{{asset('storage/'.$photo->image)}}" />
    </li>

    @endforeach
    </ul>
</div>
<h2 class="mb-5 text-lg font-bold text-gray-800">Détails</h2>
<div class="pb-6 mb-5 text-sm text-gray-900 border-b border-gray-300 border-dashed lg:pb-0 lg:border-0 lg:mb-5">
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Prix: <span class="font-bold">{{$trip->price}} €</span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Pays: <span class="font-bold">{{$trip->country_arrival->name}}</span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Pays de depart: <span class="font-bold">{{$trip->country_departure->name}}</span></span>
<span class="block pr-3 mb-2 mr-2 text-gray-700 border-gray-300 lg:inline-block lg:border-r">Periode: <span class="font-bold">{{$trip->periode}}</span></span>
</div>
<h3 class="mb-2 text-lg font-bold text-gray-800">Ce qui est inclus</h3>
<div class="pb-4 mb-5 border-b border-gray-300 border-dashed rounded lg:p-4 lg:border lg:mb-8">
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
<h2 class="mb-5 text-lg font-bold text-gray-800">Description</h2>
<div class="font-sans text-base antialiased font-medium leading-loose text-gray-700"><div>{{$trip->description}}</div>
<br />
</div>
</div>
<div class="fixed inset-0 z-50 flex items-center justify-center w-full overflow-auto lg:w-1/3 lg:relative lg:block lg:overflow-visible" :class="{ 'hidden' : open === false }">
<div class="fixed inset-0 z-50 bg-black opacity-75 lg:relative"></div>
<div class="relative z-50 p-6 bg-gray-200 rounded shadow-lg lg:sticky lg:top-0 lg:p-8 lg:shadow-none" @click.away="open = false">
<button type="button" aria-label="close modal" class="absolute top-0 right-0 flex items-center px-6 py-2 -mt-10 -mr-6 text-white focus:outline-none" @click="open = false" :class="{ 'hidden': open === false }">
<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"></path></svg>
</button>
<h2 class="mb-px text-lg font-bold leading-tight text-gray-800">interessé par ce voyage ?.</h2>
<p class="mb-4 text-sm text-gray-600">Nous vous contacterons dans les prochaines 24 heures.</p>
<form method="POST" action="" class="text-sm">
<input type="hidden" name="_token" value="iF3Vn0uG7VRSKcGF2BEdg8i5ah16GjI7xsDuy1Fy"> <div id="my_name_q6INtsqcOBr8w48m_wrap" style="display:none;">
<input name="my_name_q6INtsqcOBr8w48m" type="text" value="" id="my_name_q6INtsqcOBr8w48m">
<input name="valid_from" type="text" value="eyJpdiI6IlNJbVVEOU5jaytnMllXQ1pzUXdGZUE9PSIsInZhbHVlIjoiOFJLTXlibUVkVENScFRLOEFHM3NRZz09IiwibWFjIjoiZjhjMWE5ZDBhY2RlMDE2NWQ0Y2E3NGI2NzAyZTg3MWE3ZjIxOTczNmJhNTkxNTZhOTg5ZjkzYjVmMmRmZDcwZCJ9">
</div>
<input type="hidden" name="id" value="1828">
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
<input id="js-phone" type="tel" class="block w-full mt-1 form-input" required>
</label>
<label class="block mt-4 sm:mt-6">
<span class="block mb-1 text-gray-700">Options ?</span>
<select name="reason" class="block w-full mt-1 text-base leading-normal bg-white border border-gray-400 shadow-none form-select focus:border-gray-400 sm:text-sm">
<option value="Golden Visa">Option 1</option> <option value="Investment">Investment</option>
<option value="Second Home">Second Home</option>
<option value="Relocation">Relocation</option>
</select>
</label>
<div class="flex mt-4 sm:mt-6">
<label class="flex items-start">
<input name="newsletter" value="1" type="checkbox" class="w-5 h-5 mt-px border border-gray-400 form-checkbox">
<span class="ml-2 text-gray-700">Subscribe the <a href="/" class="underline hover:no-underline">Travel</a> Newsletter.</span>
</label>
</div>
<button id="js-submit" type="submit" class="w-full px-16 py-3 mt-4 font-semibold text-teal-900 transition-colors duration-100 bg-teal-300 border border-transparent rounded focus:outline-none hover:bg-teal-200 hover:border-teal-300 sm:mt-6">Send Message</button>
</form>
</div>
</div>
<div class="fixed bottom-0 left-0 right-0 w-full px-4 py-4" :class="{ 'hidden': open === true }" @click="open = true">
<button type="button" class="z-50 w-full py-5 text-sm font-bold text-gray-900 uppercase bg-teal-400 rounded shadow-lg focus:outline-none lg:hidden">ENVOYER MA DEMANDE</button>
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
