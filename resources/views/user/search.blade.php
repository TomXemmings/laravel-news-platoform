@extends('user.layouts.app')

@section('content')
    <section>
        <div class="mb-7 text-[20px] font-normal md:text-[27px]">Все посты</div>
        <div class="grid grid-cols-3 divide-x divide-black">
            <div class="grid grid-cols-1 col-span-3 gap-4 md:grid-cols-2 lg:col-span-2 lg:pr-10 auto-rows-max">
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
            <div class="hidden grid-cols-1 col-span-1 pl-10 lg:grid auto-rows-max">
                <x-top-card />
                <x-add-post />
                <x-top-journalist />
                <x-top-quote />
            </div>
        </div>
    </section>
@endsection
