@extends('layouts.forms')

@section('title', 'Formulaire')

@section('section_h1', 'Creer votre compte')

@section('action', "/register")

@section('inputs')
<label for="last_name">Nom de famille</label>
<input type="text" name="last_name" id="last_name" required>
@error('name')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="first_name">Prenom</label>
<input type="text" name="first_name" id="first_name" required>
@error('name')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="email">Email</label>
<input type="email" name="email" id="email" required>
@error('email')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="password">Mot de passe</label>
<input type="password" name="password" id="password" required>
@error('password')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="confirm_password">Confirmer le mot de passe</label>
<input type="password" name="password_confirmation" id="password_confirmation" required>

@endsection
