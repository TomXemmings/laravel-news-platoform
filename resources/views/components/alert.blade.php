<div id="alert" class="z-50 fixed top-4 right-4 rounded-xl p-4 shadow-xl bg-gray-100 min-w-[300px]">
    <div class="flex items-center gap-4">
        @if ($status == '200')
            <span class="text-green-600">
                <i class="fal fa-check-circle text-[30px]"></i>
            </span>
        @else
            <span class="text-red-600">
                <i class="fal fa-exclamation-circle text-[30px]"></i>
            </span>
        @endif
        <div class="flex-1">
            @if ($status == '200')
                <strong class="block font-medium text-gray-900">Успешно</strong>
            @else
                <strong class="block font-medium text-gray-900">Ошибка</strong>
            @endif
            <p class="mt-1 text-sm text-gray-700">{{ $message }}</p>
        </div>
    </div>
</div>
