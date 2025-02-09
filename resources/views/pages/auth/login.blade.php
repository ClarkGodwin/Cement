@extends('layouts.forms')

@section('form_title', 'Connectez-vous')

@section('action', "/login")

@section('inputs')

<label for="email">Email</label>
<input type="email" name="email" id="email">
@error('email')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="password">Password</label>
<input type="password" name="password" id="password">
@error('password')<span class=" tw-text-red tw-mt-1">{{ $message}}</span>@enderror

<label for="remember"><input type="checkbox" name="remember" id="remember" class=" tw-w-auto tw-mr-2">Se souvenir de moi</label>


@endsection
