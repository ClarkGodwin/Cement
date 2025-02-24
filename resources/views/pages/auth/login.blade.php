@extends('layouts.forms')

@section('title', 'Formulaire')

@section('section_h1', 'Connectez-vous')

@section('action', "/login")

@section('inputs')

<label for="email">Email</label>
<input type="email" name="email" id="email">
@error('email')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="password">Mot de passe</label>
<input type="password" name="password" id="password">
@error('password')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

@endsection

@section('complements')
<button class="tw-bg-purple-400 tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black" data-bs-toggle="modal" data-bs-target="#mail">Mot de passe oublie ?</button>

<div class="modal fade" id="mail" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
      <div class="modal-header">
        <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter l'email pour acceder au formulaire de reinitialisation</h1>
        <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('password.email')}}" method="POST" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
          @csrf
          
          <label for="email">Email</label>
          <input type="email" name="email" class=" tw-w-full tw-p-3" required>

          <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>
          
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
