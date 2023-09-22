@extends('admin.layouts.app')

@section('content')
	<main>
		<div class="items-center justify-between block p-4 mx-4 mt-4 mb-6 bg-white shadow-xl rounded-2xl shadow-gray-200 lg:p-5 sm:flex">
			<div class="w-full mb-1">
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
									<span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 line-clamp-1">Пользователи</span>
								</div>
							</li>
						</ol>
					</nav>
					<h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Все пользователи</h1>
				</div>
				<div class="block items-center sm:flex md:divide-x md:divide-gray-100">
					<div class="flex items-center w-full sm:justify-end">
						<a href="javascript:addUser()" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-blue-500 hover:bg-blue-600 sm:ml-auto hover:scale-[1.02] transition-all">
							<i class="fas fa-plus mr-2"></i>
							Добавить пользователя
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-col mx-4 my-6 shadow-xl rounded-2xl shadow-gray-200">
			<div class="overflow-x-auto rounded-2xl">
				<div class="inline-block min-w-full align-middle">
					<div class="overflow-hidden shadow-lg">
						<table class="min-w-full divide-y divide-gray-200 table-fixed">
							<thead class="bg-white">
							<tr>
								<th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									№
								</th>
								<th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Пользователь
								</th>
								<th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Дата создания
								</th>
								<th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
									Статус
								</th>
								<th scope="col" class="p-4 lg:p-5 ">
								</th>
							</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200">
							@foreach($users as $user)
								<tr class="hover:bg-gray-100">
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">#{{ $user->id }}</td>
									<td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
										@if ($user->photo)
											<img class="w-10 h-10 rounded" alt="img" src="{{ $user->photo }}">
										@else
											<div class="relative w-10 h-10 grid place-items-center overflow-hidden bg-gray-100 rounded content-center">
												<i class="fas fa-user text-[20px] text-gray-500"></i>
											</div>
										@endif
										<div class="text-sm font-normal text-gray-500">
											<div class="text-base font-semibold text-gray-900">{{ $user->name . ' ' . $user->surname }}</div>
											<div class="text-sm font-normal text-gray-500">{{ $user->number }}</div>
										</div>
									</td>
									<td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">{{ $user->created_at->isoFormat('LL') }}</td>
									<td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
										<div class="flex items-center">
											<div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
											Активный
										</div>
									</td>
									<td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
										<a href="javascript:deleteUser({{$user->id}})" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-800 hover:scale-[1.02] transition-all">
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

	<div id="addUserWindow" class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full bg-gray-100 bg-opacity-75">
		<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full max-w-2xl px-4 md:h-full">
			<div class="relative bg-white shadow-lg rounded-2xl">
				<div class="flex items-start justify-between p-5 border-b rounded-t">
					<h3 class="text-xl font-semibold">
						Добавить нового пользователя
					</h3>
					<a href="javascript:addUser()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full w-6 h-6 inline-flex items-center justify-center">
						<i class="far fa-times text-[15px]"></i>
					</a>
				</div>
				<form action="{{ route('admin.users.store') }}" method="post">
					@csrf
					<div class="p-6 space-y-6">
						<div class="grid gap-5">
							<div class="col-span-6 sm:col-span-3">
								<label for="first-name" class="block mb-2 text-sm font-medium text-gray-900">Имя</label>
								<input type="text" name="name" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Введите имя" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Фамилия</label>
								<input type="text" name="surname" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Введите фамилию" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="email" class="block mb-2 text-sm font-medium text-gray-900">Отчество</label>
								<input type="text" name="lastname" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Введите отчество" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900">Номер телефона</label>
								<input id="phone" type="text" name="number" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="+7(___)___-__-__" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label for="company" class="block mb-2 text-sm font-medium text-gray-900">Пароль</label>
								<input type="password" name="password" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5" placeholder="Введите пароль" required="">
							</div>
							<div class="col-span-6 sm:col-span-3">
								<label class="block mb-2 text-sm font-medium text-gray-900">Выбрать роль</label>
								<select name="role_id" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
									<option value="1">Администратор</option>
									<option value="2">Редактор</option>
									<option value="3">Модератор</option>
									<option value="4">Менеджер</option>
								</select>
							</div>
						</div>
					</div>
					<div class="p-6 rounded-b border-t border-gray-200">
						<button type="submit" class="text-white font-medium text-sm px-5 py-2.5 text-center rounded-lg bg-blue-500 hover:scale-[1.02] transition-all">Добавить пользователя</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="deleteUserWindow" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full bg-gray-100 bg-opacity-75">
		<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-4 w-full max-w-md h-full md:h-auto">
			<div class="relative bg-white rounded-2xl shadow-lg">
				<div class="p-6 pt-0 text-center">
					<i class="far fa-exclamation-circle text-[70px] text-red-500 mt-6"></i>
					<h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Вы уверены, что хотите удалить этого пользователя?</h3>
					<form id="deleteUserForm" action="" method="post" class="inline-flex">
						@csrf
						@method('delete')
						<button type="submit" class="text-white bg-red-500 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 hover:scale-[1.02] transition-all">
							Да
						</button>
					</form>
					<a href="javascript:deleteUser(0)" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center hover:scale-[1.02] transition-transform">
						Нет
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
