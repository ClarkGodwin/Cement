<!DOCTYPE html>
<html lang="fr" class=" tw-ease-in-out tw-duration-700">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

    <style>
        .scrollbar::-webkit-scrollbar {
            width: 0px;
        }
    </style>
	
	<script>
		(function(){
			if(localStorage.getItem('theme') == 'dark'){
				document.documentElement.classList.add('tw-dark'); 
			}
		})(); 
	</script>


	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dark:tw-bg-dark_blue dark:tw-text-white">
	<header>
		<section class="tw-bg-black tw-text-white tw-font-roboto tw-text-center tw-py-1 tw-text-[10px] md:tw-text-[13px]">
				Connectez-vous et acheter ou vendez du ciment à volonté
		</section>
	
		 <section class="tw-bg-white tw-text-black dark:tw-bg-dark_blue dark:tw-text-white">
			<div class="tw-w-[95%] md:tw-w-[85%] lg:tw-w-[85%] xl:tw-w-[1240px] tw-mx-auto tw-py-[15px] tw-flex tw-justify-between tw-items-center ">
				<a href="{{ Route('home')}}" class="tw-font-roboto tw-text-xl sm:text-2xl md:tw-text-3xl lg:tw-text-4xl">SHOP.CO</a>

				<form action="{{ route('search')}}" class="tw-relative sm:tw-w-[40%] md:tw-w-[50%] xl:tw-w-[672px] tw-hidden sm:tw-block">
					<svg version="1.1" class="tw-absolute tw-top-[23%] tw-left-[3%] tw-w-[11px] tw-h-[13px] md:tw-w-[15px] md:tw-h-[15px] lg:tw-w-[18px] lg:tw-h-[18px] tw-fill-gray_text dark:tw-fill-gray_text" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="119.799px" viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve"><g><path d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z"/></g></svg>
					<input type="text" name="search" placeholder="Recherche de ciment..." class=" tw-w-full tw-text-[13px] md:tw-text-[15px] lg:tw-text-[17px] tw-bg-gray sm:tw-px-[10%] md:tw-px-[8%] tw-py-[1%] tw-rounded-triple tw-text-gray_text tw-outline-none" data-bs-toggle="modal" data-bs-target="#search_bar" autocomplete="off">
				</form>
				<div class="modal fade search_bar"  id="search_bar" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content dark:tw-bg-dark_blue tw-rounded-double tw-h-[65%] md:tw-h-[80%]">
							  <div class="modal-header" onclick="event.stopPropagation(); ">
								  <form action="{{ route('search')}}" method="post" class=" tw-relative tw-w-[90%]" id="search_form">
									  @csrf
									  <svg version="1.1" class="tw-absolute tw-top-[25%] tw-left-[3%] tw-w-[17px] tw-h-[15px] sm:tw-w-[18px] sm:tw-h-[18px] md:tw-w-[15px] md:tw-h-[15px] lg:tw-w-[18px] lg:tw-h-[18px] tw-fill-gray_text dark:tw-fill-gray_text" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="119.799px" viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve"><g><path d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z"/></g></svg>
									  <input type="text" name="query" id="query" placeholder="Recherche de ciment..." class=" tw-w-full tw-text-[13px] md:tw-text-[15px] tw-bg-gray tw-px-[12%] md:tw-px-[9%] tw-py-[8px] sm:tw-py-[2%] tw-rounded-triple tw-text-gray_text tw-outline-none" required>
								  </form>
								<button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body scrollbar tw-pb-[50px]">
								<ul class=" tw-flex tw-flex-col tw-gap-3 tw-w-full sm:tw-w-[95%] tw-mx-auto search_results" id="search_results">
								</ul>
							</div>
						</div>
					  </div>
				</div>

				<div class=" tw-flex tw-gap-1 tw-items-center tw-text-[14px] lg:tw-text-[17px] xl:tw-text-[19px] tw-font-black tw-font-akaya">
					<a href="{{route('register')}}" class=" tw-underline hover:tw-no-underline">S'inscrire</a>
					<span>|</span>
					<a href="{{route('login')}}" class=" tw-underline hover:tw-no-underline">Se connecter</a>
				</div>

				<div class="tw-flex tw-gap-1 sm:tw-gap-3">
					<svg version="1.1" id="dark_mode" class="tw-block dark:tw-hidden" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.89" style="enable-background:new 0 0 122.88 122.89" xml:space="preserve"><g><path d="M49.06,1.27c2.17-0.45,4.34-0.77,6.48-0.98c2.2-0.21,4.38-0.31,6.53-0.29c1.21,0.01,2.18,1,2.17,2.21 c-0.01,0.93-0.6,1.72-1.42,2.03c-9.15,3.6-16.47,10.31-20.96,18.62c-4.42,8.17-6.1,17.88-4.09,27.68l0.01,0.07 c2.29,11.06,8.83,20.15,17.58,25.91c8.74,5.76,19.67,8.18,30.73,5.92l0.07-0.01c7.96-1.65,14.89-5.49,20.3-10.78 c5.6-5.47,9.56-12.48,11.33-20.16c0.27-1.18,1.45-1.91,2.62-1.64c0.89,0.21,1.53,0.93,1.67,1.78c2.64,16.2-1.35,32.07-10.06,44.71 c-8.67,12.58-22.03,21.97-38.18,25.29c-16.62,3.42-33.05-0.22-46.18-8.86C14.52,104.1,4.69,90.45,1.27,73.83 C-2.07,57.6,1.32,41.55,9.53,28.58C17.78,15.57,30.88,5.64,46.91,1.75c0.31-0.08,0.67-0.16,1.06-0.25l0.01,0l0,0L49.06,1.27 L49.06,1.27z M51.86,5.2c-0.64,0.11-1.28,0.23-1.91,0.36l-1.01,0.22l0,0c-0.29,0.07-0.63,0.14-1,0.23 c-14.88,3.61-27.05,12.83-34.7,24.92C5.61,42.98,2.46,57.88,5.56,72.94c3.18,15.43,12.31,28.11,24.51,36.15 c12.19,8.03,27.45,11.41,42.88,8.23c15-3.09,27.41-11.81,35.46-23.49c6.27-9.09,9.9-19.98,10.09-31.41 c-2.27,4.58-5.3,8.76-8.96,12.34c-6,5.86-13.69,10.13-22.51,11.95l-0.01,0c-12.26,2.52-24.38-0.16-34.07-6.54 c-9.68-6.38-16.93-16.45-19.45-28.7l0-0.01C31.25,40.58,33.1,29.82,38,20.77C41.32,14.63,46.05,9.27,51.86,5.2L51.86,5.2z"/></g></svg>
					<svg version="1.1" id="light_mode" class="tw-hidden dark:tw-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.67" style="enable-background:new 0 0 122.88 122.67" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M122.88,62.58l-12.91,8.71l7.94,13.67l-15.03,3.23l2.72,15.92l-15.29-2.25l-2.76,15.58l-14.18-8.11 l-7.94,13.33l-10.32-11.93l-12.23,9.55l-4.97-15.16l-15.54,4.59l1.23-15.54L7.69,92.43l6.75-13.93L0,71.03l11.29-10.95L0.38,48.66 l14.65-6.5L9.42,27.51l15.58-0.76l0-15.8l14.78,5.22l5.99-14.82l11.93,9.98L68.15,0l7.6,13.33l14.18-6.5l2.12,15.07l15.8-1.15 l-3.86,15.46l15.41,4.2l-9.21,12.95L122.88,62.58L122.88,62.58z M104.96,61.1c0-12.14-4.29-22.46-12.87-31 c-8.58-8.54-18.94-12.82-31.04-12.82c-12.1,0-22.42,4.29-30.96,12.82c-8.54,8.53-12.82,18.85-12.82,31 c0,12.1,4.29,22.46,12.82,31.08c8.53,8.62,18.85,12.95,30.96,12.95c12.1,0,22.46-4.33,31.04-12.95 C100.67,83.56,104.96,73.2,104.96,61.1L104.96,61.1L104.96,61.1z"/></g></svg>
					<svg version="1.1" data-bs-toggle="modal" data-bs-target="#search_bar" class=" tw-block sm:tw-hidden" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.879px" height="119.799px" viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve"><g><path d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z"/></g></svg>
					
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.9 107.5" style="enable-background:new 0 0 122.9 107.5" xml:space="preserve" data-bs-target="#display_cart" data-bs-toggle="modal"><g><path d="M3.9,7.9C1.8,7.9,0,6.1,0,3.9C0,1.8,1.8,0,3.9,0h10.2c0.1,0,0.3,0,0.4,0c3.6,0.1,6.8,0.8,9.5,2.5c3,1.9,5.2,4.8,6.4,9.1 c0,0.1,0,0.2,0.1,0.3l1,4H119c2.2,0,3.9,1.8,3.9,3.9c0,0.4-0.1,0.8-0.2,1.2l-10.2,41.1c-0.4,1.8-2,3-3.8,3v0H44.7 c1.4,5.2,2.8,8,4.7,9.3c2.3,1.5,6.3,1.6,13,1.5h0.1v0h45.2c2.2,0,3.9,1.8,3.9,3.9c0,2.2-1.8,3.9-3.9,3.9H62.5v0 c-8.3,0.1-13.4-0.1-17.5-2.8c-4.2-2.8-6.4-7.6-8.6-16.3l0,0L23,13.9c0-0.1,0-0.1-0.1-0.2c-0.6-2.2-1.6-3.7-3-4.5 c-1.4-0.9-3.3-1.3-5.5-1.3c-0.1,0-0.2,0-0.3,0H3.9L3.9,7.9z M96,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C86.4,92.6,90.7,88.3,96,88.3L96,88.3z M53.9,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C44.3,92.6,48.6,88.3,53.9,88.3L53.9,88.3z M33.7,23.7l8.9,33.5h63.1l8.3-33.5H33.7L33.7,23.7z"/></g></svg>

					@php
					 	use App\Models\Carts; 
						use App\Models\Carts_items; 
						use App\Models\Items; 

						if(Auth::check()){
							$cart_id = Carts::where('id_user', Auth::id())->pluck('id')->first(); 
						}
						else{
							$cart_id = Carts::where('session_id', Cookie::get('laravel_session'))->pluck('id')->first(); 
						}

						if($cart_id){
							$cart_items = Carts_items::where('id_cart', $cart_id)->get(); 
							foreach($cart_items as $cart_item){
								$id_items[] = $cart_item->id_item; 
							}
							$items = Items::whereIn('id', $id_items)->get(); 
						}

					@endphp

					<div class="modal fade" id="display_cart" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable">
							<div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
						  		<div class="modal-header">
									<h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Elements du panier</h1>
									<button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									@if($cart_id)
									<p>
										Les inforamtions ici presentes seront effacees d'ici 7 jours apres votre derniere mise a jour du panier.<br/> Cliquez sur le bouton suivant pour envoyer la commande
									</p>

									<a href="{{route('order', $cart_id)}}" class=" tw-max-w-0 tw-max-h-0"><button class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-purple-400 tw-mt-3 tw-text-white tw-py-[6px] tw-rounded-triple tw-text-[16px] tw-font-roboto tw-font-black tw-w-[50%] sm:tw-w-[40%] xl:tw-w-[200px] ">
										Commander
									</button></a>
							

									<ul class=" tw-mt-16">
									@foreach ($cart_items as $cart_item)
									@php
										$encoded_cart_item_id = base64_encode($cart_item->id); 
									@endphp
									<li class=" tw-mb-10">
										<div class=" tw-font-raleway tw-font-bold">
											@foreach ($items as $item )
											@if ($item->id == $cart_item->id_item)
												 @if($item->standard && $item->standard != 'null' && $item->standard != '')
													{{ ucfirst($item->name). '_'. $item->standard}}
												@else
													{{ ucfirst($item->name)}}
												@endif
											@endif
												
											@endforeach

										</div>

										<div>
											Quantite : {{$cart_item->quantity}} sacs
										</div>

										<div>
											<a href="{{route('cart_item-delete', $encoded_cart_item_id)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-red tw-mt-3 tw-text-white tw-py-[4px] tw-rounded-triple tw-text-[16px] tw-font-roboto tw-font-black tw-w-[50%] sm:tw-w-[40%] xl:tw-w-[200px] ">Supprimer</button></a>

										</div>
									</li>
								@endforeach
							</ul>

							@else
							<p>
								Le panier est vide
							</p>

							@endif
						  </div>
						</div>
					  </div>
					</div>
					
					<a href="{{route('profile')}}">
					@if (Auth::check() && auth()->user()->profile_photo != null)
						<img src="{{ asset("storage/". auth()->user()->profile_photo) }}" alt="" class=" tw-rounded-full">
					@else
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><g><path d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z"/></g></svg>

					@endif

					</a>
				</div>
			</div>
		</section>
	</header>
	
	<content>
		@include('layouts.notification')
		@yield('content')
	</content>
	
	<footer class="tw-bg-gray dark:tw-bg-blue tw-text-black dark:tw-text-white tw-py-[170px] md:tw-py-[150px] tw-relative tw-mt-[200px]">
		<section id="newsletter" class="tw-bg-black tw-text-white tw-absolute tw-top-[-110px] md:tw-top-[-85px] tw-h-[220px] md:tw-h-[170px] tw-rounded-double tw-py-[20px] md:tw-py-[35px] tw-px-[6%] sm:tw-px-[10%] md:tw-px-10 xl:tw-px-20 tw-flex tw-flex-col md:tw-flex-row tw-justify-between">
			<p class="tw-text-[18px]  md:tw-text-[27px] lg:tw-text-[30px] xl:tw-text-[35px] tw-w-[70%] lg:tw-w-full md:tw-w-[50%] tw-font-roboto">Rester à jour avec toutes les nouveautés que nous proposons</p>

			<form id="test-ajax" action="/test_ajax" class="tw-flex tw-flex-col tw-gap-3 md:tw-justify-between md:tw-w-[35%] lg:tw-w-[55%] tw-text-[15px] sm:tw-text-[17px]">
				<input type="text" name="newsletter" placeholder="Entrer votre e-mail" class="tw-px-5 tw-py-[6px] tw-rounded-double tw-text-black tw-outline-none">
				<button type="submit" class="tw-bg-white tw-text-black tw-py-[6px] tw-rounded-double">Abonnement au newsletter</button>
			</form>
		</section>

		<section class="tw-mb-10 tw-grid tw-grid-cols-2 sm:tw-grid-cols-3 tw-gap-16 lg:tw-flex lg:tw-gap-[75px] xl:tw-gap-[100px] tw-justify-between">
			<div class="tw-flex tw-flex-col tw-justify-between tw-col-span-2 md:tw-col-span-1">
				<p class="tw-font-roboto tw-tw-text-[35px] xl:tw-text-[40px]">SHOP.CO</p>
				<p class="tw-text-gray_text tw-text-[15px] xl:tw-text-[17px] tw-w-[85%] md:tw-w-full">Sur notre site, soit vous y trouverez le ciment que vous chercher soit vous serez le premier à le vendre</p>

				<div class="tw-flex tw-justify-between tw-w-[55%] md:tw-w-[60%] lg:tw-w-[45%] xl:tw-w-[40%] tw-gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 462.799"><path fill-rule="nonzero" d="M403.229 0h78.506L310.219 196.04 512 462.799H354.002L230.261 301.007 88.669 462.799h-78.56l183.455-209.683L0 0h161.999l111.856 147.88L403.229 0zm-27.556 415.805h43.505L138.363 44.527h-46.68l283.99 371.278z"/></svg>

					<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 509 507.14"><path fill-rule="nonzero" d="M509 254.5C509 113.94 395.06 0 254.5 0S0 113.94 0 254.5C0 373.86 82.17 474 193.02 501.51V332.27h-52.48V254.5h52.48v-33.51c0-86.63 39.2-126.78 124.24-126.78 16.13 0 43.95 3.17 55.33 6.33v70.5c-6.01-.63-16.44-.95-29.4-.95-41.73 0-57.86 15.81-57.86 56.91v27.5h83.13l-14.28 77.77h-68.85v174.87C411.35 491.92 509 384.62 509 254.5z"/></svg>

					<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M170.663 256.157c-.083-47.121 38.055-85.4 85.167-85.482 47.121-.092 85.407 38.029 85.499 85.159.091 47.13-38.047 85.4-85.176 85.492-47.112.09-85.399-38.039-85.49-85.169zm-46.108.092c.141 72.602 59.106 131.327 131.69 131.185 72.592-.14 131.35-59.089 131.209-131.691-.141-72.577-59.114-131.336-131.715-131.194-72.585.141-131.325 59.114-131.184 131.7zm237.104-137.092c.033 16.954 13.817 30.682 30.772 30.649 16.961-.034 30.689-13.811 30.664-30.765-.033-16.954-13.818-30.69-30.78-30.656-16.962.033-30.689 13.818-30.656 30.772zm-208.696 345.4c-24.958-1.086-38.511-5.234-47.543-8.709-11.961-4.628-20.496-10.177-29.479-19.093-8.966-8.951-14.532-17.461-19.202-29.397-3.508-9.033-7.73-22.569-8.9-47.527-1.269-26.983-1.559-35.078-1.683-103.433-.133-68.338.116-76.434 1.294-103.441 1.069-24.941 5.242-38.512 8.709-47.536 4.628-11.977 10.161-20.496 19.094-29.478 8.949-8.983 17.459-14.532 29.403-19.202 9.025-3.526 22.561-7.715 47.511-8.9 26.998-1.278 35.085-1.551 103.423-1.684 68.353-.133 76.448.108 103.456 1.294 24.94 1.086 38.51 5.217 47.527 8.709 11.968 4.628 20.503 10.145 29.478 19.094 8.974 8.95 14.54 17.443 19.21 29.413 3.524 8.999 7.714 22.552 8.892 47.494 1.285 26.998 1.576 35.094 1.7 103.432.132 68.355-.117 76.451-1.302 103.442-1.087 24.957-5.226 38.52-8.709 47.56-4.629 11.953-10.161 20.488-19.103 29.471-8.941 8.949-17.451 14.531-29.403 19.201-9.009 3.517-22.561 7.714-47.494 8.9-26.998 1.269-35.086 1.56-103.448 1.684-68.338.133-76.424-.124-103.431-1.294zM149.977 1.773c-27.239 1.286-45.843 5.648-62.101 12.019-16.829 6.561-31.095 15.353-45.286 29.603C28.381 57.653 19.655 71.944 13.144 88.79c-6.303 16.299-10.575 34.912-11.778 62.168C.172 178.264-.102 186.973.031 256.489c.133 69.508.439 78.234 1.741 105.548 1.302 27.231 5.649 45.827 12.019 62.092 6.569 16.83 15.353 31.089 29.611 45.289 14.25 14.2 28.55 22.918 45.404 29.438 16.282 6.294 34.902 10.583 62.15 11.777 27.305 1.203 36.022 1.468 105.521 1.336 69.532-.133 78.25-.44 105.555-1.734 27.239-1.302 45.826-5.664 62.1-12.019 16.829-6.585 31.095-15.353 45.288-29.611 14.191-14.251 22.917-28.55 29.428-45.404 6.304-16.282 10.592-34.904 11.777-62.134 1.195-27.323 1.478-36.049 1.344-105.557-.133-69.516-.447-78.225-1.741-105.522-1.294-27.256-5.657-45.844-12.019-62.118-6.577-16.829-15.352-31.08-29.602-45.288-14.25-14.192-28.55-22.935-45.404-29.429-16.29-6.304-34.903-10.6-62.15-11.778C333.747.164 325.03-.101 255.506.031c-69.507.133-78.224.431-105.529 1.742z"/></svg>

					<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 640 640"><path d="M319.988 7.973C143.293 7.973 0 151.242 0 327.96c0 141.392 91.678 261.298 218.826 303.63 16.004 2.964 21.886-6.957 21.886-15.414 0-7.63-.319-32.835-.449-59.552-89.032 19.359-107.8-37.772-107.8-37.772-14.552-36.993-35.529-46.831-35.529-46.831-29.032-19.879 2.209-19.442 2.209-19.442 32.126 2.245 49.04 32.954 49.04 32.954 28.56 48.922 74.883 34.76 93.131 26.598 2.882-20.681 11.15-34.807 20.315-42.803-71.08-8.067-145.797-35.516-145.797-158.14 0-34.926 12.52-63.485 32.965-85.88-3.33-8.078-14.291-40.606 3.083-84.674 0 0 26.87-8.61 88.029 32.8 25.512-7.075 52.878-10.642 80.056-10.76 27.2.118 54.614 3.673 80.162 10.76 61.076-41.386 87.922-32.8 87.922-32.8 17.398 44.08 6.485 76.631 3.154 84.675 20.516 22.394 32.93 50.953 32.93 85.879 0 122.907-74.883 149.93-146.117 157.856 11.481 9.921 21.733 29.398 21.733 59.233 0 42.792-.366 77.28-.366 87.804 0 8.516 5.764 18.473 21.992 15.354 127.076-42.354 218.637-162.274 218.637-303.582 0-176.695-143.269-319.988-320-319.988l-.023.107z"/></svg>
				</div>
			</div>

			@for ($i=0; $i < 4; $i++)
			<div class="">
				<h4>Compagnie</h4>

				<ul>
					<li><a href="#">A propos</a></li>
					<li><a href="#">Caracteristiques</a></li>
					<li><a href="#">Travaux</a></li>
					<li><a href="#">Carriere</a></li>
				</ul>
			</div>
			@endfor
		</section>

		<section id="ref" class="tw-border-t tw-border-gray_text tw-pt-6">
			{{-- L'id = ref est pour directement appliquer son width et son margin-left au div du newsletter --}}
			<p class="tw-text-center tw-text-[10px] sm:tw-text-[15px]">SHOP.CO © 2023 Ciment. Tous droits réservés.</p>
		</section>
	</footer>

	@php
		use App\Models\User; 

		$name = ''; 

		if(Auth::check()){
			$user = User::find(auth()->user()->id); 
			$last_name = $user->last_name;
			$first_name = $user->first_name;
			
			$name = ucfirst($last_name).'_'. ucfirst(substr($first_name, 0, 1)); 
		}
		else{
			$name = 'User'; 
		}
	@endphp

	{{-- <svg id="Layer_1" class=" tw-w-[40px] sm:tw-w-[60px] tw-fixed tw-bottom-4 tw-right-4 tw-z-20 tw-fill-gray_text" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.09" data-bs-toggle="modal" data-bs-target="#chatbot"><title>chat-bubble</title><path d="M63.08,0h.07C79.93.55,95,6.51,105.75,15.74c11,9.39,17.52,22.16,17.11,36.09v0a42.67,42.67,0,0,1-7.58,22.87A55,55,0,0,1,95.78,92a73.3,73.3,0,0,1-28.52,8.68,62.16,62.16,0,0,1-27-3.63L6.72,107.09,16.28,83a49.07,49.07,0,0,1-10.91-13A40.16,40.16,0,0,1,.24,45.55a44.84,44.84,0,0,1,9.7-23A55.62,55.62,0,0,1,26.19,8.83,67,67,0,0,1,43.75,2,74.32,74.32,0,0,1,63.07,0Zm24.18,42a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm-51.39,0a7.78,7.78,0,1,1-7.78,7.78,7.79,7.79,0,0,1,7.78-7.78Zm25.69,0a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm1.4-36h-.07A68.43,68.43,0,0,0,45.14,7.85a60.9,60.9,0,0,0-16,6.22A49.65,49.65,0,0,0,14.66,26.32,38.87,38.87,0,0,0,6.24,46.19,34.21,34.21,0,0,0,10.61,67,44.17,44.17,0,0,0,21.76,79.67l1.76,1.39L16.91,97.71l23.56-7.09,1,.38a56,56,0,0,0,25.32,3.6,67,67,0,0,0,26.16-8A49,49,0,0,0,110.3,71.36a36.86,36.86,0,0,0,6.54-19.67v0c.35-12-5.41-23.1-15-31.33C92.05,11.94,78.32,6.52,63,6.06Z"/></svg>

	<div class="modal fade chatbot" id="chatbot" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
		  <div class="modal-header">
			<h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Poser des questions</h1>
			<button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body tw-relative">
			<form action="{{ route('send_message')}}" method="post" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto" id="chatbot-form">
				@csrf
				<input type="hidden" name="name" id="name" value="{{ $name}}">
				<label for="question">Question</label>
				<input type="text" name="message" id="message" class=" tw-w-full tw-p-3" required>
				<button type="submit" class="tw-bg-purple-400 tw-mt-5 tw-text-white tw-py-[10px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Envoyer</button>
			</form>
			<button id="clear" class="tw-bg-green tw-mt-5 tw-text-white tw-py-[10px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">
				Clear
			</button>

			<div class=" chatbot_messages tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto tw-mt-16" id="chatbot_messages">
			</div>
		  </div>
		</div>
	  </div>
	</div> --}}
	
	<svg id="Layer_1" class=" tw-w-[40px] sm:tw-w-[45px] tw-fixed tw-bottom-4 tw-right-4 tw-z-20 tw-fill-gray_text" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.09" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><title>chat-bubble</title><path d="M63.08,0h.07C79.93.55,95,6.51,105.75,15.74c11,9.39,17.52,22.16,17.11,36.09v0a42.67,42.67,0,0,1-7.58,22.87A55,55,0,0,1,95.78,92a73.3,73.3,0,0,1-28.52,8.68,62.16,62.16,0,0,1-27-3.63L6.72,107.09,16.28,83a49.07,49.07,0,0,1-10.91-13A40.16,40.16,0,0,1,.24,45.55a44.84,44.84,0,0,1,9.7-23A55.62,55.62,0,0,1,26.19,8.83,67,67,0,0,1,43.75,2,74.32,74.32,0,0,1,63.07,0Zm24.18,42a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm-51.39,0a7.78,7.78,0,1,1-7.78,7.78,7.79,7.79,0,0,1,7.78-7.78Zm25.69,0a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm1.4-36h-.07A68.43,68.43,0,0,0,45.14,7.85a60.9,60.9,0,0,0-16,6.22A49.65,49.65,0,0,0,14.66,26.32,38.87,38.87,0,0,0,6.24,46.19,34.21,34.21,0,0,0,10.61,67,44.17,44.17,0,0,0,21.76,79.67l1.76,1.39L16.91,97.71l23.56-7.09,1,.38a56,56,0,0,0,25.32,3.6,67,67,0,0,0,26.16-8A49,49,0,0,0,110.3,71.36a36.86,36.86,0,0,0,6.54-19.67v0c.35-12-5.41-23.1-15-31.33C92.05,11.94,78.32,6.52,63,6.06Z"/></svg>

	<div class="offcanvas offcanvas-end dark:tw-bg-dark_blue dark:tw-text-white" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  		<div class="offcanvas-header tw-flex tw-flex-col">
			<div class=" tw-flex">
				<h5 class="offcanvas-title tw-font-raleway tw-font-bold tw-w-[80%] sm:tw-w-[70%]" id="offcanvasWithBothOptionsLabel">Ici, vous pouvez poser des questions a notre chatbot</h5>
				<button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>

			</div>

			<form action="{{ route('send_message')}}" method="post" class=" chatbot tw-flex tw-flex-col tw-w-[100%] tw-mx-auto tw-mt-[10px]" id="chatbot-form">
				@csrf
				<input type="hidden" name="name" id="name" value="{{ $name}}">
				<label for="question">Question</label>
				<input type="text" name="message" id="message" class=" tw-w-full tw-p-2" required>
				<button type="submit" class="tw-bg-green tw-mt-5 tw-text-white tw-py-[8px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[200px] tw-text-[16px] tw-font-roboto tw-font-black tw-outline-none">Envoyer</button>
			</form>

  		</div>
  		<div class="offcanvas-body scrollbar chatbot_messages tw-flex tw-flex-col" id="chatbot_messages">
  		</div>
	</div>

</body>

</html>