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
									<span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 line-clamp-1">Цитаты</span>
								</div>
							</li>
						</ol>
					</nav>
					<h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Все цитаты</h1>
				</div>
				<div class="block items-center sm:flex md:divide-x md:divide-gray-100">
					<div class="flex items-center w-full sm:justify-end">
						<a href="javascript:addQuote()" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-600 sm:ml-auto hover:scale-[1.02] transition-all">
							<i class="fas fa-plus mr-2"></i>
							Добавить цитату
						</a>
					</div>
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
									Цитата
								</th>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Автор
								</th>
								<th class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Действие
								</th>
							</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200">
							@foreach($quotes as $quote)
								<tr class="hover:bg-gray-100">
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">#{{$quote->id}}</td>
									<td class="p-4 text-sm font-normal text-gray-500 lg:p-5">
										<div class="text-base font-semibold text-gray-900 w-[300px] line-clamp-1">{{$quote->quote}}</div>
									</td>
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">{{$quote->author}}</td>
									<td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
										<a href="javascript:deleteQuote({{$quote->id}})" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-800 hover:scale-[1.02] transition-all">
											<i class="fas fa-trash mr-2"></i>
											Удалить
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

	<div id="addQuoteWindow" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full bg-gray-100 bg-opacity-75">
		<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-4 w-full max-w-2xl h-full md:h-full">
			<div class="relative bg-white rounded-2xl shadow-lg">
				<div class="flex justify-between items-start p-5 rounded-t border-b">
					<h3 class="text-xl font-semibold">Добавить цитату</h3>
					<a href="javascript:addQuote()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full w-6 h-6 inline-flex items-center justify-center">
						<i class="far fa-times text-[15px]"></i>
					</a>
				</div>
				<form action="{{route('admin.quote.store')}}" method="POST">
					@csrf
					<div class="p-6 space-y-6">
						<div class="grid gap-5">
							<div>
								<label for="product-name" class="block mb-2 text-sm font-medium text-gray-900">Цитата</label>
								<input type="text" name="quote" id="post-confirm-title" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Загаловок" required>
							</div>
							<div>
								<label for="product-details" class="block mb-2 text-sm font-medium text-gray-900">Автор</label>
								<input type="text" name="author" id="post-confirm-title" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Загаловок" required>
							</div>
						</div>
					</div>
					<div class="p-6 rounded-b border-t border-gray-200">
						<button type="submit" class="text-white font-medium text-sm px-5 py-2.5 text-center rounded-lg bg-blue-500 hover:scale-[1.02] transition-all">Добавить цитату</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="deleteQuoteWindow" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full bg-gray-100 bg-opacity-75">
		<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-4 w-full max-w-md h-full md:h-auto">
			<div class="relative bg-white rounded-2xl shadow-lg">
				<div class="p-6 pt-0 text-center">
					<i class="far fa-exclamation-circle text-[70px] text-red-500 mt-6"></i>
					<h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Вы уверены, что хотите удалить эту цытату?</h3>
					<form id="deleteQuoteForm" action="" method="post" class="inline-flex">
						@csrf
						@method('delete')
						<button type="submit" class="text-white bg-red-500 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 hover:scale-[1.02] transition-all">
							Да
						</button>
					</form>
					<a href="javascript:deleteQuote(0)" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center hover:scale-[1.02] transition-transform">
						Нет
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
