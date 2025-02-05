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
		@for ($i = 0; $i < 12; $i++)
		<div class=" tw-flex tw-flex-col tw-gap-[10px] tw-font-raleway tw-border tw-border-transparent tw-bg-gray dark:tw-bg-blue tw-py-8 tw-px-4 md:tw-px-6 tw-rounded-double">
			<img src="{{ asset('images/cropped_image_1.png')}}" alt="" class=" tw-w-full tw-rounded-double">

			<h2 class=" tw-text-bold tw-font-black dark:tw-text-white tw-text-[15px] sm:tw-text-[17px] md:tw-text-[21px] tw-mt-[20px]">Skinny feat jean</h2>

			<p class=" tw-font-bold">100000 BIF</p>

			<div class=" tw-flex tw-items-center tw-gap-2">
				<img src="{{asset('images/cropped_image_1.png')}}" alt="" class=" tw-w-[15%] tw-rounded-full">
				<span class="  tw-font-semibold">Username</span>
			</div>

			<a href="{{ Route('details')}}" class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[50%]">
				Details
			</a>

			<a href="#" class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%]">
				Ajouter au panier
			</a>

		</div>
			
		@endfor
	</div>
</section>

@endsection
