<div class="mb-[25px] flex flex-wrap gap-4 rounded-lg border-none bg-white p-[15px] md:gap-7 md:p-[25px] lg:mb-10">
    <div class="flex items-center rounded-lg bg-appgray py-[15px] px-[18px]">
        <div class="flex items-center justify-center w-10 h-10 bg-gray-200 bg-center bg-cover rounded" style="background-image: url({{ $dataProfile->photo }})"></div>
        <div class="flex-col ml-4">
            <div class="text-[10px] text-gray-500">{{__('profile.name')}}</div>
            <div class="text-[15px] md:text-[21px]">{{ $dataProfile->fullName }}</div>
        </div>
    </div>
    <div class="flex rounded-lg bg-appgray py-[15px] px-[18px]">
        <div class="flex-col">
            <div class="text-[10px] text-gray-500">{{__('profile.news')}}</div>
            <div class="text-[15px] md:text-[21px]">{{ $dataProfile->countPosts }}</div>
        </div>
    </div>
    <div class="flex rounded-lg bg-appgray py-[15px] px-[18px]">
        <div class="flex-col">
            <div class="text-[10px] text-gray-500">{{__('profile.views')}}</div>
            <div class="text-[15px] md:text-[21px]">{{ $dataProfile->allViews }}</div>
        </div>
    </div>
    <div class="flex rounded-lg bg-appgray py-[15px] px-[18px]">
        <div class="flex-col">
            <div class="text-[10px] text-gray-500">{{__('profile.comments')}}</div>
            <div class="text-[15px] md:text-[21px]">{{ $dataProfile->sumComment }}</div>
        </div>
    </div>
    <div class="flex rounded-lg bg-appgray py-[15px] px-[18px]">
        <div class="flex-col">
            <div class="text-[10px] text-gray-500">{{__('profile.register')}}</div>
            <div class="text-[15px] md:text-[21px]">{{ $dataProfile->dateAccount }}</div>
        </div>
    </div>
</div>
