<a class="mb-10" href="{{ route('user.showPost', $post) }}">
    <div class="relative flex h-[350px] items-end overflow-auto rounded-lg bg-cover bg-center bg-no-repeat p-6" style="background-image: url({{ $post->photo }})">
        <div class="absolute bottom-0 left-0 w-full h-full opacity-50 bg-gradient-to-t from-black to-transparent"></div>
        <div class="z-10 text-2xl font-bold text-white line-clamp-2">{{ $post->title }}</div>
    </div>
</a>
