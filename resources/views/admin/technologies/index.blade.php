@extends('layouts.app')

@section('page-title', 'Tutti le Tecnologie')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tecnologie
                    </h1>

                    <div>
                        <div class="mb-3">
                              <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100">
                               Aggiungi
                              </a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Creata il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach ($technologies as $technology)
                                     <tr>
                                    <th scope="row">{{ $technology->id }}</th>
                                    <td>{{ $technology->title }}</td>

                                    <td>{{ $technology->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $technology->created_at->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa tecnologia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
