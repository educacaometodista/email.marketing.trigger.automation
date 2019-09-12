@if(session()->has('success'))
    <div class="alert alert-success in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Opa!</h4>
        {{ session()->get('warning') }}
    </div>
@endif

@if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Erro!</h4>
        {{ session()->get('danger') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4><i class="icon fa fa-ban"></i> Erro!</h4>
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>            
            @endforeach
        </ul>
    </div>
@endif