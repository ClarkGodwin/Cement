@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">Liste des commandes</h1>

<div class=" tw-my-5">
    <ol class=" list-group list-group-numbered">
        @foreach ($orders as $order)
        <li class=" list-group-item  d-flex justify-content-between align-items-start tw-flex-row tw-gap-y-3 tw-p-5 dark:tw-bg-purple_blue dark:tw-text-white hover:tw-bg-gray dark:hover:tw-bg-dark_blue tw-cursor-pointer tw-ease-in-out tw-duration-700 tw-font-raleway">
            @php
                $id_order = base64_encode($order->id); 
                $user = App\Models\User::find($order->id_user); 
                $ordername = $order->updated_at. "_".$user->last_name;
            @endphp
            <a href="{{ route('order-details', $id_order)}}" class="ms-2 me-auto tw-text-[13px] md:tw-text-[15px] tw-w-full">
                <div class="fw-bold tw-text-[16px] sm:tw-text-[18px] tw-w-full tw-text-ellipsis">{{ ucfirst($ordername)}}</div>
            </a>
        </li>

        @endforeach

    </ol>
</div>

@endsection
