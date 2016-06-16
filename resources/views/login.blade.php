<form method="POST" action="{!! route('autenticar.store') !!} ">

    <label class="label" for="telefoneUsuario">telefone</label>
    <input id="telefoneUsuario" type="text" name="telefoneUsuario">

    <label class="label" for="password">senha</label>
    <input id="password" type="password" name="password">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit">entrar</button>

</form>

@if(Illuminate\Support\Facades\Session::has('flash_notice'))
    <div id="flash_notice">{{ Illuminate\Support\Facades\Session::get('flash_notice') }}</div>
@endif