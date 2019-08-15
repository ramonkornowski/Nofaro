@extends('layouts.app')
@section('content')
  <pagina tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <painel titulo="Lista de Pessoas">


      <tabela-lista
      v-bind:titulos="['#','Nome','E-mail','DDD','Telefone']"
      v-bind:itens="{{json_encode($listaModelo)}}"
      ordem="asc" ordemcol="2"
      criar="#criar" detalhe="/admin/pessoas/" editar="/admin/pessoas/" deletar="/admin/pessoas/" token="{{ csrf_token() }}"
      modal="sim"

      ></tabela-lista>
      <div align="center">
        {{$listaModelo}}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('pessoas.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="ddd">DDD</label>
        <input type="number" class="form-control" id="ddd" name="ddd" placeholder="DDD" value="{{old('ddd')}}">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="number" class="form-control" id="telefone" placeholder="Telefone" name="telefone" value="{{old('telefone')}}">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/pessoas/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" v-model="$store.state.item.nome" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail">
      </div>
      <div class="form-group">
        <label for="ddd">DDD</label>
        <input type="number" class="form-control" id="ddd" name="ddd" v-model="$store.state.item.ddd" placeholder="DDD">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="number" class="form-control" id="telefone" name="telefone" v-model="$store.state.item.telefone" placeholder="Telefone">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
  <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
    <p>Nome: @{{$store.state.item.nome}}</p>
    <p>E-mail: @{{$store.state.item.email}}</p>
    <p>Telefone: @{{$store.state.item.ddd}} - @{{$store.state.item.telefone}}</p>
  </modal>

  <modal nome="deletar" v-bind:titulo="$store.state.item.name">
  <formulario id="formDeletar" v-bind:action="'/admin/pessoas/' + $store.state.item.id" method="delete" enctype="" token="{{ csrf_token() }}">
  <p>Você tem certeza que deseja deletar o usuário: <strong>@{{$store.state.item.nome}} </strong> ?</p>
  </formulario>
  <span slot="botoes">
    <button form="formDeletar" class="btn btn-danger">Deletar</button>
  </span>
  </modal>
@endsection
