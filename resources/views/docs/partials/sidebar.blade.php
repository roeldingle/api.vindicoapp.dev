<div class="list-group">


	@if(Request::segment('3') == '')

	<a href="{{ URL::route('doc.v1.index') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.index') }}" class="list-group-item">

	@endif

	Documentation

	</a>

	@if(Request::segment('3') == 'installation')

	<a href="{{ URL::route('doc.v1.installation') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.installation') }}" class="list-group-item">

	@endif

	Installation

	</a>

	@if(Request::segment('3') == 'register')

	<a href="{{ URL::route('doc.v1.register') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.register') }}" class="list-group-item">

	@endif

	Register

	</a>

	@if(Request::segment('3') == 'authentication')

	<a href="{{ URL::route('doc.v1.authentication') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.authentication') }}" class="list-group-item">

	@endif

	Authentication

	</a>

	@if(Request::segment('3') == 'search')

	<a href="{{ URL::route('doc.v1.search') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.search') }}" class="list-group-item">

	@endif

	Search

	</a>

	@if(Request::segment('3') == 'reports')

	<a href="{{ URL::route('doc.v1.reports') }}" class="list-group-item active">

	@else

	<a href="{{ URL::route('doc.v1.reports') }}" class="list-group-item">

	@endif

	Reports

	</a>

	


</div>