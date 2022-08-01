@if(isset($retorno))
    <div class="alert alert-{{$retorno['class']}}" role="alert">
        {{$retorno['msg']}}
    </div>
@endif
