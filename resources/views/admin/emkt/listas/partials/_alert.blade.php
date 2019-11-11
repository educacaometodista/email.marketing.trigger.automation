@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-success-lista-'.$instituicao->prefixo))
            <div class="alert alert-success" role="alert">
                {{ session('message-success-lista-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-danger-lista-'.$instituicao->prefixo))
            <div class="alert alert-danger" role="alert">
                {{ session('message-danger-lista-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif