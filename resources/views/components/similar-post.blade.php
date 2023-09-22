<div class="overflow-y-auto lg:h-[400px] scrollbar-hide">
    <div class="grid grid-cols-1 gap-10">
        @foreach ($posts as $post)
            <div class="grid w-full grid-cols-5 gap-4">
                <img class="col-span-2 h-[150px] w-full object-cover object-center rounded-lg" src="{{ $post->photo }}" alt="" />
                <div class="flex flex-col justify-between col-span-3 gap-3 md:gap-4">
                    <div class="flex flex-col gap-1">
                        <div class="flex justify-between mb-1">
                            <div class="flex h-[24px] w-28 items-center justify-center rounded-md text-xs font-semibold text-white" style="background-color: {{ $post->category->color }}">{{ $post->category->name }}</div>
                            @auth
                                @if ($post->liked())
                                    <a id="unlikeHref_{{ $post->id }}" href="javascript:unlike({{ $post->id }})" class="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-lg">
                                        <i id="unlike_{{ $post->id }}" class="fas fa-heart text-appmain"></i>
                                    </a>
                                @else
                                    <a id="likeHref_{{ $post->id }}" href="javascript:like({{ $post->id }})" class="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-lg">
                                        <i id="like_{{ $post->id }}" class="far fa-heart text-appmain"></i>
                                    </a>
                                @endif
                            @endauth
                        </div>
                        <div class="mb-1 text-[15px] font-bold line-clamp-1 md:line-clamp-2">{{ $post->title }}</div>
                        <div class="flex items-center">
                            <div class="text-[12px] text-gray-400 md:text-[16px]"><i class="far fa-clock"></i> {{ $post->created_at->isoFormat('LL') }}</div>
                            <div class="mx-2 h-[6px] w-[6px] rounded-full bg-gray-400"></div>
                            <div class="text-[12px] text-gray-400 md:text-[16px]"><i class="far fa-eye"></i> {{ $post->views }}</div>
                        </div>
                    </div>
                    <a href="{{ route('user.showPost', $post) }}" class="flex items-center justify-between text-[15px] font-extrabold text-appmain md:text-[18px]">
                        <div>{{__('index.actual.news.link')}}</div>
                        <i class="far fa-angle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
