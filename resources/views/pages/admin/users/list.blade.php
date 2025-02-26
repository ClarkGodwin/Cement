@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">Liste des utilisateurs</h1>

<div class=" tw-my-5">
    <ol class=" list-group list-group-numbered">
        @foreach ($users as $user)
        <li class=" list-group-item  d-flex justify-content-between align-items-start tw-flex-row tw-gap-y-3 tw-p-5 dark:tw-bg-purple_blue dark:tw-text-white hover:tw-bg-gray dark:hover:tw-bg-dark_blue tw-cursor-pointer tw-ease-in-out tw-duration-700 tw-font-raleway">
            @php
                $id_user = base64_encode($user->id); 
                $username = ucfirst($user->last_name) . '_' . ucfirst(substr($user->first_name, 0, 1));
            @endphp
            <a href="{{ route('user-details', $id_user)}}" class="ms-2 me-auto tw-text-[13px] md:tw-text-[15px] tw-w-full">
                <div class="fw-bold tw-text-[16px] sm:tw-text-[18px] tw-w-full tw-text-ellipsis">{{ ucfirst($username)}}</div>
                @if ($user->seller)
                    <span class="badge text-bg-secondary rounded-pill tw-font-wittgenstein">Seller</span>
                @endif
            </a>
            @if ($user->admin)
                <span class="badge text-bg-primary rounded-pill tw-font-wittgenstein">Admin</span>
            @endif
                
        </li>

        @endforeach

    </ol>
</div>

@endsection
