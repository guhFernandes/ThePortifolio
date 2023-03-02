<div class="justify-content-center align-items-center row">
    <div class="input-group mb-3 col-md-6 justify-content-center">
        <form action="/search/{{$service}}" method="POST" class="input-group mb-6 col-md-7 ">
            @csrf
            <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Recipient's username"
                aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
        
            </div>
        </form>
    </div>
</div>
@if (isset($result))
<div class="row">
    @foreach ($result as $key)
        <div class="card" style="width: 18rem; margin:20px;">
            <div class="card-body">
                <h5 class="card-title" style="text-transform: uppercase; color: rgb(33,36,41);">{{$service}}</h5>
                <p class="card-text">{{$key->description}}</p>
                <form action="/editar/{{$service}}" method="post" style="float: left; margin-right: 10%;">
                    @csrf
                    <input type="hidden" name="id" value="{{$key->id}}">
                    <button type="submit" class="btn btn-dark">Editar</button>
                </form>
                <form action="/deletar/{{$service}}" method="post" >
                    @csrf
                    <p></p>
                    <input type="hidden" name="id" value="{{$key->id}}">
                    <button type="submit" class="btn btn-dark">Remover</button>
                </form>
            </div>
        </div>
        <br>
    @endforeach
</div>
@endif

