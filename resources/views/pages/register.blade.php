@extends('layouts.forms')

@section('form_title', 'Creer votre compte')

@section('action', "/register")

@section('inputs')
<label for="last_name">Nom de famille</label>
<input type="text" name="last_name" id="last_name" required>

<label for="first_name">Prenom</label>
<input type="text" name="first_name" id="first_name" required>

<label for="email">Email</label>
<input type="email" name="email" id="email" required>

<label for="password">Mot de passe</label>
<input type="password" name="password" id="password" required>

<label for="confirm_password">Confirmer le mot de passe</label>
<input type="password" name="password_confirmation" id="password_confirmation" required>

@endsection
