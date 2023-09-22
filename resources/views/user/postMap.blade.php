@extends('user.layouts.app')

@section('content')
	<div class="divide-y-0 lg:divide-black lg:divide-y">
		<section class="mb-5 lg:pb-8 lg:mb-0">
			<x-main-news/>
		</section>
		<section class="lg:py-8">
			<div class="rounded-xl lg:bg-white lg:p-[30px]">
				<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-14">
					<!-- search mobile -->
					<div class="block mb-6 lg:hidden">
						<input type="text" class="w-full rounded-md bg-white p-2.5 focus:border-blue-500"/>
					</div>
					<!-- MAP -->
					<div>
						<div class="grid auto-cols-min grid-flow-col">
							<a href="{{ route('user.back.map') }}" class="bg-appgray rounded-lg min-w-[100px] grid place-content-center text-black opacity-75">Артка</a>
							<a href="{{ route('user.map.post') }}" class="bg-appgray rounded-lg min-w-[100px] grid place-content-center text-black opacity-75">Артка</a>
{{--							<select name="region" class="text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">--}}
{{--								<option value="0" selected>Выберите область</option>--}}
{{--								<option value="1">1</option>--}}
{{--							</select>--}}
{{--							<select name="region" class="text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">--}}
{{--								<option value="0" selected>Выберите область</option>--}}
{{--								<option value="1">1</option>--}}
{{--							</select>--}}
{{--							<select name="region" class="text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">--}}
{{--								<option value="0" selected>Выберите область</option>--}}
{{--								<option value="1">1</option>--}}
{{--							</select>--}}
						</div>
						<div id="map" class="mt-5"></div>
						<script src="{{ asset('assets/js/mapdata.js') }}"></script>
						<script src="{{ asset('assets/js/countrymap.js') }}"></script>
						<script></script>
					</div>
					<!-- END MAP -->
					<div class="flex flex-col gap-5">
						<x-map-category/>
						<x-horizontal-post-card/>
					</div>
				</div>
			</div>
		</section>
		<section class="hidden pt-8 lg:block">
			<div class="grid grid-cols-3 divide-x divide-black">
				<div class="grid grid-flow-row grid-cols-1 col-span-3 gap-4 auto-rows-max md:grid-cols-2 lg:col-span-2 lg:pr-10">
					<div class="mb-[18px] h-fit text-[27px] font-normal col-span-2">Өзекті жаңалықтар</div>
					@foreach ($posts as $post)
						<x-post-card :post="$post"/>
					@endforeach
				</div>
				<div class="hidden grid-cols-1 col-span-1 pl-10 lg:grid auto-rows-max">
					<x-top-journalist/>
					<x-top-quote/>
					<x-ad-card/>
				</div>
			</div>
		</section>
	</div>
@endsection
