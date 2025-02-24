@extends('layouts.pages')

@section('title', 'Formulaire')

@section('section_h1', 'Connectez-vous')


@section('section_title', 'Formulaire')

@section('section_content')
@if($errors->any())
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
            
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('password.update')}}" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto" method="POST" enctype="multipart/form-data">
    @csrf

<input type="hidden" name="token" value="{{ $token}}">

<label for="email">Email</label>
<input type="email" name="email" id="email" value="{{ request('email')}}" required>
@error('email')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="password">Mot de passe</label>
<input type="password" name="password" id="password" required>
@error('password')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="confirm_password">Confirmer le mot de passe</label>
<input type="password" name="password_confirmation" id="password_confirmation" required>
    <button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black" type="submit">Soumettre</button>
</form>

@endsection
