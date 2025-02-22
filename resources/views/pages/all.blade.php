@extends('layouts.header')

@section('title', 'All')

@section('content')

<section>
    <div class=" tw-flex tw-flex-col tw-gap-8">
        <h1 class=" tw-font-raleway tw-font-black tw-text-black dark:tw-text-white tw-text-[30px] sm:tw-text-[45px] lg:tw-text-[52px] tw-text-center">Tous nos posts</h1>

        <p class=" tw-text-[13px] sm:tw-text-[17px] xl:tw-text-[20px]">
            Decouvrez notre large selection de haute qualite, concu pour repondre a tous vos besoins de construction et de renovation. Que vous soyez un professionnel du batiment ou un particlier, nous avont le ciment ideal pour vos projets
        </p>

    </div>
</section>

<section>
	<div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 tw-gap-y-[80px] tw-gap-x-[20px] tw-mt-[50px] ">
		@foreach ($items as $item)
			
		<div class=" tw-flex tw-flex-col tw-gap-[10px] tw-font-raleway tw-border tw-border-transparent tw-bg-gray dark:tw-bg-blue tw-py-8 tw-px-4 md:tw-px-6 tw-rounded-double">
			@foreach ($images_items as $image_item )
				@if ($image_item->id_item == $item->id)
				<img src="{{ asset("storage/".$image_item->path)}}" alt="Image" class=" tw-w-full tw-rounded-double">
				@break
					
				@endif
			
			@endforeach

			<h2 class=" tw-text-bold tw-font-black dark:tw-text-white tw-text-[15px] sm:tw-text-[17px] md:tw-text-[21px] tw-mt-[20px]l">
				@if ($item->standard != 'null' && $item->standard != '')
				{{ucfirst($item->name). '_'. ucfirst($item->standard)}}
				
				@else
				{{ucfirst($item->name)}}
					
				@endif

			</h2>

			<p class=" tw-font-bold">{{ $item->unity_price}} BIF</p>

			<div class=" tw-flex tw-items-center tw-gap-2">
				@php
					$user = App\Models\User::find($item->id_user);
				@endphp
				<img src="{{asset('storage/'. $user->profile_photo)}}" alt="" class=" tw-w-[15%] tw-rounded-full">
				<span class="  tw-font-semibold">
					{{ucfirst($user->last_name).'_'.ucfirst(substr($user->first_name, 0, 1)). '.'}}
				</span>
			</div>

			@php
				$encoded = base64_encode($item->id); 
			@endphp

			<a href="{{ Route('details', $encoded)}}" class=" tw-flex tw-justify-center tw-font-rroboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[50%]">
				Details
			</a>

			<button class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%]" data-bs-toggle="modal" data-bs-target="#cart_modal_{{$item->id}}">
				Ajouter au panier
			</button>

            <div class="modal fade" id="cart_modal_{{$item->id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter au panier pour preparer une commande</h1>
                    <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('carts_add') }}" method="post" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
                      @csrf

                      <input type="hidden" name="id" value="{{$item->id}}">

                      <label for="quantity">Nombre de sacs parmi ceux disponible</label>
                      <input type="number" name="quantity" id="quantity" class=" tw-w-full tw-p-3" min="1" max="{{$item->quantity}}" required>
      
                      <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>

		</div>
			
		@endforeach
	</div>
</section>

@endsection
