@extends('layouts.header')


@section('content')

<section class=" tw-bg-gray dark:tw-bg-blue tw-pt-[50px] tw-pb-[100px]"> 
    <div class=" tw-bg-white dark:tw-bg-dark_blue tw-p-[20px] sm:tw-p-[40px] tw-pb-[60px] tw-rounded-triple tw-flex tw-flex-col ">
        <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[20px] sm:tw-text-[25px]">@yield('section_h1')</h1>
        
        @yield('section_content')
    </div>
</section>

@endsection
