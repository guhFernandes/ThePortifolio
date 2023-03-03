@extends('layouts.layout')
@section('title', 'Editar About')
@section('content')

<x-dashboard.navbar/>

<div class="card w-75" style="width: 200px; margin-left: auto; margin-right: auto; margin-top: 90px">
    <div class="row no-gutters">
        <div class="cal-md-4 mt-5" style=" margin-left: auto; margin-right: auto;">
            <img src="{{Storage::url($list->patch)}}" alt="portfolio" width="350px" height="250px">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title" style="color: rgb(33,36,41);">Service</h5>
                <form action="/update/portfolio" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="recipient-name" value="{{$list->title}}" name="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                            <option value="{{$list->type}}" >
                                @if($list->type == "front end")
                                    Front end
                                @elseif($list->type == "back end")
                                    Back end
                                @elseif($list->type == "banco de dados")
                                    Banco de dados
                                @elseif($list->type == "harking")
                                    harking
                                @endif
                            </option>
                            <option value="front end">Front end</option>
                            <option value="back end">Back end</option>
                            <option value="banco de dados">Banco de dados</option>
                            <option value="harking">harking</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" class="form-control" id="recipient-name" value="{{$list->url}}" name="url">
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