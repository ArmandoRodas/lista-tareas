<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Lista de Tareas</h1>
    <a href="{{ route('tareas.crear') }}" class="btn btn-primary mb-3">Crear Tarea</a>
    @foreach ($tareas as $tarea)
        <div class="card mb-3 {{ $tarea->deshabilitada ? 'bg-secondary text-white' : '' }}">
            <div class="card-body">
                <h5 class="card-title">{{ $tarea->titulo }}</h5>
                <p class="card-text">{{ $tarea->descripcion }}</p>
                <p class="card-text">
                    <strong>Completada:</strong> {{ $tarea->completada ? 'Sí' : 'No' }} |
                    <strong>Favorita:</strong> {{ $tarea->favorita ? 'Sí' : 'No' }}
                </p>
                <a href="{{ route('tareas.editar', $tarea->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('tareas.eliminar', $tarea->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Eliminar</button>
                </form>
                <form action="{{ route('tareas.completar', $tarea->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success">Marcar como {{ $tarea->completada ? 'Incompleta' : 'Completada' }}</button>
                </form>
                <form action="{{ route('tareas.favorita', $tarea->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-info">Marcar como {{ $tarea->favorita ? 'No Favorita' : 'Favorita' }}</button>
                </form>
                <form action="{{ route('tareas.deshabilitar', $tarea->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-secondary">Marcar como {{ $tarea->deshabilitada ? 'Habilitada' : 'Deshabilitada' }}</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
