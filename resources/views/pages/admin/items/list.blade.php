@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">Liste des items</h1>

<div class=" tw-my-5">
    <ol class=" list-group list-group-numbered">
        @foreach ($items as $item)
        @php
            $id_item = base64_encode($item->id); 
            if ($item->standard != 'null' && $item->standard != ''){
                $itemname = ucfirst($item->name) . '_' . ucfirst($item->standard);
                
            }
            else{
                $itemname = ucfirst($item->name);
            }
                
        @endphp
        <a href="{{ route('item-details', $id_item)}}"><li class=" list-group-item  d-flex justify-content-between align-items-start tw-flex-row tw-gap-y-3 tw-p-5 dark:tw-bg-purple_blue dark:tw-text-white hover:tw-bg-gray dark:hover:tw-bg-dark_blue tw-cursor-pointer tw-ease-in-out tw-duration-700 tw-font-raleway">
            <div class="ms-2 me-auto tw-text-[13px] md:tw-text-[15px] tw-w-full">
                <div class="fw-bold tw-text-[16px] sm:tw-text-[18px] tw-w-full tw-text-ellipsis">{{ ucfirst($itemname)}}</div>
                <span class="badge text-bg-secondary rounded-pill tw-font-wittgenstein">{{ $item->updated_at}}</span>
            </div>
            @if ($item->quantity > 0)
                <span class="badge text-bg-primary rounded-pill tw-font-wittgenstein">Disponible</span>
            @else
                <span class="badge text-bg-danger rounded-pill tw-font-wittgenstein">Indisponible</span>
            @endif
        </li></a>

        @endforeach

    </ol>
</div>

@endsection
