<footer class="bg-appmain">
	<div class="px-4 py-8 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
		<div class="flex flex-wrap justify-between gap-5">
			<div>
				<a class="inline-block" href="{{ route('user.index') }}">
					<img class="block h-7 sm:h-[45px]" src="{{ asset('assets/img/logo_white.svg') }}" alt="Alemtime"/>
				</a>
				<div class="flex mt-8 space-x-[10px] text-white">
					<a class="flex items-center justify-center w-10 h-10 bg-white rounded-full" target="_blank" href="https://wa.me/77087020626 }}">
						<i class="text-xl text-green-700 fab fa-whatsapp"></i>
					</a>
					<a class="flex items-center justify-center w-10 h-10 bg-white rounded-full" target="_blank" href="https://facebook.com/alemtime.kz">
						<i class="text-xl text-blue-500 fab fa-facebook-f"></i>
					</a>
					<a class="flex items-center justify-center w-10 h-10 bg-white rounded-full" target="_blank" href="https://instagram.com/alemtime.kz }}">
						<i class="text-xl text-purple-800 fab fa-instagram"></i>
					</a>
					<a class="flex items-center justify-center w-10 h-10 bg-white rounded-full" target="_blank" href="https://t.me/alemtime.kz }}">
						<i class="text-xl text-blue-500 fab fa-telegram-plane"></i>
					</a>
				</div>
			</div>
			<div class="flex flex-wrap gap-16">
				<div class="w-full sm:w-fit">
					<p class="text-xl font-bold text-white">{{__('footer.title.1')}}</p>
					<nav class="flex flex-col mt-4 space-y-2 text-sm text-white">
						<a class="text-lg font-light" href="{{ route('user.index') }}">{{__('footer.title.1.1')}}</a>
						<a class="text-lg font-light" href="{{ route('user.profile') }}">{{__('footer.title.1.2')}}</a>
						<a class="text-lg font-light" href="{{ route('user.map') }}">{{__('footer.title.1.3')}}</a>
					</nav>
				</div>
				<div class="w-full sm:w-fit">
					<p class="text-xl font-bold text-white">{{__('footer.title.2')}}</p>
					<nav class="flex flex-col mt-4 space-y-2 text-sm text-white">
						<a class="text-lg font-light" target="_blank" href="mailto:info@alemtime.kz">
							<i class="mr-3 text-lg far fa-envelope"></i>
							{{__('footer.title.2.1')}}
						</a>
						<a class="text-lg font-light" target="_blank" href="https://2gis.kz/almaty/firm/9429940000785873?m=76.914011%2C43.238541%2F17.09">
							<i class="mr-3 text-lg far fa-map-marker-alt"></i>
							{{__('footer.title.2.2')}}
						</a>
						<a class="text-lg font-light" target="_blank" href="tel:+77272445103">
							<i class="mr-3 text-lg far fa-phone-alt"></i>
							{{__('footer.title.2.3')}}
						</a>
					</nav>
				</div>
				<div class="w-full sm:w-fit">
					<p class="text-xl font-bold text-white">{{__('footer.title.3')}}</p>
					<nav class="flex flex-col mt-4 space-y-2 text-sm text-white">
						<a class="text-lg font-light" href="#">{{__('footer.title.3.1')}}</a>
						<a class="text-lg font-light" href="#">{{__('footer.title.3.2')}}</a>
						<a class="text-lg font-light" href="#">{{__('footer.title.3.3')}}</a>
					</nav>
				</div>
			</div>
		</div>
		<p class="mt-10 text-xs text-[15px] font-semibold text-white">&copy; 2022 ALEM Time</p>
	</div>
</footer>
