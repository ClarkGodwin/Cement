@extends('layouts.forms')

@section('title', 'Formulaire')

@section('section_h1', 'Vendez du ciment')

@section('action', '/sell')

@section('form_id', 'sell-form')

@section('inputs')
<input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

<label for="name">Nom*</label>
<input type="text" name="name" id="name" required>

<label for="standard">Standard</label>
<input type="text" name="standard" id="standard" placeholder="Par exemple 42.5R pour buceco, vous pouvez ignorer ce champ">

<label for="description">Description*</label>
<textarea name="description" id="description" required></textarea>

<label for="weight">Poids(en kg) par sac*</label>
<input type="number" name="weight" id="weight" required>

<label for="quantity">Quantité *</label>
<input type="number" name="quantity" id="quantity" required>

<label for="unity_price">Prix unitaire*</label>
<input type="number" name="unity_price" id="unity_price" required>

<label for="images[]">Inserer une ou plusieurs images*</label>
<input type="file" name="images[]" id="images" accept="image/*" multiple>

<input type="file" name="croppedImages[]" id="croppedImagesInput" hidden multiple>

<div id="image-preview-container" class=" tw-mt-5"></div>

@endsection
