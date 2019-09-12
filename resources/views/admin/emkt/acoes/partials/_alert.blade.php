@if(isset($instituicoes))
    @foreach($instituicoes as $instituicao)
        @if(session('message-'.$instituicao->prefixo))
            <div class="alert alert-success" role="alert">
                {{ session('message-'.$instituicao->prefixo) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
@endif
