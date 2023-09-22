<div class="relative grid auto-cols-min grid-flow-col">
	@if(!app('request')->input('region') && !app('request')->input('district') && !app('request')->input('city'))
		<button id="dropdown1" class="whitespace-nowrap text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">
			{{__('index.map.region')}}
			<i class="fas fa-chevron-right text-gray-400 ml-1"></i>
		</button>
	@elseif(app('request')->input('region') && !app('request')->input('district'))
		<button id="dropdown1" class="whitespace-nowrap text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">
			{{__('index.map.district')}}
			<i class="fas fa-chevron-right text-gray-400 ml-1"></i>
		</button>
	@elseif(app('request')->input('region') && app('request')->input('district'))
		<button id="dropdown1" class="whitespace-nowrap text-gray-800 bg-appgray rounded-lg max-w-[200px] block p-2.5">
			{{__('index.map.city')}}
			<i class="fas fa-chevron-right text-gray-400 ml-1"></i>
		</button>
	@endif

	@if(!app('request')->input('region') && !app('request')->input('district') && !app('request')->input('city'))
		<div id="listDropdown1" class="absolute z-10 hidden w-[300px] mt-[50px] origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
			<div class="py-1">
				<form action="{{route('user.index') . '?region=1'}}">
					<input type="hidden" name="region" value="1">
					<button type="submit" class="block px-4 py-2 text-start text-sm text-gray-700 hover:bg-gray-100 w-full">
						Алматы облысы
					</button>
				</form>
			</div>
		</div>
	@elseif(app('request')->input('region') && !app('request')->input('district'))
		<div id="listDropdown1" class="absolute z-10 hidden w-[300px] mt-[50px] origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
			<div class="py-1">
				@foreach($districts as $district)
					<a href="{{route('user.index') . '?region=1&district=' . $district->id}}"
					   class="block px-4 py-2 text-start text-sm text-gray-700 hover:bg-gray-100 w-full">
						{{ $district->district }}
					</a>
				@endforeach
			</div>
		</div>
	@elseif(app('request')->input('region') && app('request')->input('district'))
		<div id="listDropdown1" class="absolute z-10 hidden w-[300px] mt-[50px] origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
			<div class="py-1">
				@foreach($cities as $city)
					<a href="{{route('user.index') . '?region=1&district=' . app('request')->input('district') . '&city=1'}}"
					   class="block px-4 py-2 text-start text-sm text-gray-700 hover:bg-gray-100 w-full">
						{{ $city->city }}
					</a>
				@endforeach
			</div>
		</div>
	@endif

	<script>
        // DropDown Menu
        const dropdown1 = document.querySelector("#dropdown1")
        const listDropdown1 = document.querySelector("#listDropdown1")
        dropdown1.addEventListener("click", () => {
            listDropdown1.classList.toggle("hidden")
        });
	</script>
</div>