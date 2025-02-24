@extends('layouts.pages')

@section('section_title', 'Formulaire')

@section('section_content')
@if($errors->any())
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
            
        @endforeach
    </ul>
</div>
@endif

<form action="@yield('action')" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto" method="POST" enctype="multipart/form-data" id="@yield('form_id')">
    @csrf

    @yield('inputs')
    <button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black" type="submit">Soumettre</button>
</form>

<div>
    @yield('complements')
</div>

@endsection