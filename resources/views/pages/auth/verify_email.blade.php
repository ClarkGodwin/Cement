@extends('layouts.header')

@section('title', 'Email_verification')

@section('content')

<section class=" tw-bg-gray dark:tw-bg-blue tw-pt-[50px] tw-pb-[100px]"> 
    <div class=" tw-bg-white dark:tw-bg-dark_blue tw-p-[20px] sm:tw-p-[40px] tw-pb-[60px] tw-rounded-triple">
        <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[20px] sm:tw-text-[35px] tw-mb-10">Verifier votre email</h1>

        @if(session('message'))
        <div class=" alert alert-success">
            {{ session('message')}}
        </div>
        @endif

        <p class=" tw-text-[11px] sm:tw-text-[13px] md:tw-text-[17px]">Avant de continuer, verifier votre boite mail pour le lien de validation du compte. <br/>Si vous n'en avez pas recu, cliquer sur le bouton en dessous pour en recevoir un autre.</p>

        <form action="{{route('verification.resend')}}" method="post">
            @csrf
            <button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[68%] sm:tw-w-[55%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[11px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black" type="submit">Renvoie du lien de validation</button>
        </form>
    </div>
</section>

@endsection
