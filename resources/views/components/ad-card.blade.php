@if ($ad)
	<div class="mb-6 text-[27px] font-normal">{{__('index.ad.title')}}</div>
	<div class="rounded-lg bg-white p-[15px]">
		<img class="mb-[18px] rounded-lg h-[200px] object-cover object-center w-full" src="{{ $ad->photo }}" alt=""/>
		<div class="mb-5 space-y-[10px]">
			<div class="text-xs font-bold text-gray-400">{{__('index.ad.title')}}</div>
			<div class="text-2xl font-semibold">{{ $ad->title }}</div>
			<div class="text-sm font-light">{{ $ad->body }}</div>
		</div>
		<a class="bg-appmain flex h-[33px] w-[150px] items-center justify-center rounded-lg text-xs font-extrabold text-white" href="{{ $ad->url }}">{{__('index.ad.link')}}</a>
	</div>
@endif