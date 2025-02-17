@extends('layouts.pages')

@section('title', 'Informations du profile')

@section('section_h1', 'Informations du profile')

@section('section_content')

<section id="profile-info" class=" tw-flex tw-flex-col tw-gap-y-5 tw-mt-4 tw-w-full md:tw-w-[90%] tw-mx-auto ">
    <div>
        <span>Nom de famille : </span> {{ auth()->user()->last_name }}
    </div>

    <div>
        <span>Prenom : </span>{{ auth()->user()->first_name }}
    </div>

    <div>
        <span>Email : </span>{{ auth()->user()->email }}
    </div>

    @if (auth()->user()->profile_photo)
    <div>
        <span>Photo de profile : </span>
        <img src="{{ asset('images/cropped_image_1.png')}}" alt="">
    </div>
        
    @endif

    <a href="{{ route('profile-edit', $id)}}"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black ">Modifier</button></a>

    @if (auth()->user()->seller)
    <a href="{{ route('profile-edit', auth()->user()->id)}}"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black ">Voir les posts</button></a>
        
    @endif

</section>

@endsection
