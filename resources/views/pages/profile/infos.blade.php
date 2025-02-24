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
        <div class=" tw-flex tw-items-end tw-gap-x-2">
          <img src="{{ asset('storage/'. auth()->user()->profile_photo)}}" alt="" class=" tw-rounded-default tw-mt-3 tw-w-full sm:tw-w-[500px]">
          <a href="{{ route('profile-photo-delete')}}"><button class=" tw-bg-red tw-text-white tw-font-black tw-text-[13px] tw-p-1 tw-rounded-triple">Supprimer</button></a>

        </div>
    </img>
        
    @endif

    <div>
        @php
            $encoded = base64_encode(auth()->user()->id); 
        @endphp

        <a href="{{ route('profile-edit', $id)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black ">Modifier</button></a>
    
        @if (auth()->user()->seller)
        <a href="{{ route('items-list', $id)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] ">Voir les posts</button></a>
        @endif

        @if (!auth()->user()->email_verified_at)
        <a href="{{route('verification.notice')}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] ">Renvoie du lien de validation</button></a>
        @endif
        
        <a href="{{ route('logout')}}" class=" tw-max-w-0 tw-max-h-0"><button class=" tw-bg-purple-400 tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px]">Deconnexion</button></a>


        <button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] " data-bs-toggle="modal" data-bs-target="#delete_account">Effacer le compte</button>

        <div class="modal fade" id="delete_account" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
              <div class="modal-header">
                <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Modifier les elements</h1>
                <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p>Etes-vous certain de vouloir effacer ce compte, toutes les donnees seront supprimees</p>
                  <a href="{{ route('delete-account', $encoded)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[55%] sm:tw-w-[50%] xl:tw-w-[300px] ">Effacer le compte</button></a>
              </div>
            </div>
          </div>
        </div>
    
        @if (auth()->user()->admin)
        <a href="{{ route('dashboard')}}" id="dashboard" class=" dashboard tw-max-w-0 tw-max-h-0"><button class="tw-bg-green tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px]">Dashboard</button></a>
        @endif

    </div>

</section>

@endsection
