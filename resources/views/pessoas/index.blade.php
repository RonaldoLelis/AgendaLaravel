@extends('template.app')

@section('content')
<div>
    @foreach($pessoas as $pessoa)
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="{{url('images/sem-foto.jpg')}}" style= "width: 75px; padding: 5px" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $pessoa->nome }}</h5>
                @foreach($pessoa->telefone as $telefone)
                <p class="card-text"><strong>Telefone: </strong>({{ $telefone->ddd }}) {{ $telefone->telefone }}  </p>
                @endforeach
                <!--<p class="card-text"><small class="text-muted">Data de Cadastro: 00/00/0000</small></p>-->
            </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

