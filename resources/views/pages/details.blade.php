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

            <span class=" tw-font-bold tw-text-[20px] lg:tw-text-[25px]">Poids par sac : {{ $item->weight }} Kg</span>

            <span class=" tw-font-bold tw-text-[20px] lg:tw-text-[25px]">Stock disponible : {{ $item->quantity }} sacs</span>

            <div class=" tw-flex  tw-items-center tw-gap-3">
            @php
              $user = App\Models\User::find($item->id_user);
              @endphp
              @if ($user->profile_photo)
                <img src="{{asset('storage/'. $user->profile_photo)}}" alt="" class=" tw-w-[10%] tw-rounded-full">
        
                @else
                <svg version="1.1" class=" tw-w-[10%]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><g><path d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z"/></g></svg>
                  
                @endif
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

                      <label for="quantity">Choisissez parmi le nombre de sacs disponibles</label>
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

                      <label for="quantity">Choisissez parmi le nombre de sacs disponibles</label>
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
