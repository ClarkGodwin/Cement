@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')
@php
    $id_user = base64_encode($user->id); 
    $username = ucfirst($user->last_name) . '_' . ucfirst(substr($user->first_name, 0, 1));
@endphp

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">
    Details de l'utilisateur {{ $username}}
</h1>

<section class="details tw-mt-8 tw-flex tw-flex-col tw-gap-6">
    <div>
        <span>Nom de famille : </span>
        <span>{{ ucfirst($user->last_name)}}</span>
    </div>
    <div>
        <span>Prenom : </span>
        <span>{{ ucfirst($user->first_name)}}</span>
    </div>
    <div>
        <span>Email : </span>
        <span>{{ $user->email}}</span>
    </div>
    @if($user->profile_photo)
    <div>
        <span>Photo de profile : </span>
        <img src="{{ asset("storage/$user->profile_photo")}}" alt="" class="  tw-w-[250px] tw-mt-3 tw-rounded-default">
    </div>
    @endif
    <div>
        <span>Date de creation : </span>
        <span>{{ $user->created_at}}</span>
    </div>
    <div>
        <span>Mise a jour : </span>
        <span>{{ $user->updated_at}}</span>
    </div>

    <a href="{{ route('change-status', [$id_user, 'seller'])}}" class=" tw-w-0"><button class=" tw-bg-green tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple">
        @if ($user->seller)
            Seller
        @else
            Non seller
        @endif
    </button></a>

    <a href="{{ route('change-status', [$id_user, 'active'])}}" class=" tw-w-0"><button class=" tw-bg-emerald-400 tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple">
        @if ($user->active)
            Active
        @else
            Non active
        @endif
    </button></a>

    <a href="{{ route('change-status', [$id_user, 'admin'])}}" class=" tw-w-0"><button class=" tw-bg-purple-400 tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple">
        @if ($user->admin)
            Admin
        @else
            Non admin
        @endif
    </button></a>

    <button class=" tw-bg-red tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple" data-bs-toggle="modal" data-bs-target="#delete_account">
        Supprimer
    </button>

    <div class="modal fade" id="delete_account" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
          <div class="modal-header">
            <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Effacer le compte</h1>
            <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Etes-vous certain de vouloir effacer ce compte, toutes les donnees seront supprimees</p>
              <a href="{{ route('delete-account', [$id_user, true])}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] tw-font-roboto tw-font-black tw-w-[55%] sm:tw-w-[50%] xl:tw-w-[200px] ">Effacer le compte</button></a>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
