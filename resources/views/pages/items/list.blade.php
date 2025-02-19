@extends('layouts.pages')

@section('title', 'Liste des posts')

@section('section_h1', 'Liste des posts')

@section('section_content')

<div class=" tw-my-5">
    <ol class=" list-group list-group-numbered">
        @foreach ($items as $item)
        <li class=" list-group-item  d-flex justify-content-between align-items-start tw-flex-col sm:tw-flex-row tw-gap-y-3 tw-p-5 dark:tw-bg-dark_blue dark:tw-text-white hover:tw-bg-gray dark:hover:tw-bg-blue tw-cursor-pointer tw-ease-in-out tw-duration-700 tw-font-raleway">
            @php
                $id_item = base64_encode($item->id)
            @endphp
            <a href="{{ route('items-details', $id_item)}}" class="ms-2 me-auto tw-text-[13px] md:tw-text-[15px] tw-w-full">
                <div class="fw-bold tw-text-[16px] sm:tw-text-[18px] tw-w-full tw-text-ellipsis">{{ ucfirst($item->name)}}</div>
                {{ $item->updated_at}}
            </a>
            @if ($item->standard != 'null')
                <span class="badge text-bg-primary rounded-pill tw-font-wittgenstein">{{ $item->standard}}</span>
            @endif
                
        </li>

        @endforeach

    </ol>
</div>

@endsection
