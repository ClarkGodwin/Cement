@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')
@php
    $id_item = base64_encode($item->id); 
    if ($item->standard != 'null' && $item->standard != ''){
        $itemname = ucfirst($item->name) . '_' . ucfirst($item->standard);
        
    }
    else{
        $itemname = ucfirst($item->name);
    }
@endphp
@if($errors->any())
<div class=" alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
            
        @endforeach
    </ul>
</div>
@endif

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">
    Details de l'item {{ $itemname}}
</h1>

<section class="details tw-mt-8 tw-flex tw-flex-col tw-gap-8">
    <div>
      <span>Auteur : </span>
      <span>{{ $username}}</span>
    </div>
    <div>
        <span>Nom : </span>
        <span>{{ ucfirst($item->name)}}</span>
    </div>
    @if ($item->standard != 'null' && $item->standard != '')
    <div>
        <span>Standard : </span>
        <span>{{ ucfirst($item->standard)}}</span>
    </div>
        
    @endif
    <div>
        <span>Description : </span>
        <span class=" tw-font-semibold">{{ $item->description}}</span>
    </div>
    <div>
        <span>Poids par sac : </span>
        <span>{{ $item->weight}} Kg</span>
    </div>
    <div>
        <span>Nombre de sacs disponibles : </span>
        <span>{{ $item->quantity}} sacs</span>
    </div>
    <div>
        <span>Prix par sac : </span>
        <span>{{ $item->unity_price}} BIF</span>
    </div>
    <div>
        <span>Images : </span>
        @foreach ($images as $image )
        @php
          $encoded_image_id = base64_encode($image->id); 
        @endphp
        <div class=" tw-flex tw-flex-col md:tw-flex-row tw-items-baseline md:tw-items-end tw-gap-y-2 md:tw-gap-x-2 tw-mb-3">
            <img src="{{ asset("storage/$image->path") }}" alt="" class=" tw-w-[250px] tw-mt-3 tw-rounded-default">
            <a href="{{ route('image-delete', [$encoded_image_id, true]) }}" class=""><button class=" tw-bg-red tw-text-white tw-text-[11px] sm:tw-text-[13px] tw-p-[2px] md:tw-p-1 tw-rounded-triple">supprimer</button></a>

        </div>
        @endforeach
        <button class=" tw-bg-green tw-text-white tw-p-[2px] md:tw-p-1 tw-text-[11px] sm:tw-text-[13px] tw-rounded-triple "  data-bs-toggle="modal" data-bs-target="#image_add_modal">Ajouter une image</button>

        {{-- Le modal d'ajout d'une image  --}}
      <div class="modal fade" id="image_add_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
            <div class="modal-header">
              <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter une image</h1>
              <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('image-add', true) }}" method="post" id="item-form" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id_item" value="{{ $item->id}}">

                <input type="file" name="item_photo" accept="image/*" id="item_photo" class=" tw-w-full tw-p-3" required>
                
                <input type="file" name="cropped_item" id="croppeditemInput" hidden>
                
                <div id="item-preview-container" class=" tw-my-5 tw-px-4"></div>

                <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[40%] xl:tw-w-[200px] tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
        <span>Date de creation : </span>
        <span>{{ $item->created_at}}</span>
    </div>
    <div>
        <span>Mise a jour : </span>
        <span>{{ $item->updated_at}}</span>
    </div>

    <button class=" tw-bg-emerald-400 tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple" data-bs-toggle="modal" data-bs-target="#modif_modal">
        Modifier
    </button>
    <div class="modal fade" id="modif_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
          <div class="modal-header">
            <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Modifier les elements</h1>
            <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <form action="{{ route('item-update', true) }}" method="post" id="item-form" enctype="multipart/form-data" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
              @csrf

              <input type="hidden" name="id" value="{{ $item->id}}">

              <label for="name">Nom*</label>
              <input type="text" name="name" id="name" class=" tw-w-full tw-p-3" value="{{ $item->name}}" required>
              
              <label for="standard">Standard</label>
              <input type="text" name="standard" id="standard" class=" tw-w-full tw-p-3" placeholder="Par exemple 42.5R pour buceco, vous pouvez ignorer ce champ" @if ($item->standard != 'null' && $item->standard != '')
                {{ "value=$item->standard" }}
              @endif>
              
              <label for="description">Description*</label>
              <textarea name="description" id="description" class=" tw-w-full tw-p-3" required>{{$item->description}}</textarea>
              
              <label for="weight">Poids(en kg) par sac*</label>
              <input type="number" name="weight" class=" tw-w-full tw-p-3" id="weight" value="{{$item->weight}}" required>
              
              <label for="quantity">Quantité *</label>
              <input type="number" name="quantity" class=" tw-w-full tw-p-3" id="quantity" value="{{$item->quantity}}" required>
              
              <label for="unity_price">Prix unitaire*</label>
              <input type="number" name="unity_price" class=" tw-w-full tw-p-3" id="unity_price" value="{{$item->unity_price}}" required>

              <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[40%] xl:tw-w-[200px] tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>


    <button class=" tw-bg-red tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple" data-bs-toggle="modal" data-bs-target="#delete_item">
        Supprimer
    </button>

    <div class="modal fade" id="delete_item" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
          <div class="modal-header">
            <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Effacer l' element</h1>
            <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Etes-vous certain de vouloir effacer cet item, toutes les donnees seront supprimees</p>
              <form action="{{ route('item-delete', true)}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id}}">
                
                <button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] tw-font-roboto tw-font-black tw-w-[55%] sm:tw-w-[50%] xl:tw-w-[200px] ">Effacer l'item</button>
              </form>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
