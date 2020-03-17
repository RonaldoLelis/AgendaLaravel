@extends('template.app')

@section('content')
    <div class="col-md-8 well"> 
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                
                                                
                </div>
            </div><br>           
        <div class="col-md-6">
             
            
        </div>
        </div> 
        
        <div class="card border-danger mb-3" style="max-width: 36rem;">
            <div class="card-header">
                <h4>Deseja mesmo excluir esse Contato? </h4>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $pessoa->nome }} </h5>
              <p class="card-text">
                @foreach($pessoa->telefone as $telefone)
                <p class="card-text"><strong>Telefone: </strong>({{ $telefone->ddd }}) {{ $telefone->telefone }}  </p>
                @endforeach 
              </p>
                <a href="{{ url("pessoas/$pessoa->id/destroy") }}"><button style="margin-top: 5px; float: right" class="btn btn-danger" >Excluir</button></a>
                <a href="{{ url("pessoas") }}"><button style="margin: 5px; float: right" class="btn btn-info">Voltar</button></i></a>
            </div>
          </div>
    </div> 
@endsection