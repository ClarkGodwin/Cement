@extends('layouts.forms')

@section('title', 'Formulaire')

@section('section_h1', 'Modifier les infos du profile')

@section('action', '/profile-update')

@section('form_id', 'profile-form')

@section('inputs')

<input type="hidden" name="id_user" value="{{$user->id}}">

<label for="last_name">Nom de famille</label>
<input type="text" name="last_name" value="{{$user->last_name}}" id="" required>

<label for="first_name">Prenom</label>
<input type="text" name="last_name" value="{{$user->first_name}}" id="" required>

<label for="email">Email</label>
<input type="email" name="email" value="{{$user->email}}" id="" required>

<label for="profile_photo">Photo de profile</label>
<input type="file" name="profile_photo" accept="image/*" id="profile_photo">

<input type="file" name="cropped_profile" id="croppedProfileInput" hidden>

<div id="profile-preview-container" class=" tw-mt-5"></div>

@endsection
