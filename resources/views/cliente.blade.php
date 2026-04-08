<h1>Gestion de cliente</h1>

@foreach ($clientes as $c)
    {{$c->nombre_apellido}}
    {{$c->cedula}}
    {{$c->direccion}}
    {{$c->telefono}}

    <form method="post" action="{{url('/borrarcliente/'.$c->id)}}">
        @csrf
        {{method_field('DELETE')}}
        <button type="submit">Borrar ❌  </button>
   </form>
    <br>
@endforeach