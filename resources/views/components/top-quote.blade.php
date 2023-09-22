@if ($quotes)
    <div class="mb-6 text-[27px] font-normal">{{__('index.top.quote.title')}}</div>
    <div class="mb-10 w-full rounded-lg bg-white p-[30px]">
        <div class="flex flex-col gap-4">
            @foreach ($quotes as $quote)
                <div class="flex flex-col justify-between rounded-lg bg-gray-100 p-[12px]">
                    <div class="mb-[5px] text-sm font-bold">“{{ $quote->quote }}”</div>
                    <div class="text-xs font-normal text-gray-400">- {{ $quote->author }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endif
