@extends('layouts.pages')

@section('title', 'Informations du profile')

@section('section_h1', 'Informations du profile')

@section('section_content')

<section class="info tw-flex tw-flex-col tw-gap-y-5 tw-mt-4 tw-w-full md:tw-w-[90%] tw-mx-auto ">
    <div>
        <span>Nom de famille : </span> {{ ucfirst(auth()->user()->last_name) }}
    </div>

    <div>
        <span>Prenom : </span>{{ ucfirst( auth()->user()->first_name) }}
    </div>

    <div>
        <span>Email : </span>{{ auth()->user()->email }}
    </div>

    @if (auth()->user()->profile_photo)
    <div>
        <span>Photo de profile : </span>
        <img src="{{ asset('storage/'. auth()->user()->profile_photo)}}" alt="" class=" tw-rounded-default tw-mt-3 tw-w-full sm:tw-w-[500px]">
    </div>
        
    @endif

    <div>
        <a href="{{ route('profile-edit', $id)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black ">Modifier</button></a>
    
        @if (auth()->user()->seller)
        <a href="{{ route('items-list', $id)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] ">Voir les posts</button></a>
        @endif
        
        <a href="{{ route('logout')}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px]">Deconnexion</button></a>


        <a href="{{ route('logout')}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] ">Effacer le compte</button></a>

    </div>

</section>

@endsection
