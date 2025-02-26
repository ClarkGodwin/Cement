@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('content')

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">Bienvenu Admin {{$username}}</h1>

<p class=" tw-text-[15px] sm:tw-text-[18px] md:tw-text-[20px] tw-mt-4">
    Nous sommes ravis de vous acceuillir sur votre tableau de bord! Ici, vous trouverez ce dont vous avez besoin pour gerer vos projets avec efficacite et clarte. Les fonctionnalites de cette partie de l'application ont ete concues pour rendre votre experience fluide et intuitive. <br><br>
    Les fonctionnalites disponibles sont les suivantes:
    <ol class=" tw-list-decimal tw-list-inside tw-text-[13px] sm:tw-text-[15px] md:tw-text-[17px] tw-mt-3 tw-flex tw-flex-col tw-gap-y-5 ">
        <li>
            Vous pouvez consulter les informations des utilisateur, les supprimer, modifier la photo de profile, en faire des admin ou pas et en faire des vendeurs ou pas. Pour cela, cliquez sur les boutons correspondants pour changer les status
        </li>

        <li>
            Vous pouvez consulter les posts, en supprimer les images ou supprimer les posts eux-memes mais pas les modifier en soi
        </li>

        <li>
            Vous pouvez egalement consulter les commandes effectuer par un client et les supprimer pour liberer de l'espace.
        </li>
    </ol>
</p>



@endsection
