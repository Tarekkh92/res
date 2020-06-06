@extends('layouts.app')

@section('content')
<link href="{{ asset('css/error/main.css') }}" rel="stylesheet">
<script src="{{ asset('js/error/plugins.js') }}" defer></script>
<script src="{{ asset('js/error/main.js') }}" defer></script>
<div class="content-wrap" style="min-height: 680px;">
<div class="shadow-overlay"></div>

		   <div class="main-content" >
		   	<div class="row" style="width: 94%;
               max-width: 1170px;
               margin: 0 auto;">
		   		<div class="col-twelve">
			  		
			  			<h1 class="kern-this">404 Error.</h1>
			  			<p>
						Oooooops! Looks like nothing was found at this location.
						Maybe try on of the links below, click on the top menu
						or try a search?
			  			</p>

			  			{{-- <div class="search">
				      	<form>
								<input type="text" id="s" name="s" class="search-field" placeholder="Type and hit enter …">
							</form>
				      </div>	   			 --}}

			   	</div> <!-- /twelve --> 		   			
		   	</div> <!-- /row -->    		 		
		   </div> <!-- /main-content --> 
</div>
@endsection