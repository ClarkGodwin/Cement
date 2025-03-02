@extends('layouts.admin') 

@section('title', 'Dashboard') 

@section('admin_content')
@php
    $id_order = base64_encode($order->id); 
    $id_user = base64_encode($user->id); 
    $username = ucfirst($user->first_name). ' '. ucfirst($user->last_name); 
@endphp

<h1 class=" tw-font-raleway tw-font-black tw-text-center tw-text-[23px] sm:tw-text-[25px] md:tw-text-[30px]">
    Details de la commande
</h1>

<section class="details tw-mt-8 tw-flex tw-flex-col tw-gap-6">
    <div>
        <span>Date de la commande : </span>
        <span>{{ $order->created_at}}</span>
    </div>
    <div>
        <span>Auteur de la commande : </span>
        <span><a href="{{ route('user-details', $id_user)}}" class=" tw-underline hover:tw-no-underline">{{ ucfirst($username)}}</a></span>
    </div>

    <h3>Ciments de la commande : </h3>
    <ol class=" list-group list-group-numbered">
        @foreach ($order_items as $order_item)
        @php
            $item = App\Models\Items::find($order_item->id_item); 
            $id_item = base64_encode($item->id); 
            if($item->standard != 'null' && $item->standard != ''){
                $itemname = ucfirst($item->name). " de standard $item->standard"; 
            }
            else{
                $itemname = ucfirst($item->name); 
            }
        @endphp
        <li class=" list-group-item  d-flex justify-content-between align-items-start tw-flex-row tw-gap-y-3 tw-p-5 dark:tw-bg-purple_blue dark:tw-text-white hover:tw-bg-gray dark:hover:tw-bg-dark_blue tw-cursor-pointer tw-ease-in-out tw-duration-700 tw-font-wittgenstein">
            @php
                $id_order = base64_encode($order->id); 
                $user = App\Models\User::find($order->id_user); 
                $ordername = $order->updated_at. "_".$user->last_name;
            @endphp
            <a href="{{ route('item-details', $id_item)}}" class="ms-2 me-auto tw-text-[13px] md:tw-text-[15px] tw-w-full">
                <div class="fw-bold tw-text-[16px] sm:tw-text-[18px] tw-w-full tw-text-ellipsis">{{ ucfirst($itemname)}} , {{ $order_item->quantity}} sacs dans la commande</div>
            </a>
        </li>

        @endforeach

    </ol>

    <button class=" tw-bg-red tw-text-white tw-w-[120px] tw-p-1 tw-rounded-triple" data-bs-toggle="modal" data-bs-target="#delete_account">
        Supprimer
    </button>

    <div class="modal fade" id="delete_account" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
          <div class="modal-header">
            <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Effacer la commande</h1>
            <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Etes-vous certain de vouloir effacer cette commande</p>
              <a href="{{ route('order-delete', $id_order)}}" class=" tw-max-w-0 tw-max-h-0"><button class="tw-bg-red tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-text-[16px] tw-font-roboto tw-font-black tw-w-[55%] sm:tw-w-[50%] xl:tw-w-[200px] ">Effacer la commande</button></a>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
