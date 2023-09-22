@extends('user.layouts.app')

@section('content')
	<div>
		<div class="relative font-body flex h-[210px] flex-col justify-end rounded-lg bg-gray-300 bg-cover bg-center bg-no-repeat p-[15px] md:h-[525px]" style="background-image: url({{ $post->photo }})">
			<div class="bg-black bg-opacity-50 rounded-lg z-10 w-full h-full absolute bottom-0 left-0"></div>
			<div class="hidden text-[27px] font-extrabold text-white lg:block z-50">{{ $post->title }}</div>
			<div class="flex items-center z-50">
				<div class="text-[12px] font-semibold text-white md:text-[18px]"><i class="far fa-clock"></i> {{ $post->created_at->isoFormat('LL') }}</div>
				<div class="mx-2 h-[6px] w-[6px] rounded-full bg-white"></div>
				<div class="text-[12px] font-semibold text-white md:text-[18px]"><i class="far fa-eye"></i> {{ $post->views }}</div>
			</div>
		</div>
		<div class="grid grid-cols-3 lg:mt-[37px]">
			<div class="mt-[15px] lg:mt-[0px] flex md:mt-[37px] col-span-3 lg:col-span-2">
				<div class="hidden flex-col gap-[10px] text-white lg:flex pr-[37px]">
					<a class="flex h-[67px] w-[67px] items-center justify-center rounded-full bg-white text-base text-red-500" href="#" target="_blank" rel="noreferrer">
						<i class="text-2xl text-green-700 fab fa-whatsapp"></i>
					</a>
					<a class="flex h-[67px] w-[67px] items-center justify-center rounded-full bg-white text-base text-blue-500" href="#" target="_blank" rel="noreferrer">
						<i class="fab fa-facebook-f text-2xl"></i>
					</a>
					<a class="flex h-[67px] w-[67px] items-center justify-center rounded-full bg-white text-base text-purple-800" href="#" target="_blank" rel="noreferrer">
						<i class="fab fa-instagram text-2xl"></i>
					</a>
					<a class="flex h-[67px] w-[67px] items-center justify-center rounded-full bg-white text-base text-blue-500" href="#" target="_blank" rel="noreferrer">
						<i class="fab fa-telegram-plane text-2xl"></i>
					</a>
				</div>
				<div class="w-full">
					<div class="block mb-4 text-[20px] font-extrabold text-black lg:hidden">{{ $post->title }}</div>
					<p>{{ $post->body }}</p>
					<hr class="my-[10px] border-gray-300"/>
					<div>
						<div class="font-body mb-[10px] text-base font-normal opacity-70">Санат</div>
						<div class="bg-appmain font-body inline-block rounded-lg px-[30px] py-[7px] text-sm font-semibold text-white">{{ $post->category->name }}</div>
					</div>
					<hr class="my-[10px] border-gray-300"/>
					<div>
						<div class="font-body mb-[10px] text-base font-normal opacity-70">Орналасқан жері</div>
						<div class="bg-appmain font-body inline-block rounded-lg px-[15px] py-[7px] text-sm font-semibold text-white"><i class="fa-solid fa-location-dot"></i> {{ \App\Models\City::where('id', $post->city_id)->first()->city }}</div>
					</div>
					<hr class="my-[10px] border-gray-300"/>
					<div class="lg:hidden">
						<div class="font-body mb-[10px] text-base font-normal opacity-70">Бөлісу</div>
						<div class="flex gap-[10px] text-white lg:flex pr-[37px]">
							<a class="flex h-[40px] w-[40px] items-center justify-center rounded-full bg-white text-base text-green-700" href="whatsapp://send?text={{route('user.showPost', $post->id)}}" target="_blank" rel="noreferrer">
								<i class="fab fa-whatsapp text-xl"></i>
							</a>
							<a class="flex h-[40px] w-[40px] items-center justify-center rounded-full bg-white text-base text-blue-500" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" target="_blank" rel="noreferrer">
								<i class="fab fa-facebook-f text-xl"></i>
							</a>
							<a class="flex h-[40px] w-[40px] items-center justify-center rounded-full bg-white text-base text-purple-800" href="https://www.instagram.com/?url={{route('user.showPost', $post->id)}}" target="_blank" rel="noreferrer">
								<i class="fab fa-instagram text-xl"></i>
							</a>
							<a class="flex h-[40px] w-[40px] items-center justify-center rounded-full bg-white text-base text-blue-500" href="https://t.me/share/url?url={{route('user.showPost', $post->id)}}" target="_blank" rel="noreferrer">
								<i class="fab fa-telegram-plane text-xl"></i>
							</a>
						</div>
					</div>
					<hr class="lg:hidden my-[10px] border-gray-300"/>
					<div>
						<div class="font-body mb-[15px] text-xl font-normal">Автор</div>
						<div class="flex flex-row">
							<div class="mr-4 bg-gray-200 bg-center bg-cover rounded-lg h-14 w-14" style="background-image: url({{ $post->user->photo }})"></div>
							<div class="flex flex-col justify-center">
								<div class="mb-1 text-sm font-bold line-clamp-1">{{ $post->user->name . ' ' . $post->user->surname }}</div>
								<div class="text-xs font-normal text-gray-400">{{ $post->user->created_at->isoFormat('L') }}</div>
							</div>
						</div>
					</div>
					<x-comment-body :post="$post"/>
				</div>
			</div>
			<div class="hidden lg:block ml-[37px]">
				<x-email-send/>
				<x-top-quote/>
			</div>
		</div>
	</div>
@endsection
