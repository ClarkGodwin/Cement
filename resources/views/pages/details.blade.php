@extends('layouts.header')

@section('title', 'Details')

@section('content')

<section class=" tw-pt-[50px] ">
    @php
        $i=0; 
    @endphp

    <div class=" tw-flex tw-flex-col md:tw-flex-row tw-justify-between tw-items-center md:tw-items-start tw-gap-y-12">
        <div id="carouselExampleIndicators" class="carousel slide tw-w-[90%] md:tw-w-[48%] lg:tw-w-[45%]">
            <div class="carousel-indicators">
                @foreach ($images as $image )
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" @php
                    if ($i == 0) {
                        echo 'class="active" aria-current="true"'; 
                    }
                @endphp aria-label="Slide {{ $i+1}}"></button>

                @php
                    $i++; 
                @endphp
                    
                @endforeach
            </div> 
            <div class="carousel-inner">
                @php
                    $i=0; 
                @endphp

                @foreach ($images as $image )
                <div class="carousel-item  @php
                    if ($i == 0) {
                        echo 'active';
                    }
                @endphp">
                  <img src="{{ asset('storage/'. $image->path)}}" class="d-block w-100 tw-rounded-default" alt="...">

                  @php
                      $i++; 
                  @endphp

                </div>
                    
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class=" tw-flex tw-flex-col tw-w-[90%] md:tw-w-[48%] lg:tw-w-[45%] tw-gap-3 lg:tw-gap-6"> 
            <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[25px] sm:tw-text-[30px] lg:tw-text-[40px]">
				@if ($item->standard != 'null' && $item->standard != '')
				{{ucfirst($item->name). '_'. ucfirst($item->standard)}}
				
				@else
				{{ucfirst($item->name)}}
					
				@endif

            </h1>

            <p class=" tw-text-[15px] lg:tw-text-[17px] tw-w-full sm:tw-w-[90%] md:tw-w-auto">{{ucfirst($item->description)}}</p>

            <span class=" tw-font-bold tw-text-[20px] lg:tw-text-[25px]">Prix : {{ $item->unity_price }} BIF</span>

            <div class=" tw-flex  tw-items-center tw-gap-3">
				@php
					$user = App\Models\User::find($item->id_user);
				@endphp
                <img src="{{ asset('storage/'. $user->profile_photo)}}" class=" tw-w-[10%] tw-rounded-full" alt="">
                <span>
                    {{ucfirst($user->last_name).'_'.ucfirst(substr($user->first_name, 0, 1)). '.'}}
                </span>
            </div>

            <button class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[12px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%] sm:tw-w-[50%] md:tw-w-[60%]" data-bs-toggle="modal" data-bs-target="#sell_modal">Acheter</button>

            <div class="modal fade" id="sell_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Effectuer un achat</h1>
                    <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('sold') }}" method="post" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
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

            <button class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[12px] tw-rounded-triple tw-mt-[10px] tw-font-black tw-w-[85%] sm:tw-w-[50%] md:tw-w-[60%]" data-bs-toggle="modal" data-bs-target="#cart-modal">Ajouter au panier</button>

            <div class="modal fade" id="cart-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
    </div>
</section>

@endsection
