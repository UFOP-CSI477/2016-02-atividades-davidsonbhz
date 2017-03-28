@extends('layouts.dashboard')
@section('content')

@if(Auth::check())
   @if(Auth::user()->grupo == 1 || Auth::user()->grupo == 2)
      <a href="/usuarios/create" class="btn btn-primary fa fa-user-plus"> Adicionar </a>
   @endif
@endif

<style>

    .table-striped>tr:nth-child(odd){
        background-color:red;
    }
</style>

<h1>Usu&aacute;rios</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios as $e)

                    <tr>
                        <td>
                            {{$e->usuario}}
                        </td>
                        <td>
                            <a href="/usuarios/{{$e->usuario}}/edit">{{$e->nome}}</a>
                        </td>
                        <td>
                            {{$e->email}}
                        </td>
                        <td>
                            {{$e->status}}
                        </td>
                        <td>
                            <a href="/admin/grupos/{{$e->usuario}}"> Grupos </a>
                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>













@endsection
