@extends('layouts.app')

@section('content')
  <pagina tamanho="10">
    <painel titulo="Dashboard">

      <div class="row">
        <div class="col-md-4">
          <caixa titulo="Pessoas" url="{{route('pessoas.index')}}" cor="blue"></caixa>
        </div>
      </div>
    </painel>

  </pagina>
@endsection
