<header class="rounded-b-[5px] bg-white shadow md:rounded-none md:shadow-none">
    <div class="mx-auto max-w-screen-2xl px-5 pt-[5px] pb-[10px]">
        <div class="flex items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <a class="inline-block" href="{{ route('user.index') }}">
                    <img class="h-7 sm:h-[39px]" src="{{ asset('assets/img/logo.svg') }}" alt="Alemtime" />
                </a>
            </div>
            <div class="gap-10 md:flex md:items-center md:gap-12">
                <nav class="hidden lg:block" aria-labelledby="header-navigation">
                    <ul class="flex items-center gap-6 space-x-4">
                        <li>
                            <a href="{{ route('user.index') }}" class="font-body text-[15px] {{ request()->routeIs('user.index') ? 'font-bold text-black' : 'font-normal text-gray-500' }}">{{ __('header.index') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile') }}" class="font-body text-[15px] {{ request()->routeIs('user.profile') ? 'font-bold text-black' : 'font-normal text-gray-500' }}">{{ __('header.profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('user.map') }}" class="text-[15px] {{ request()->routeIs('user.map') ? 'font-bold text-black' : 'font-normal text-gray-500' }}">{{ __('header.map') }}</a>
                        </li>
                    </ul>
                </nav>
                {{-- LANG --}}
                <div class="hidden md:block">
                    <button id="dropdownLang" class="text-gray-800 text-sm bg-appgray rounded-lg block p-2.5">
                        @if (explode('.', parse_url(request()->url(), PHP_URL_HOST))[0] == 'ru')
                            RU
                        @else
                            KZ
                        @endif
                    </button>
                    <div id="listDropdownLang" class="absolute z-10 hidden origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ 'http://alemtime.kz/' . request()->path() }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">KZ</a>
                            <a href="{{ 'http://ru.alemtime.kz/' . request()->path() }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">RU</a>
                        </div>
                    </div>
                </div>
                <div class="relative inline-block text-left">
                    {{-- MOBILE --}}
                    <div class="block lg:hidden">
                        <button id="dropdownMobile" class="inline-flex w-full justify-center rounded-md bg-appmain lg:bg-gray-200 px-[15px] py-[10px] text-sm font-medium text-gray-700">
                            <div>
                                <i class="text-base text-white far fa-bars"></i>
                            </div>
                        </button>
                    </div>
                    {{-- DESKTOP --}}
                    <div class="hidden lg:block">
                        @if (Auth::check())
                            <button id="dropdown" class="inline-flex w-full justify-center rounded-md bg-appmain lg:bg-gray-200 md:px-[20px] px-[15px] py-[10px] text-sm font-medium text-gray-700">
                                <div class="hidden truncate text-[15px] font-semibold text-gray-600 lg:block">
                                    {{ auth()->user()->name }}
                                </div>
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex w-full justify-center rounded-md px-[20px] py-[10px] bg-appmain text-sm font-medium text-white">
                                <div class="font-semibold text-white">{{ __('header.login') }}</div>
                            </a>
                        @endif
                    </div>
                    <div id="listDropdown" class="absolute right-0 z-10 hidden w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ route('user.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('header.index') }}</a>
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('header.profile') }}</a>
                            <a href="{{ route('user.map') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('header.map') }}</a>
                            @if (Auth::check())
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('header.logout') }}</a>
                                <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ __('header.login') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-[18px] hidden w-full border-black md:block" />
        <div class="hidden md:block">
            <form action="{{ route('user.search') }}" method="get">
                <div class="flex space-x-10">
                    <label class="relative w-full min-w-[200px]">
                        <i class="absolute top-1/2 left-6 h-[17px] w-[17px] -translate-y-1/2 fas fa-search"></i>
                        <input name="search" placeholder="{{ __('header.search') }}" value="{{ app('request')->input('search') }}" class="h-10 w-full rounded-lg border-none bg-gray-100 pl-[60px] focus:outline-none" type="text" />
                    </label>
                    <div class="relative flex items-center w-full gap-4 overflow-auto">
                        @foreach ($categories as $category)
                            <a href="{{ route('user.category') }}?category={{ $category->name }}" class="whitespace-nowrap">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>

<script>
    // DropDown Menu
    const dropdownLang = document.querySelector("#dropdownLang")
    const listDropdownLang = document.querySelector("#listDropdownLang")
    dropdownLang.addEventListener("click", () => {
        listDropdownLang.classList.toggle("hidden")
    });
</script>
