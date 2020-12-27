@if ($message = Session::get('success') )
<!--Toast-->
  <div class="fixed bottom-0 right-0 z-50 w-5/6 max-w-sm m-8 alert-toast md:w-full">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="flex items-start justify-between w-full h-24 p-2 text-white bg-green-500 rounded shadow-lg cursor-pointer close" title="close" for="footertoast">
        {{ $message  }}


      <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </label>
  </div>
@endif

@if ($messages = Session::get('errors'))
 <!--Header Alert-->
  <div class="fixed top-0 z-50 w-full alert-banner">
    <input type="checkbox" class="hidden" id="banneralert">

    <label class="flex items-center justify-between w-full p-2 text-white bg-red-500 shadow cursor-pointer close" title="close" for="banneralert">
       @foreach ($messages->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

      <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
    </label>
  </div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Check the following errors :(
</div>
@endif
