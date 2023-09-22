@extends('user.layouts.app')

@section('content')
    <x-account-data :dataProfile="$dataProfile" />
    <div class="grid grid-cols-3 divide-x divide-black">
        <div class="grid grid-cols-1 col-span-3 gap-4 md:grid-cols-2 lg:col-span-2 lg:pr-10 auto-rows-max">
            @foreach ($myPosts as $myPost)
                <x-post-card :post="$myPost" />
            @endforeach
            <div class="col-span-1 md:col-span-2 md: mt-7 mb-4 text-[20px] font-normal md:text-[27px]">Понравилось</div>
            @foreach ($likePosts as $likePost)
                <x-post-card :post="$likePost" />
            @endforeach
        </div>
        <div class="hidden grid-cols-1 col-span-1 pl-10 lg:grid auto-rows-max">
            <x-top-card />
            <x-add-post />
            <x-top-journalist />
            <x-top-quote />
        </div>
    </div>
@endsection
