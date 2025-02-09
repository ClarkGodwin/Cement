@extends('layouts.forms')

@section('form_title', 'Vendez du ciment')

@section('action', 'test')

@section('inputs')
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

@endsection
