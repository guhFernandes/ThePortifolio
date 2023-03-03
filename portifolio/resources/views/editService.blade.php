@extends('layouts.layout')
@section('title', 'Editar About')
@section('content')

<x-dashboard.navbar/>

<div class="card w-75" style="width: 200px; margin-left: auto; margin-right: auto; margin-top: 90px">
    <div class="row no-gutters">
        <div class="cal-md-4">
            <img src="{{Storage::url($list->icon)}}" alt="service" width="350px" height="250px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title" style="color: rgb(33,36,41);">Service</h5>
                <form action="/update/service" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="recipient-name" value="{{$list->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea name="description" id="" cols="25" rows=4" class="form-control">{{$list->description}}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$list->id}}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="hidden" name="patch" value="{{$list->icon}}">
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