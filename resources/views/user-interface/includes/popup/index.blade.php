@if(Auth::check() && !Auth::user()->isAdmin())

@else
	@include('user-interface.includes.popup.forgot-password')
	@include('user-interface.includes.popup.login')
	@include('user-interface.includes.popup.registration')
	
	@if(isset($id))
		@include('user-interface.includes.popup.reset-password')
	@endif
@endif
@include('user-interface.includes.popup.size_chart')
@include('user-interface.includes.popup.rented_review_popup')