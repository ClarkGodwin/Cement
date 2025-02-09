@extends('layouts.header')

@section('title', 'Formulaire')

@section('content')

<section class=" tw-bg-gray dark:tw-bg-blue tw-pt-[50px] tw-pb-[100px]"> 
    <div class=" tw-bg-white dark:tw-bg-dark_blue tw-p-[20px] sm:tw-p-[40px] tw-pb-[60px] tw-rounded-triple tw-flex tw-flex-col tw-justify-center tw-items-center">
        @if($errors->any())
        <div class=" alert alert-danger">
            <ul>
                @foreach ($errors->all as $error )
                <li>{{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[20px] sm:tw-text-[25px]">@yield('form_title')</h1>

        <form action="@yield('action')" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto" method="POST" >
            @csrf

            @yield('inputs')
            <button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black" type="submit">Soumettre</button>
        </form>
    </div>
</section>

@endsection