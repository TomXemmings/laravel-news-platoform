<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<title>Alemtime</title>
	@vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
</head>

<body class="bg-appgray">

<x-header/>

<main class="p-5 m-auto max-w-screen-2xl">
	@yield('content')
</main>

<x-footer/>

@if (session('status'))
	<x-alert :status="session('status')" :message="session('message')"/>
@endif

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css"/>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>

<script>
    // Alert
    let opacity = 1
    let alert = $('#alert')
    alert.css('opacity', 1)
    setTimeout(function () {
        let alertHide = setInterval(function () {
            alert.css('opacity', opacity)
            opacity -= 0.05
            if (opacity < 0) {
                alert.css('display', 'none')
                clearInterval(alertHide)
            }
        }, 10)
    }, 2000)

    // Dropdown Menu
    const dropdownMobileButton = document.querySelector("#dropdownMobile");
    const dropdownButton = document.querySelector("#dropdown")
    const dropdownList = document.querySelector("#listDropdown")
    dropdownMobileButton.addEventListener("click", () => {
        dropdownList.classList.toggle("hidden")
    });
    dropdownButton.addEventListener("click", () => {
        dropdownList.classList.toggle("hidden")
    });

    // Like
    function like(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/posts/" + id + "/like",
            type: "POST",
            data: "_token: {{ csrf_token() }}",
            success: function (response) {
                $("#like_" + id).addClass("fas").removeClass("far")
                $("#likeHref_" + id).attr("href", "javascript:unlike(" + id + ")")
                $("#like_" + id).attr("id", "unlike_" + id)
                $("#likeHref_" + id).attr("id", "unlikeHref_" + id)
            },
        });
    }

    // Unlike
    function unlike(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/posts/" + id + "/unlike",
            type: "POST",
            data: "_token: {{ csrf_token() }}",
            success: function (response) {
                $("#unlike_" + id).addClass("far").removeClass("fas")
                $("#unlikeHref_" + id).attr("href", "javascript:like(" + id + ")")
                $("#unlike_" + id).attr("id", "like_" + id)
                $("#unlikeHref_" + id).attr("id", "likeHref_" + id)
            },
        });
    }
</script>

<script src="https://momentjs.bootcss.com/downloads/moment.js"></script>
<script src="https://momentjs.bootcss.com/downloads/moment-with-locales.min.js"></script>

</body>

</html>
