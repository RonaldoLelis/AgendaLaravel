@extends('template.app')

@section('content')

<style>
    .btn-action { padding: 5px; margin: 5px; float: right;}
</style>

<div>
    @foreach($pessoas as $pessoa)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{url('images/sem-foto.jpg')}}" style= "width: 75px; padding: 5px" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">{{ $pessoa->nome }}
                 <a href="{{ url("/pessoas/$pessoa->id/excluir") }}" class="btn btn-danger btn-action">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a> 
                <a href="{{ url("/pessoas/$pessoa->id/editar") }}" class="btn btn-primary btn-action">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
               
            </h5>
                @foreach($pessoa->telefone as $telefone)
                <p class="card-text"><strong>Telefone: </strong>({{ $telefone->ddd }}) {{ $telefone->telefone }}  </p>
                @endforeach                             
            </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

