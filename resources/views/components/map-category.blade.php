<div class="flex gap-4 overflow-x-auto scrollbar-hide">
	<div class="whitespace-nowrap">
		<a class="font-normal text-gray-500 nav-link active" href="javascript:mapCategory(0)">{{__('index.map.category')}}</a>
	</div>
	@foreach ($categories as $category)
		<div class="whitespace-nowrap">
			<a class="font-normal text-gray-500 nav-link" href="javascript:mapCategory({{ $category->id }})">{{ $category->name }}</a>
		</div>
	@endforeach
</div>

<style>
    .nav-link {
        color: black;
    }

    .active {
        color: #275efc;
        font-weight: 700;
        border-bottom: 2px solid #275efc;
    }
</style>
<script>
    moment.locale('kk')
    const links = document.querySelectorAll('.nav-link');

    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function () {
            for (let j = 0; j < links.length; j++) {
                links[j].classList.remove('active');
            }
            this.classList.add('active');
        });
    }

    function mapCategory(id) {

        var url = '';

		@if(app('request')->input('region'))
            url = 'category/map{{$urlCategory}}' + '&id=' + id
		@else
            url = 'category/map' + '?id=' + id
		@endif

            url = url.replaceAll('amp;', '')
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                var cardPost = ''
                console.log(response)
                response.forEach(function (currentValue, index, array) {

                    var time = currentValue.created_at;
                    cardPost += `
                    <div class="grid w-full grid-cols-5 gap-4">
		                <img class="col-span-2 h-[150px] w-full object-cover object-center rounded-lg" src="${currentValue.photo}" alt="" />
		                <div class="flex flex-col justify-between col-span-3 gap-3 md:gap-4">
		                    <div class="flex flex-col gap-1">
		                        <div class="flex justify-between mb-1">
		                        <div class="flex h-[24px] w-28 items-center justify-center rounded-md text-xs font-semibold text-white" style="background-color: ${currentValue.category.color}">${currentValue.category.name}</div>
		                    </div>
							<div class="mb-1 text-[15px] font-bold line-clamp-1 md:line-clamp-2">${currentValue.title}</div>
		                        <div class="flex items-center">
		                            <div class="text-[12px] text-gray-400 md:text-[16px]"><i class="far fa-clock"></i> ${moment(time).format('LL')}</div>
		                            <div class="mx-2 h-[6px] w-[6px] rounded-full bg-gray-400"></div>
		                            <div class="text-[12px] text-gray-400 md:text-[16px]"><i class="far fa-eye"></i> ${currentValue.views}</div>
		                        </div>
		                    </div>
		                    <a href="/posts/${currentValue.id}" class="flex items-center justify-between text-[15px] font-extrabold text-appmain md:text-[18px]">
		                        <div>{{__('index.actual.news.link')}}</div>
		                        <i class="far fa-angle-right"></i>
		                    </a>
		                </div>
		            </div>
		            `
                });
                $('#mapCategoryPost').html(cardPost);
            }
        });
    }
</script>