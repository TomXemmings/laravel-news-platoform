<div class="mb-6 text-[27px] font-normal">{{__('index.journalist.title')}}</div>
<div class="mb-10 w-full rounded-lg bg-white p-[30px]">
	<div class="flex flex-col gap-4">
		@foreach ($users as $user)
			<a href="{{ route('user.showJournalist', $user) }}" class="flex flex-row justify-between p-3 rounded-lg bg-appgray">
				<div class="flex flex-row">
					<div class="mr-4 bg-gray-200 bg-center bg-cover rounded-lg h-14 w-14" style="background-image: url({{ $user->photo }})"></div>
					<div class="flex flex-col justify-center">
						<div class="mb-1 text-sm font-bold line-clamp-1">{{ $user->name . ' ' . $user->surname }}</div>
						<div class="text-xs font-normal text-gray-400">{{ $user->posts->count() }} {{__('index.journalist.body')}}</div>
					</div>
				</div>
				<div class="text-xs text-blue-500">Журналист</div>
			</a>
		@endforeach
	</div>
</div>
