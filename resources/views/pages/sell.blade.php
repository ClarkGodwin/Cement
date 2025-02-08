@extends('layouts.header')

@section('title', 'Buy cement')

@section('content')

<section class=" tw-bg-gray dark:tw-bg-blue tw-py-[100px]"> 
    <div class=" tw-bg-white dark:tw-bg-dark_blue tw-p-[20px] sm:tw-p-[40px] tw-pb-[60px] tw-rounded-triple tw-flex tw-flex-col tw-justify-center tw-items-center">
        <h1 class=" tw-text-center tw-font-raleway tw-font-black tw-text-[25px] sm:tw-text-[30px]">Vendez du ciment</h1>

        <form action="" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[80%] tw-mx-auto" method="POST" >
            <label for="ciment">Nom</label>
            <select name="ciment" id="ciment">
                @for ($i=0; $i < 4; $i++)
                <option value="1">ciment</option>
                @endfor
            </select>

            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>

            <label for="weight">Poids(en kg) par sac</label>
            <input type="number" name="weight" id="weight">

            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity">

        </form>
    </div>
</section>

@endsection
