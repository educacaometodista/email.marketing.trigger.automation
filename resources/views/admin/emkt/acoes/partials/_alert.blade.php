@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-success-'.$instituicao->prefixo))
            <div class="alert alert-success" role="alert">
                {{ session('message-success-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-danger-'.$instituicao->prefixo))
            <div class="alert alert-danger" role="alert">
                {{ session('message-danger-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

