<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>issue tracker</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
    @vite('resources/css/app.css')
    
</head>
<body class="bg-[#1D2125]">
    <div
     class='bg-[#1D2125] fixed top-0 flex flex-row justify-between items-center h-[49px] px-9 w-full z-[999]'
        style="backdrop-filter:blur(24px);border-bottom:1px solid rgba(255, 255, 255, 0.16);">
      <div class='text-white tracking-[4.4px]'>
        Issue Tracker
      </div>
      <div class='flex flex-row gap-3 transition-all max-sm:hidden'>
        @guest
        <a href='{{route("loginUI")}}' class='text-[#c7c7c7] t py-[3px] px-[20px] flex justify-center items-center
        rounded-[3px] uppercase cursor-pointer text-[14px]'>
            Login
        </a>
        <a href='{{ route("registerUI") }}' class='text-[#c7c7c7] t py-[3px] px-[20px] flex justify-center items-center
        rounded-[3px] uppercase cursor-pointer text-[14px]'>
            Sign up
        </a>
        @else
        <a href='{{ route("logout") }}' class='text-[#c7c7c7] t py-[3px] px-[20px] flex justify-center items-center
        rounded-[3px] uppercase cursor-pointer text-[14px]'>
            Logout
        </a>
        @endguest
      </div>
    </div>
    <div class="bg-[#1D2125] h-screen">
        @yield('content')   
    </div>
    
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>