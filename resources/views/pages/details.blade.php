@extends('layouts.header')

@section('title', 'Details')

@section('content')

<section class=" tw-pt-[50px] ">
    <div class=" tw-flex tw-flex-col md:tw-flex-row tw-justify-between tw-items-center md:tw-items-start tw-gap-y-12">
        <div id="carouselExampleIndicators" class="carousel slide tw-w-[90%] md:tw-w-[48%] lg:tw-w-[45%]">
            <div class="carousel-indicators">
                @for ($i=0; $i < 5; $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" @php
                    if ($i == 0) {
                        echo 'class="active" aria-current="true"'; 
                    }
                @endphp aria-label="Slide {{ $i+1}}"></button>
                    
                @endfor
            </div> 
            <div class="carousel-inner">
                @for ($i=0; $i < 5; $i++)
                <div class="carousel-item  @php
                    if ($i == 0) {
                        echo 'active';
                    }
                @endphp">
                  <img src="{{ asset('images/cropped_image_1.png')}}" class="d-block w-100" alt="...">
                </div>
                    
                @endfor
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
            <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[25px] sm:tw-text-[30px] lg:tw-text-[40px]">Skinny feat jean</h1>

            <p class=" tw-text-[15px] lg:tw-text-[17px] tw-w-full sm:tw-w-[90%] md:tw-w-auto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus inventore laborum quasi doloremque tempora recusandae labore assumenda accusantium ipsam accusamus magnam provident maxime, officiis aliquam sit quas. Architecto, asperiores. Quia?</p>

            <span class=" tw-font-bold tw-text-[20px] lg:tw-text-[25px]">Prix : 100000 BIF</span>

            <a href="#" class=" tw-flex  tw-items-center tw-gap-3">
                <img src="{{ asset('images/cropped_image_1.png')}}" class=" tw-w-[10%] tw-rounded-full" alt="">
                <span>Nom d'utilisateur</span>
            </a>

            <a href="#" class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%] sm:tw-w-[50%] md:tw-w-[85%]">Acheter</a>

            <a href="#" class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%] sm:tw-w-[50%] md:tw-w-[85%]">Ajouter au panier</a>
        </div>
    </div>
</section>

@endsection
