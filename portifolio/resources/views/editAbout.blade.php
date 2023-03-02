@extends('layouts.layout')
@section('title', 'Editar About')
@section('content')

<x-dashboard.navbar/>

<div class="card w-75">
    <div class="row no-gutters">
        <div class="cal-md-4">
            <img src="{{Storage::url($list->patch)}}" alt="about" width="250px" height="250px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">About</h5>
                <form action="/update/about" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$list->id}}">
                    <textarea name="description" id="" cols="25" rows=4" class="form-control">{{$list->description}}</textarea>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="patch" value="{{$list->patch}}">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem" aria-describedby="inputGroupFileAddon01">
                            <label for="inputGroupFile01" class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection