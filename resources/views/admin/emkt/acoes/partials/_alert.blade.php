@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-success-acao-'.$instituicao->prefixo))
            <div class="alert alert-success" role="alert">
                {{ session('message-success-acao-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-danger-acao-'.$instituicao->prefixo))
            <div class="alert alert-danger" role="alert">
                {{ session('message-danger-acao-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-success-sms-'.$instituicao->prefixo))
            <div class="alert alert-success" role="alert">
                {{ session('message-success-sms-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-danger-sms-'.$instituicao->prefixo))
            <div class="alert alert-danger" role="alert">
                {{ session('message-danger-sms-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif

