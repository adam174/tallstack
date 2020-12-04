@extends('layouts.app')
@section('content')
<div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">
 @foreach ($categories as $category)

 <div class="w-full px-2 my-2 overflow-hidden sm:my-1 sm:px-1 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/4">
    <!-- Column Content -->
    <div class="p-2 border box">
        <div class="relative pb-5/6">
            <a href="{{ route('list',$category->id) }}"> <img class="absolute inset-0 object-cover w-full h-full rounded-lg shadow-md" src="{{asset('storage/'.$category->image)}}" alt=""></a>
        </div>
        <div class="relative px-4 -mt-16">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <h4 class="mt-1 text-lg font-semibold text-center text-gray-900">{{$category->name}}</h4>
                <div class="flex items-baseline">
                    <button type="button"
                    class="px-4 py-2 mx-auto my-2 text-white transition duration-500 bg-indigo-500 border border-indigo-500 rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                    > VOIR TOUS LES SÉJOURS
                </button>
            </div>

        </div>
    </div>
</div>
</div>

@endforeach

</div>

<!--  test -->

@endsection
