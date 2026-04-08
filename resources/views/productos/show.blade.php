<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Producto
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="row">
                    <div class="col-md-4">
                        @if($producto->imagen)
                            <img src="{{ Storage::url($producto->imagen) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="img-fluid rounded">
                        @else
                            <div class="bg-secondary text-white p-5 text-center rounded">
                                Sin imagen
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $producto->nombre }}</h3>
                        <hr>
                        
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $producto->id }}
                        </div>
                        <div class="mb-3">
                            <strong>Descripción:</strong>
                            <p>{{ $producto->descripcion ?? 'Sin descripción' }}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Precio:</strong>
                                <p class="h4 text-success">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Stock:</strong>
                                <p class="h4">
                                    <span class="badge bg-{{ $producto->stock > 10 ? 'success' : ($producto->stock > 0 ? 'warning' : 'danger') }}">
                                        {{ $producto->stock }} unidades
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <strong>Estado:</strong>
                            <span class="badge bg-{{ $producto->activo ? 'success' : 'secondary' }}">
                                {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <strong>Fecha de creación:</strong>
                            {{ $producto->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div class="mb-3">
                            <strong>Última actualización:</strong>
                            {{ $producto->updated_at->format('d/m/Y H:i') }}
                        </div>
                        <hr>
                        <div class="d-flex gap-2">
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                                Volver al listado
                            </a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('¿Eliminar este producto?')"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
