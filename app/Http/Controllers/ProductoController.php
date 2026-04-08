<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->paginate(10);
        return view('productos.index', compact('productos'));
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'activo' => 'boolean'
        ]);
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')
                ->store('productos', 'public');
        }
        Producto::create($validated);
        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'activo' => 'boolean'
        ]);
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
        }
            $validated['imagen'] = $request->file('imagen')
                ->store('productos', 'public');
        $producto->update($validated);
        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }
    public function destroy(Producto $producto)
    {
        // Eliminar imagen si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        $producto->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente');
    }
}