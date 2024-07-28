@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="content d-flex justify-content-between align-items-center">
            <h2 class="py-3">Modifica progetto </h2>
            {{-- vai a index --}}
            <a href="{{ route('admin.projects.index') }}"><button class="btn btn-primary btn-sm">Torna ai
                    progetti</button></a>
        </div>
        {{-- includo errors.blade.php per mostrare errori --}}
        @include('shared.errors')

        {{-- form --}}
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">

            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="project-name" class="form-label">Nome progetto</label>
                <input type="text" class="form-control" id="project-name" name="name"
                    value="{{ old('name', $project->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea rows="4" type="text" class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- type form select --}}
            <div class="mb-3">
                <label for="type-content" class="form-label">Tipo di progetto:
                    {{ old('type_id', $project->type->name) }}</label>
                <select class="form-select" name="type_id">
                    <option value="">Nome progetto</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type->id) == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                    <option value="85">Tipo progetto non valido</option>

                </select>
            </div>

            {{-- tecnologie form check --}}

            <p>Tecnologie</p>
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $technology->id }}"
                        value="{{ $technology->id }}" name="technologies[]" {{-- se ci sono tecnologie selezionate le mostro altrimenti campo vuoto  --}}
                        {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tag-99" value="99" name="technologies[]">
                <label class="form-check-label" for="tag-99">non valido</label>
            </div>



            {{-- status form check --}}
            <div class="py-3 d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_corso" value="in corso"
                        {{ old('status', $project->status) == 'in corso' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_in_corso">
                        In corso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_completato" value="completato"
                        {{ old('status', $project->status) == 'completato' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_completato">
                        Completato
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_attesa" value="in attesa"
                        {{ old('status', $project->status) == 'in attesa' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_in_attesa">
                        In attesa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_cancellato" value="cancellato"
                        {{ old('status', $project->status) == 'cancellato' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_cancellato">
                        Cancellato
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifica progetto </button>
        </form>
    </div>
@endsection
