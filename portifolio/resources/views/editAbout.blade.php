@extends('layouts.layout')
@section('title', 'Editar About')
@section('content')

<x-dashboard.navbar/>

<div class="card w-75" style="width: 200px; margin-left: auto; margin-right: auto; margin-top: 90px">
    <div class="row no-gutters">
        <div class="cal-md-4 mt-4" style=" margin-left: auto; margin-right: auto;">
            <img src="{{Storage::url($list->patch)}}" alt="about" width="250px" height="250px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title" style="color: rgb(33,36,41);">About</h5>
                <form action="/update/about" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$list->id}}">
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea name="description" id="" cols="25" rows=4" class="form-control">{{$list->description}}</textarea>
                    </div>
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