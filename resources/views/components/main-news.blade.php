<div class="text-[27px] mb-5 hidden lg:block">{{__('index.main.news')}}</div>
<div class="grid grid-cols-2 gap-4 lg:grid-cols-4 lg:gap-[30px] lg:grid-rows-6 auto-rows-max">
    <!-- 1 -->
    <div class="relative h-40 col-span-2 p-4 overflow-auto bg-center bg-no-repeat bg-cover rounded-lg lg:row-span-4 lg:h-auto lg:p-6" style="background-image: url({{ $posts->get(0)->photo }})">
        <a href="{{ route('user.showPost', $posts->get(0)) }}" class="flex items-end w-full h-full">
            <div class="absolute bottom-0 left-0 w-full h-full opacity-50 bg-gradient-to-t from-black to-transparent"></div>
            <div class="line-clamp-1 z-10 text-[14px] font-bold text-white md:text-[27px]">{{ $posts->get(0)->title }}</div>
        </a>
    </div>
    <!-- 2 -->
    <div class="relative flex flex-col order-last h-auto grid-flow-row col-span-2 row-span-2 gap-1 p-4 bg-white rounded-lg auto-rows-max lg:order-none lg:gap-2 lg:p-6">
        <img class="w-[65px] md:w-auto absolute top-0 right-0" src="{{ asset('assets/img/right_add.png') }}" alt="" />
        <div class="block text-[12px] font-normal text-gray-400 lg:text-[15px]">{{ __('index.main.quote') }}</div>
        @if ($quote)
            <div class="block text-[15px] font-bold text-black lg:text-[24px] line-clamp-2">{{ $quote->quote }}</div>
            <div class="block text-[12px] font-normal text-gray-400 lg:text-[18px]">- {{ $quote->author }}</div>
        @endif
    </div>
    <!-- 3 -->
    <div class="relative col-span-1 p-4 overflow-auto bg-center bg-no-repeat bg-cover rounded-lg h-52 lg:row-span-4 lg:h-auto lg:p-6" style="background-image: url({{ $posts->get(1)->photo }})">
        <a href="{{ route('user.showPost', $posts->get(1)) }}" class="flex flex-col items-start justify-end w-full h-full">
            <div class="absolute bottom-0 left-0 w-full h-full opacity-50 bg-gradient-to-t from-black to-transparent"></div>
            <div class="line-clamp-2 z-10 text-[14px] font-bold text-white md:text-[24px]">{{ $posts->get(1)->title }}</div>
        </a>
    </div>
    <!-- 4 -->
    <div class="relative flex items-end col-span-1 p-4 bg-white rounded-lg h-52 lg:row-span-4 lg:h-auto lg:p-6">
        <a href="{{ route('user.createPost') }}" class="flex items-end w-full h-full">
            <img class="w-[65px] md:w-auto absolute top-0 left-0" src="{{ asset('assets/img/left_add.png') }}" alt="" />
            <img class="w-[65px] md:w-auto absolute top-0 right-0" src="{{ asset('assets/img/right_add.png') }}" alt="" />
            <div class="bg-appmain absolute top-1/2 left-1/2 flex h-[70px] w-[70px] -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full lg:h-[120px] lg:w-[120px]">
                <i class="far fa-plus text-[50px] text-white"></i>
            </div>
            <div class="line-clamp-2 z-10 text-[14px] text-center font-bold text-black md:text-[24px]">{{ __('index.main.add') }}</div>
        </a>
    </div>
    <!-- 5 -->
    <div class="relative col-span-1 row-span-2 hidden h-auto overflow-auto rounded-lg bg-cover bg-center bg-no-repeat p-[15px] lg:flex" style="background-image: url({{ $posts->get(2)->photo }})">
        <a href="{{ route('user.showPost', $posts->get(2)) }}" class="flex flex-col justify-between">
            <div class="absolute bottom-0 left-0 w-full h-full opacity-50 bg-gradient-to-t from-black to-transparent"></div>
            <div class="z-10 flex h-[27px] w-[120px] items-center justify-center rounded-lg bg-white px-[15px] py-[3px] text-xs font-bold text-black">{{ $posts->get(2)->category->name }}</div>
            <div class="z-10 text-lg font-bold text-white line-clamp-2">{{ $posts->get(2)->title }}</div>
        </a>
    </div>
    <!-- 6 -->
    <div class="relative col-span-1 row-span-2 hidden h-auto overflow-auto rounded-lg bg-cover bg-center bg-no-repeat p-[15px] lg:flex" style="background-image: url({{ $posts->get(3)->photo }})">
        <a href="{{ route('user.showPost', $posts->get(3)) }}" class="flex flex-col justify-between">
            <div class="absolute bottom-0 left-0 w-full h-full opacity-50 bg-gradient-to-t from-black to-transparent"></div>
            <div class="flex z-10 h-[27px] w-[120px] items-center justify-center rounded-lg bg-white px-[15px] py-[3px] text-xs font-bold text-black">{{ $posts->get(3)->category->name }}</div>
            <div class="z-10 text-lg font-bold text-white line-clamp-2">{{ $posts->get(3)->title }}</div>
        </a>
    </div>
</div>
