<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <a class="" href="{{route('search')}}">
                Minimal Blog
            </a>
        </div>


        <div class="space-x-4 text-gray-300 text-sm sm:text-base">
            @guest
                <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button"><span>{{ Auth::user()->name }}</span><svg class="w-4 h-4 ml-2" aria-hidden="true"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="multiLevelDropdownButton">
                        <li class="{{Route::is('view-admin-post') ? 'bg-blue-400' : ''}}">
                            <a href="{{route('view-admin-post')}}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li class="{{Route::is('create-admin-post') ? 'bg-blue-400' : ''}}">
                            <a href="{{route('create-admin-post')}}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Publish
                                New Post</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="text-gray-700 block px-4 py-2 text-sm"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                    </ul>
                </div>
                <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
            @endguest
        </div>



    </div>

</nav>
