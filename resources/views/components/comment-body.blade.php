<div class="my-[30px]">
    <form action="{{ route('user.storeComment', $post) }}" method="POST">
        @csrf
        <div class="font-body mb-[15px] text-xl font-normal">Пікірлер</div>
        <textarea name="body" rows="3" placeholder="Пікір жазыңыз" class="font-body mb-[10px] w-full rounded-lg bg-white p-[15px] focus:outline-none"></textarea>
        <button type="submit" class="bg-appmain font-body h-10 w-full rounded-lg text-[15px] font-semibold text-white md:w-[250px]">Жіберу</button>
    </form>
</div>
<div class="flex flex-col gap-4">
    @foreach ($post->comments as $comment)
        <div class="rounded-lg bg-white p-[15px]">
            <div class="flex flex-col items-start rounded-lg p-[12px]">
                <div class="mb-[10px] flex flex-row">
                    <div class="mr-[15px] h-[52px] w-[52px] rounded-lg bg-gray-200 bg-cover bg-center" style="background-image: url({{ $comment->user->photo }})"></div>
                    <div class="flex flex-col justify-center">
                        <div class="line-clamp-1 font-body mb-[5px] text-base font-bold">{{ $comment->user->name . ' ' . $comment->user->surname }}</div>
                        <div class="text-xs font-normal text-gray-400 font-body">{{ $comment->created_at->isoFormat('LLL') }}</div>
                    </div>
                </div>
                <div class="text-base font-normal text-gray-600 font-body">{{ $comment->body }}</div>
                <div class="mt-[15px] flex gap-[15px] mb-3">
                    <form action="#" class="flex gap-3">
                        <button>
                            <i class="fal fa-thumbs-up text-appmain"></i>
                        </button>
                        <div class="font-semibold">{{ $comment->like }}</div>
                    </form>
                    <form action="#" class="flex gap-3">
                        <button class="rotate-180">
                            <i class="far fa-thumbs-up text-appmain"></i>
                        </button>
                        <div class="font-semibold">{{ $comment->dislike }}</div>
                    </form>
                    <a href="javascript:commentReply()" class="text-xs font-semibold underline text-appmain">Жауап беру</a>
                </div>
                <button class="flex items-center gap-3 text-xs font-semibold text-appmain">
                    {{ $comment->replies->count() }} ответа <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <form action="{{ route('user.storeReplyComment', [$post, $comment]) }}" method="POST">
                @csrf
                <input name="bodyReply" placeholder="Напишите комментарий" class="font-body mb-[10px] w-full rounded-lg bg-appgray p-[10px] focus:outline-none" />
                <button type="submit" class="bg-appmain font-body h-10 w-full rounded-lg text-[15px] font-semibold text-white md:w-[250px]">Отправить</button>
            </form>
            @foreach ($comment->replies as $reply)
                <hr class="mt-4" />
                <div class="p-3 pl-10">
                    <div class="mb-[10px] flex flex-row">
                        <div class="mr-[15px] h-[52px] w-[52px] rounded-lg bg-gray-200 bg-cover bg-center bg-gray-200 text-[28px]" style="background-image: url({{ $reply->user->photo }})"></div>
                        <div class="flex flex-col justify-center">
                            <div class="line-clamp-1 font-body mb-[5px] text-base font-bold">{{ $reply->user->name . ' ' . $reply->user->surname }}</div>
                            <div class="text-xs font-normal text-gray-400 font-body">{{ $reply->created_at->isoFormat('LLL') }}</div>
                        </div>
                    </div>
                    <div class="text-base font-normal text-gray-600 font-body">{{ $reply->body }}</div>
                    <div class="mt-[15px] flex gap-[15px]">
                        <form action="#" class="flex gap-3">
                            <button>
                                <i class="fal fa-thumbs-up text-appmain"></i>
                            </button>
                            <div class="font-semibold">{{ $reply->like }}</div>
                        </form>
                        <form action="#" class="flex gap-3">
                            <button class="rotate-180">
                                <i class="far fa-thumbs-up text-appmain"></i>
                            </button>
                            <div class="font-semibold">{{ $reply->dislike }}</div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
