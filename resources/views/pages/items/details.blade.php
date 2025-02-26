@extends('layouts.pages')

@section('title', 'Details')

@php
    $maj = ucfirst($item->name)
@endphp

@section('section_h1', "Details de $maj")

@section('section_content')
<section class=" info tw-flex tw-flex-col tw-gap-y-5 tw-mt-4 tw-w-full md:tw-w-[90%] tw-mx-auto ">
    <div><span>Nom : </span> {{ $maj }}</div>

    @if ($item->standard != 'null')
    <div><span>Standard : </span> {{ $item->standard }}</div>
        
    @endif

    <div><span> Description: </span>{{ $item->description }}</div>

    <div><span> Poids par sacs: </span>{{ $item->weight }}Kg</div>

    <div><span> Nombre de sacs disponible: </span>{{ $item->quantity }}</div>

    <div><span> Prix unitaire: </span>{{ $item->unity_price }}BIF</div>

    <div>
        <span> Images:</span>
        @foreach ($images as $image )
        @php
          $encoded_image_id = base64_encode($image->id); 
        @endphp
        <div class=" tw-flex tw-flex-col md:tw-flex-row tw-items-baseline md:tw-items-end tw-gap-y-2 md:tw-gap-x-2 tw-mb-6">
            <img src="{{ asset("storage/$image->path") }}" alt="" class=" tw-rounded-default tw-mt-3 tw-w-[80%] sm:tw-w-[450px]">
            <a href="{{ route('image-delete', $encoded_image_id) }}" class=""><button class=" tw-bg-red tw-text-white tw-text-[11px] sm:tw-text-[13px] tw-p-[2px] md:tw-p-1 tw-rounded-triple">supprimer</button></a>

        </div>

        @endforeach
        <button class=" tw-bg-green tw-text-white tw-p-[2px] md:tw-p-1 tw-text-[11px] sm:tw-text-[13px] tw-rounded-triple tw-mt-8 "  data-bs-toggle="modal" data-bs-target="#image_add_modal">Ajouter une image</button>

        {{-- Le modal d'ajout d'une image  --}}
      <div class="modal fade" id="image_add_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
            <div class="modal-header">
              <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter une image</h1>
              <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('image-add') }}" method="post" id="item-form" enctype="multipart/form-data">
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




    <div class=" tw-my-[50px]">
        <button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black " data-bs-toggle="modal" data-bs-target="#delete_modal">Effacer le poste</button>

        <div class="modal fade" id="delete_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
              <div class="modal-header">
                <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Modifier les elements</h1>
                <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('item-delete') }}" method="post" id="item-form" enctype="multipart/form-data" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
                  @csrf
                  <p>Etes-vous certain de vouloir supprimer ce post, toutes ses images seront supprimees ?</p>
  
                  <input type="hidden" name="id" value="{{ $item->id}}">

                  <button type="submit" class="tw-bg-red  tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[40%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[40%] xl:tw-w-[200px] tw-text-[16px] tw-font-roboto tw-font-black">Supprimer</button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>


        <button class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[75%] sm:tw-w-[50%] lg:tw-w-[25%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black " data-bs-toggle="modal" data-bs-target="#modif_modal">Modifier</button>

        <div class="modal fade" id="modif_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
              <div class="modal-header">
                <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Modifier les elements</h1>
                <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('item-update') }}" method="post" id="item-form" enctype="multipart/form-data" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
                  @csrf
  
                  <input type="hidden" name="id" value="{{ $item->id}}">

                  <label for="name">Nom*</label>
                  <input type="text" name="name" id="name" class=" tw-w-full tw-p-3" value="{{ $maj}}" required>
                  
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
  
                  <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>
</section>


@endsection