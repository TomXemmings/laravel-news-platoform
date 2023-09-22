@extends('user.layouts.app')

@section('content')
	<div>
		<form action="{{ route('user.storePost') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="flex items-center justify-between mb-5 md:items-end">
				<div class="text-lg font-semibold">Фотография*</div>
				<button type="submit" class="flex w-[170px] h-10 items-center justify-center rounded-lg bg-white text-[14px] font-semibold text-appmain">Продолжить</button>
			</div>
			<label class="flex flex-col items-center justify-between mb-10 h-[240px] p-[15px] w-full rounded-lg bg-gray-200 md:w-[420px] cursor-pointer">
				<div></div>
				<div></div>
				<div class="bg-appmain h-[50px] w-[50px] flex items-center justify-center rounded-full">
					<i class="far fa-plus text-[20px] text-white"></i>
				</div>
				<div class="w-full">
					<div class="inline-flex items-start justify-center bg-white rounded-md">
						<div class="inline-flex p-3 text-sm font-semibold text-appmain whitespace-nowrap">
							<i class="mr-2 text-base far fa-download"></i>
							Загрузить фотографию
						</div>
					</div>
				</div>
				<input accept="image/*" name="photo" type="file" class="hidden"/>
			</label>
			<div class="mb-4 text-lg font-semibold">Заголовок*</div>
			<input name="title" type="text" placeholder="Напишите заголовок статьи" class="mb-10 w-full rounded-lg bg-gray-200 p-[15px]"/>
			<div class="mb-4 text-lg font-semibold">Описание*</div>
			<textarea name="body" id="" cols="30" rows="10" placeholder="Напишите описание статьи" class="mb-10 w-full rounded-lg bg-gray-200 p-[15px]"></textarea>
			<div class="mb-4 text-lg font-semibold">Область*</div>
			<select name="regions" class="bg-gray-200 border text-sm rounded-lg w-full p-3 py-4 mb-2">
				@foreach($regions as $region)
					<option value="{{$region->id}}">{{$region->region}}</option>
				@endforeach
			</select>
			<select name="districts" class="bg-gray-200 border text-sm rounded-lg w-full p-3 py-4 mb-2">
				@foreach($districts as $district)
					<option value="{{$district->id}}">{{$district->district}}</option>
				@endforeach
			</select>
			<select name="cities" class="bg-gray-200 border text-sm rounded-lg w-full p-3 py-4">
				@foreach($cities as $city)
					<option value="{{$city->id}}">{{$city->city}}</option>
				@endforeach
			</select>
		</form>
	</div>
@endsection
