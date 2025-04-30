<!DOCTYPE html>
	<html lang="zxx" class="no-js">
        @include('theme.partials.head')

		<body>	
            @include('theme.partials.header')
			
			@yield('content')
			<!-- start banner Area -->
			
			<!-- start footer Area -->	
            @include('theme.partials.footer')	
		
			<!-- End footer Area -->	
            @include('theme.partials.scripts')

		</body>
	</html>