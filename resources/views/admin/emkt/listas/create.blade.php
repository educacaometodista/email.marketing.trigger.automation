@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar Lista de Contatos</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-darger" role="alert">
                        {{ session('message') }}
                        </div>
                    @endif
                    @include('admin.partials._alert')
                    <form action="{{ route('admin.listas.importar.store') }}" method="POST" enctype="multipart/form-data" class="col-md-8 mx-auto my-4">
                        @csrf
                        <label for="extension">Assunto</label><br>
                        <select name="subject" id="assunto" class="form-control mb-3" required><br>
                            <option></option>
                            <option value="ausentes">Ausentes</option>
                            <option value="inscritos-parciais">Inscritos Parciais</option>
                            <option value="lembrete-de-prova">Lembrete de Prova</option>
                        </select>
                        <label for="data-do-documento">Data do Documento</label><br>
                        <input type="date" name="date" id="data-do-documento" class="form-control mb-3" required>
                        <label for="arquivo">Arquivo</label><br>
                        <input name="import_file" type="file" id="arquivo" class="mb-3" required>
                        <input type="submit" class="btn btn-primary mb-3" value="Importar Lista">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
