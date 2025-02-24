@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('content')
@php
    $id_user = base64_encode($user->id); 
    $username = ucfirst($user->last_name) . '_' . ucfirst(substr($user->first_name, 0, 1));
@endphp

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">
    Details de l'utilisateur {{ $username}}
</h1>

@endsection
