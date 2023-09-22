@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="items-center justify-between block p-4 mx-4 mt-4 bg-white shadow-xl rounded-2xl shadow-gray-200 lg:p-5 sm:flex">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <nav class="flex mb-5">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.index') }}" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                    <i class="mr-4 fad fa-house"></i>
                                    Главный
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <i class="mx-2 text-gray-400 fas fa-angle-right"></i>
                                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 line-clamp-1">Пост</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Пост</h1>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-6">
                <div class="col-span-3">
                    <div class="p-4 mb-6 bg-white shadow-lg shadow-gray-200 rounded-2xl">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12">
                                <div class="max-w-[400px] items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                                    <img class="w-full h-[300px] rounded-lg object-cover" src="{{ $post->photo }}" alt="img">
                                </div>
                            </div>
                            <div class="col-span-12">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Заголовок</label>
                                <input value="{{ $post->title }}" type="text" name="title" id="first-name" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                            </div>
                            <div class="col-span-12">
                                <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900">Описание</label>
                                <textarea type="text" name="body" id="last-name" class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">{{ $post->body }}</textarea>
                            </div>
                            <div class="col-span-12">
                                <label for="settings-language" class="block mb-2 text-sm font-medium text-gray-900">Выбрать категорию</label>
                                <select id="settings-language" name="category_id" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-full">
                                <button type="submit" class="text-white font-medium text-sm px-5 py-2.5 text-center rounded-lg bg-blue-500 hover:scale-[1.02] transition-all">
                                    Сохранить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
