<div class="px-4 py-4 bg-indigo-900">
      <div
        class="md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between"
        x-data="{ open: false }"
        x-cloak
      >
        <div class="flex items-center justify-between">
          <a href="{{ route('home') }}" class="inline-block py-2 text-xl font-bold text-white"
            >Travel</a
          >
          <div
            class="inline-block cursor-pointer md:hidden"
            x-on:click="open = true"
          >
            <div class="w-8 mb-2 bg-gray-400" style="height: 2px;"></div>
            <div class="w-8 mb-2 bg-gray-400" style="height: 2px;"></div>
            <div class="w-8 bg-gray-400" style="height: 2px;"></div>
          </div>
        </div>

        <div x-show="open" x-on:click.away="open = false">
          <a href="{{ route('home') }}" class="block py-2 text-gray-100">Acceuil</a>
          <a href="{{ route('tours') }}" class="block py-2 text-indigo-300 hover:text-gray-100">SÉJOURS</a>
          <a href="#" class="block py-2 text-indigo-300 hover:text-gray-100">HAJJ / OMRA</a>
          <a href="#" class="block py-2 text-indigo-300 hover:text-gray-100">Contactez-nous</a>
            @guest

            <div class="flex items-center justify-between pt-4">
                <a
                href="#"
                class="inline-block w-1/2 px-4 py-2 mr-2 font-bold text-center text-gray-600 bg-gray-100 rounded-lg hover:text-indigo-600 hover:bg-gray-200"
                >Login</a
                >
                <a
                href="#"
                class="inline-block w-1/2 px-4 py-2 font-bold text-center text-white bg-red-500 rounded-lg hover:bg-red-600"
                >Sign Up</a
                >
            </div>
            @else
             <div class="flex items-center justify-between pt-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
             </div>



            @endguest
        </div>

        <div>
          <div class="hidden md:block">
            <a
              href="{{ route('tours') }}"
              class="inline-block py-1 mr-6 font-bold text-gray-100 md:py-4">SÉJOURS</a>
            <a
              href="#"
              class="inline-block py-1 mr-6 text-gray-500 md:py-4 hover:text-gray-100">HAJJ / OMRA</a>
            <a
              href="#"
              class="inline-block py-1 text-gray-500 md:py-4 hover:text-gray-100"
              >Contactez-nous</a
            >
          </div>
        </div>
        @guest

        <div class="hidden md:block">
            <a
            href="{{ route('login') }}"
            class="inline-block py-1 mr-6 text-gray-500 md:py-4 hover:text-gray-100"
            >Login</a
            >
            <a
            href="{{ route('register') }}"
            class="inline-block px-4 py-2 text-gray-700 bg-white rounded-lg hover:bg-gray-100"
            >Sign Up</a
            >
        </div>
        @else
        <div class="hidden md:block">
                                <div>
                                    <a class="inline-block px-4 py-2 text-gray-700 bg-white rounded-lg hover:bg-gray-100" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
             </div>

        @endguest
      </div>
    </div>

