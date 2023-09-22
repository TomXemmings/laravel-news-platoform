@if(!app('request')->input('region') && !app('request')->input('district') && !app('request')->input('city'))
	<x-region/>
@endif

@if(app('request')->input('region') == 1 && !app('request')->input('district'))
	<x-district/>
@endif

@if(app('request')->input('district') || app('request')->input('city'))
	<x-city/>
@endif