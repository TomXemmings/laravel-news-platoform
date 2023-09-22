@extends('admin.layouts.app')

@section('content')
	<main>
		<div class="block justify-between items-center p-4 mx-4 mt-4 mb-6 bg-white rounded-2xl shadow-xl shadow-gray-200 lg:p-5 sm:flex">
			<div class="mb-1 w-full">
				<div class="mb-4">
					<nav class="flex mb-5">
						<ol class="inline-flex items-center space-x-1 md:space-x-2">
							<li class="inline-flex items-center">
								<a href="{{route('admin.index')}}" class="inline-flex items-center text-gray-700 hover:text-gray-900">
									<i class="fad fa-house mr-4"></i>
									Главный
								</a>
							</li>
							<li>
								<div class="flex items-center">
									<i class="fas fa-angle-right text-gray-400 mx-2"></i>
									<span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 line-clamp-1">Удаленный посты</span>
								</div>
							</li>
						</ol>
					</nav>
					<h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Все удаленный посты</h1>
				</div>
			</div>
		</div>

		<div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
			<div class="overflow-x-auto rounded-2xl">
				<div class="inline-block min-w-full align-middle">
					<div class="overflow-hidden">
						<table class="min-w-full divide-y divide-gray-200 table-fixed">
							<thead class="bg-white">
							<tr>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									№
								</th>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Заголовок
								</th>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Дата
								</th>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Действие
								</th>
							</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200">
							@foreach($posts as $post)
								<tr class="hover:bg-gray-100">
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">#{{$post->id}}</td>
									<td class="p-4 text-sm font-normal text-gray-500 lg:p-5">
										<div class="text-base font-semibold text-gray-900 w-[300px] line-clamp-1">{{$post->title}}</div>
									</td>
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">{{$post->created_at->isoFormat('LL')}}</td>
									<td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
										<a href="javascript:deletedPost({{$post->id}})" class="getPost inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
											<i class="far fa-edit mr-2"></i>
											Восстановить
										</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>

	<div id="deletedPostWindow" class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto bg-gray-100 bg-opacity-75 top-4 md:inset-0 h-modal sm:h-full">
		<div class="absolute w-full h-full max-w-md px-4 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 md:h-auto">
			<div class="relative bg-white shadow-lg rounded-2xl">
				<div class="p-6 pt-0 text-center">
					<i class="far fa-edit text-[70px] text-blue-500 mt-6"></i>
					<h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Вы уверены, что хотите восстановить этот пост?</h3>
					<form id="deletedPostForm" action="" method="post" class="inline-flex">
						@csrf
						<button type="submit" class="text-white bg-blue-500 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 hover:scale-[1.02] transition-all">
							Да
						</button>
					</form>
					<a href="javascript:deletedPost(0)" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center hover:scale-[1.02] transition-transform">
						Нет
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
