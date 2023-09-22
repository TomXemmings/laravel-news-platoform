@extends('user.layouts.app')

@section('content')
	<div class="divide-y-0 lg:divide-black lg:divide-y">
		<section class="mb-5 lg:pb-8 lg:mb-0">
			<x-main-news/>
		</section>
		<section class="lg:py-8">
			<div class="rounded-xl lg:bg-white lg:p-[30px]">
				<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-14">
					<!-- search mobile -->
					<div class="block mb-6 lg:hidden">
						<form action="{{ route('user.search') }}" method="get">
							<input type="text" placeholder="Іздеу" class="w-full rounded-md bg-white p-2.5 focus:border-blue-500"/>
						</form>
					</div>
					<!-- MAP -->

                    <div id="map" class="mt-5">
                        <a href="{{route('user.map')}}" id="testText"></a>
                        <form id="mainForm" action="{{route('user.map')}}">
                            <input type="hidden" id="mainInput" name="region" value="">
                        </form>
                        <script src="{{ asset('assets/js/us-states.js') }}"></script>
                        <script src="{{ asset('assets/js/countrymap1.js') }}"></script>
                    </div>
					<!-- END MAP -->
					<div class="flex flex-col gap-5">
						<x-map-category/>
						<x-horizontal-post-card/>
					</div>
				</div>
			</div>
		</section>
		<section class="hidden pt-8 lg:block">
			<div class="grid grid-cols-3 divide-x divide-black">
				<div class="grid grid-flow-row grid-cols-1 col-span-3 gap-4 auto-rows-max md:grid-cols-2 lg:col-span-2 lg:pr-10">
					<div class="mb-[18px] h-fit text-[27px] font-normal col-span-2">{{__('index.actual.news')}}</div>
					@foreach ($posts as $post)
						<x-post-card :post="$post"/>
					@endforeach
				</div>
				<div class="hidden grid-cols-1 col-span-1 pl-10 lg:grid auto-rows-max">
					<x-top-journalist/>
					<x-top-quote/>
					<x-ad-card/>
				</div>
			</div>
		</section>
	</div>

    <script>


        var map = L.map('map').setView([46.830134, 67.104492], 5);

        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">ALEM TIME</a>'
        }).addTo(map);

        // control that shows state info on hover
        var info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function (props) {
            this._div.innerHTML = '<a onClick="returnOtherStates()">Назад</a>';
        };

        info.addTo(map);

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: '#00A1E1'
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#08648a',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }

        var geojson;

        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            info.update();
        }



        function zoomToFeature(e) {

            var stateName = this.feature.properties.name;
            var stateId = this.feature.properties.id;
            var checker = this.feature.properties.type;


            var nowId = localStorage['regionId'];
            if (checker == "city"){
                var thisRegion = localStorage['regionId']
                var thisDistrict = this.feature.properties.district;

                localStorage['cityId'] = stateId;

                window.location.href = $('#testText').attr('href') + '?region=' + thisRegion + '&district=' + thisDistrict + "&city=" + stateId;
            } else if (checker == "district"){
                map.fitBounds(e.target.getBounds());

                var thisRegion = localStorage['regionId']

                localStorage['disctrictId'] = stateId;

                window.location.href = $('#testText').attr('href') + '?region=' + thisRegion + '&district=' + stateId;
            } else if(checker == "region") {

                map.fitBounds(e.target.getBounds());
                geojson.removeFrom(map);
                e.target.removeFrom(map);

                localStorage['nowId'] = stateName;
                localStorage['regionId'] = stateId;

                $( document ).ready(function() {
                    $("#mainInput").attr('value', stateId);
                    $( "#mainForm" ).submit();
                });
            }
            switch (stateName){
                case 'Mangystau':
                    geojsonsmall = L.geoJson(Mangystau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Atyrau':
                    geojsonsmall = L.geoJson(Atyrau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Batys':
                    geojsonsmall = L.geoJson(Batys, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Aktobe':
                    geojsonsmall = L.geoJson(Aktobe, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Kyzylorda':
                    geojsonsmall = L.geoJson(Kyzylorda, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Turkistan':
                    geojsonsmall = L.geoJson(Turkistan, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Zhambyl':
                    geojsonsmall = L.geoJson(Zhambyl, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Ulytau':
                    geojsonsmall = L.geoJson(Ulytau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Kostanay':
                    geojsonsmall = L.geoJson(Kostanay, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Karagandy':
                    geojsonsmall = L.geoJson(Karagandy, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Akmola':
                    geojsonsmall = L.geoJson(Akmola, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Soltustyk':
                    geojsonsmall = L.geoJson(Soltustyk, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Pavlodar':
                    geojsonsmall = L.geoJson(Pavlodar, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Abay':
                    geojsonsmall = L.geoJson(Abay, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Shygys':
                    geojsonsmall = L.geoJson(Shygys, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Zhetisu':
                    geojsonsmall = L.geoJson(Zhetisu, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Almaty':
                    geojsonsmall = L.geoJson(Almaty, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
            }
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        function returnOtherStates(){
            localStorage['nowId'] = "Пусто";
            map.fitBounds(geojson.getBounds());
            geojsonsmall.removeFrom(map);
            geojson = L.geoJson(statesData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

            window.location.href = $('#testText').attr('href');
        }

        var nowId = localStorage['nowId']
        /* global statesData */
        if (nowId == "Пусто"){
            geojson = L.geoJson(statesData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        } else if (nowId){
            // map.fitBounds(nowId.target.getBounds());
            geojson = L.geoJson(statesData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
            geojson.removeFrom(map);
            switch (nowId){
                case 'Mangystau':
                    geojsonsmall = L.geoJson(Mangystau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Atyrau':
                    geojsonsmall = L.geoJson(Atyrau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Batys':
                    geojsonsmall = L.geoJson(Batys, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Aktobe':
                    geojsonsmall = L.geoJson(Aktobe, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Kyzylorda':
                    geojsonsmall = L.geoJson(Kyzylorda, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Turkistan':
                    geojsonsmall = L.geoJson(Turkistan, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Zhambyl':
                    geojsonsmall = L.geoJson(Zhambyl, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Ulytau':
                    geojsonsmall = L.geoJson(Ulytau, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Kostanay':
                    geojsonsmall = L.geoJson(Kostanay, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Karagandy':
                    geojsonsmall = L.geoJson(Karagandy, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Akmola':
                    geojsonsmall = L.geoJson(Akmola, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Soltustyk':
                    geojsonsmall = L.geoJson(Soltustyk, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Pavlodar':
                    geojsonsmall = L.geoJson(Pavlodar, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Abay':
                    geojsonsmall = L.geoJson(Abay, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Shygys':
                    geojsonsmall = L.geoJson(Shygys, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Zhetisu':
                    geojsonsmall = L.geoJson(Zhetisu, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
                case 'Almaty':
                    geojsonsmall = L.geoJson(Almaty, {

                        style: style,
                        onEachFeature: onEachFeature
                    }).addTo(map);
                    break;
            }
        } else {
            console.log('not meow');
            geojson = L.geoJson(statesData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

        }

        map.attributionControl.addAttribution('Kazakhstan states');



    </script>
@endsection
