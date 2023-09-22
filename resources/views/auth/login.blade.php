<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alemtime</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-appgray">
    <main class="m-auto max-w-screen-2xl">
        <div class="flex justify-center" style="min-height: 100vh">
            <div class="hidden bg-cover lg:block lg:w-7/12">
                <div class="flex items-center h-full px-20 bg-opacity-40">
                    <div class="w-full text-center">
                        <a href="{{ route('user.index') }}">
                            <img class="inline-block bg-contain" src="{{ asset('assets/img/logo.svg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="block w-full lg:w-5/12">
                <div class="flex items-center w-full h-full px-8 py-10 mx-auto bg-white lg:px-20">
                    <div class="flex-1">
                        <div class="block text-center lg:hidden mb-14">
                            <a href="{{ route('user.index') }}">
                                <img class="inline-block bg-contain" src="{{ asset('assets/img/logo.svg') }}" alt="" />
                            </a>
                        </div>
                        <div class="flex items-center justify-between max-w-md mx-auto overflow-x-auto no-scrollbar">
                            <div class="border-appmain w-1/2 whitespace-nowrap border-b-2 px-1 py-[10px] text-center">
                                <a class="text-appmain text-[21px] font-semibold" href="{{ route('login') }}">Кіру</a>
                            </div>
                            <div class="w-1/2 whitespace-nowrap px-1 py-[10px] text-center">
                                <a class="text-[21px] font-normal text-gray-500" href="{{ route('register') }}">Тіркелу</a>
                            </div>
                        </div>
                        <div class="mt-8">
                            <form method="post" action="{{ route('login') }}" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="text-sm text-gray-400">Телефон нөмерініз</label>
                                    <input id="phone" name="number" type="text" class="mt-[10px] w-full rounded-lg border-none bg-gray-100 p-4 text-sm shadow-sm" placeholder="+7(___)___-__-__" required />
                                </div>
                                <div>
                                    <label class="text-sm text-gray-400">Құпия сөз</label>
                                    <input name="password" type="password" minlength="8" class="mt-[10px] w-full rounded-lg border-none bg-gray-100 p-4 text-sm shadow-sm" placeholder="Құпия сөзді еңгізіңіз" required />
                                </div>
                                <div class="block">
                                    <button type="submit" class="bg-appmain h-[50px] w-full rounded-lg text-sm font-bold text-white md:max-w-[270px]">Кіру</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if (session('status'))
        <x-alert :status="session('status')" :message="session('message')" />
    @endif

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script type="text/javascript">
        // Input Mask
        $("#phone").mask("+7(999)999-99-99")

        // Alert
        let opacity = 1
        let alert = $('#alert')
        alert.css('opacity', 1)
        setTimeout(function() {
            let alertHide = setInterval(function() {
                alert.css('opacity', opacity)
                opacity -= 0.05
                if (opacity < 0) {
                    alert.css('display', 'none')
                    clearInterval(alertHide)
                }
            }, 10)
        }, 2000)
    </script>
</body>

</html>
