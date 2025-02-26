<!DOCTYPE html>
<html lang="en" class=" ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<script>
		(function(){
			if(localStorage.getItem('theme') == 'dark'){
				document.documentElement.classList.add('tw-dark'); 
			}
		})(); 
	</script>
	
    <style>
        .scrollbar::-webkit-scrollbar {
            width: 0px;
        }
    </style>

    <title>@yield('title')</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class=" tw-bg-gray dark:tw-bg-black_blue dark">

    <section class=" tw-border-[3px] tw-border-white tw-bg-white dark:tw-bg-purple_blue tw-w-[90%] xl:tw-w-[1200px] tw-mx-auto tw-mt-[30px] sm:tw-mt-[50px] md:tw-mt-[100px] tw-h-[700px] sm:tw-h-[800px] lg:tw-h-[800px] tw-mb-[100px] tw-flex tw-flex-col md:tw-flex-row tw-rounded-triple ">
        <div class=" tw-h-[8%] md:tw-h-full tw-w-full md:tw-w-[20%] tw-bg-white dark:tw-bg-purple_blue tw-rounded-l-none md:tw-rounded-l-triple tw-rounded-t-triple scrollbar tw-pr-5 md:tw-pr-0">
            <div class=" tw-overflow-x-scroll scrollbar tw-py-3 tw-px-4 md:tw-p-2 tw-w-full dark:tw-text-white tw-flex tw-flex-row md:tw-flex-col tw-items-center tw-gap-x-8 sm:tw-gap-x-16 tw-justify-between md:tw-justify-normal">
                <a href="/logout"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="113.055px" height="122.88px" class=" tw-w-[30px] tw-h-[30px] sm:tw-w-[40px] sm:tw-h-[40px] md:tw-w-[70px] md:tw-h-[70px] tw-mt-0 md:tw-mt-[30px]" viewBox="0 0 113.055 122.88" enable-background="new 0 0 113.055 122.88" xml:space="preserve"><g><path d="M53.114,2.457C53.114,1.1,54.643,0,56.527,0s3.413,1.1,3.413,2.457v44.377c0,1.357-1.528,2.457-3.413,2.457 s-3.413-1.1-3.413-2.457V2.457L53.114,2.457z M73.615,19.661c-1.768-0.648-2.675-2.605-2.026-4.373 c0.647-1.767,2.604-2.674,4.372-2.026c10.962,4.015,20.339,11.339,26.924,20.766c6.409,9.174,10.17,20.32,10.17,32.325 c0,15.606-6.329,29.738-16.559,39.969c-10.23,10.229-24.362,16.559-39.969,16.559s-29.739-6.329-39.969-16.559 C6.329,96.091,0,81.959,0,66.353c0-12.005,3.76-23.151,10.169-32.325c6.585-9.427,15.962-16.751,26.924-20.766 c1.767-0.647,3.725,0.26,4.372,2.026c0.648,1.767-0.259,3.725-2.026,4.373c-9.659,3.538-17.913,9.978-23.698,18.259 c-5.619,8.044-8.916,17.846-8.916,28.433c0,13.723,5.564,26.148,14.559,35.143c8.995,8.995,21.42,14.56,35.143,14.56 s26.148-5.564,35.143-14.56c8.995-8.994,14.559-21.42,14.559-35.143c0-10.587-3.297-20.389-8.916-28.433 C91.527,29.638,83.274,23.198,73.615,19.661L73.615,19.661z"/></g></svg></a>
    
                <div class=" tw-flex tw-flex-row md:tw-flex-col tw-items-center tw-mt-0 md:tw-mt-8 tw-gap-x-10 md:tw-gap-y-10 tw-w-full dark:tw-text-white " id="navbar">
                    <a href="{{ route('home')}}">
                        <button class=" tw-border dark:tw-border-white tw-w-[150px] tw-rounded-triple tw-py-[6px] md:tw-py-3 tw-text-[14px] md:tw-text-[17px] tw-font-raleway tw-font-black">Home</button>
                    </a>
                    <a href="{{ route('dashboard')}}" class="lien">
                        <button class=" tw-border dark:tw-border-white tw-w-[150px] tw-rounded-triple tw-py-[6px] md:tw-py-3 tw-text-[14px] md:tw-text-[17px] tw-font-raleway tw-font-black tw-bg-black dark:tw-bg-white tw-text-white dark:tw-text-purple_blue">Dashboard</button>
                    </a>
                    <a href="{{ route('admin-users-list')}}" class="lien">
                        <button class=" tw-border dark:tw-border-white tw-w-[150px] tw-py-[6px] md:tw-py-3 tw-text-[14px] md:tw-text-[17px] tw-rounded-triple tw-font-raleway tw-font-black" >Users</button>
                    </a>
                    <a href="{{ route('admin-items-list')}}" class="lien">
                        <button class=" tw-border dark:tw-border-white tw-w-[150px] tw-py-[6px] md:tw-py-3 tw-text-[14px] md:tw-text-[17px] tw-rounded-triple tw-font-raleway tw-font-black" >Items</button>
                    </a>
                    <a href="{{ route('admin-orders-list')}}" class="lien">
                        <button class=" tw-border dark:tw-border-white tw-w-[150px] tw-py-[6px] md:tw-py-3 tw-text-[14px] md:tw-text-[17px] tw-rounded-triple tw-font-raleway tw-font-black" >Orders</button>
                    </a>
                </div>
            </div>
        </div>


        <div class=" tw-bg-gray dark:tw-bg-black_blue tw-w-full md:tw-w-[80%] tw-h-[92%] md:tw-h-full tw-rounded-rt-none md:tw-rounded-r-triple tw-rounded-b-triple md:tw-rounded-bl-none tw-p-3">
            <svg version="1.1" id="dark_mode" class="tw-block dark:tw-hidden tw-w-[20px] tw-h-[20px]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.89" style="enable-background:new 0 0 122.88 122.89" xml:space="preserve"><g><path d="M49.06,1.27c2.17-0.45,4.34-0.77,6.48-0.98c2.2-0.21,4.38-0.31,6.53-0.29c1.21,0.01,2.18,1,2.17,2.21 c-0.01,0.93-0.6,1.72-1.42,2.03c-9.15,3.6-16.47,10.31-20.96,18.62c-4.42,8.17-6.1,17.88-4.09,27.68l0.01,0.07 c2.29,11.06,8.83,20.15,17.58,25.91c8.74,5.76,19.67,8.18,30.73,5.92l0.07-0.01c7.96-1.65,14.89-5.49,20.3-10.78 c5.6-5.47,9.56-12.48,11.33-20.16c0.27-1.18,1.45-1.91,2.62-1.64c0.89,0.21,1.53,0.93,1.67,1.78c2.64,16.2-1.35,32.07-10.06,44.71 c-8.67,12.58-22.03,21.97-38.18,25.29c-16.62,3.42-33.05-0.22-46.18-8.86C14.52,104.1,4.69,90.45,1.27,73.83 C-2.07,57.6,1.32,41.55,9.53,28.58C17.78,15.57,30.88,5.64,46.91,1.75c0.31-0.08,0.67-0.16,1.06-0.25l0.01,0l0,0L49.06,1.27 L49.06,1.27z M51.86,5.2c-0.64,0.11-1.28,0.23-1.91,0.36l-1.01,0.22l0,0c-0.29,0.07-0.63,0.14-1,0.23 c-14.88,3.61-27.05,12.83-34.7,24.92C5.61,42.98,2.46,57.88,5.56,72.94c3.18,15.43,12.31,28.11,24.51,36.15 c12.19,8.03,27.45,11.41,42.88,8.23c15-3.09,27.41-11.81,35.46-23.49c6.27-9.09,9.9-19.98,10.09-31.41 c-2.27,4.58-5.3,8.76-8.96,12.34c-6,5.86-13.69,10.13-22.51,11.95l-0.01,0c-12.26,2.52-24.38-0.16-34.07-6.54 c-9.68-6.38-16.93-16.45-19.45-28.7l0-0.01C31.25,40.58,33.1,29.82,38,20.77C41.32,14.63,46.05,9.27,51.86,5.2L51.86,5.2z"/></g></svg>
            <svg version="1.1" id="light_mode" class="tw-hidden dark:tw-block tw-w-[20px] tw-h-[20px]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.67" style="enable-background:new 0 0 122.88 122.67" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M122.88,62.58l-12.91,8.71l7.94,13.67l-15.03,3.23l2.72,15.92l-15.29-2.25l-2.76,15.58l-14.18-8.11 l-7.94,13.33l-10.32-11.93l-12.23,9.55l-4.97-15.16l-15.54,4.59l1.23-15.54L7.69,92.43l6.75-13.93L0,71.03l11.29-10.95L0.38,48.66 l14.65-6.5L9.42,27.51l15.58-0.76l0-15.8l14.78,5.22l5.99-14.82l11.93,9.98L68.15,0l7.6,13.33l14.18-6.5l2.12,15.07l15.8-1.15 l-3.86,15.46l15.41,4.2l-9.21,12.95L122.88,62.58L122.88,62.58z M104.96,61.1c0-12.14-4.29-22.46-12.87-31 c-8.58-8.54-18.94-12.82-31.04-12.82c-12.1,0-22.42,4.29-30.96,12.82c-8.54,8.53-12.82,18.85-12.82,31 c0,12.1,4.29,22.46,12.82,31.08c8.53,8.62,18.85,12.95,30.96,12.95c12.1,0,22.46-4.33,31.04-12.95 C100.67,83.56,104.96,73.2,104.96,61.1L104.96,61.1L104.96,61.1z"/></g></svg>

            <div class=" tw-bg-white dark:tw-bg-purple_blue dark:tw-text-white tw-px-2 sm:tw-px-7 tw-py-6 tw-mt-3 tw-w-full sm:tw-w-[95%] tw-mx-auto tw-h-[90%] tw-rounded-double tw-overflow-y-auto scrollbar">
                <content>
                    @include('layouts.notification')
                    @yield('content')
                </content>
                
                @yield('admin_content')
            </div>

        </div>


    </section>
    
</body>
</html>
