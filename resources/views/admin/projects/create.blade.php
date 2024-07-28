@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="content d-flex justify-content-between align-items-center">
            <h2 class="py-3">Crea nuovo progetto </h2>
            {{-- vai a index --}}
            <a href="{{ route('admin.projects.index') }}"><button class="btn btn-primary btn-sm">Torna ai
                    progetti</button></a>
        </div>
        {{-- includo errors.blade.php per mostrare errori --}}
        @include('shared.errors')

        {{-- form --}}
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="project-name" class="form-label">Nome progetto</label>
                <input type="text" class="form-control" id="project-name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea rows="4" type="text" class="form-control" id="description" name="description"></textarea>
            </div>
            {{-- file input --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image</label>
                <input class="form-control" type="file" id="cover_image" name="cover_image">
            </div>
            {{-- type form select --}}
            <div class="mb-3">
                <label for="type-content" class="form-label">Tipo di progetto</label>
                <select class="form-select" name="type_id">
                    <option value="">Nome progetto</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach

                </select>
            </div>

            {{-- tecnologie form check --}}

            <p>Tecnologie</p>
            @foreach ($technologies as $technology)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $technology->id }}"
                        value="{{ $technology->id }}" name="technologies[]" {{-- se ci sono tecnologie selezionate le mostro altrimenti campo vuoto  --}}
                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tag-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
            @endforeach
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tag-99" value="99" name="technologies[]">
                <label class="form-check-label" for="tag-99">non valido</label>
            </div>



            {{-- status form check --}}

            <div class="py-3 d-flex gap-3">
                <p>Status</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_corso" value="in corso">
                    <label class="form-check-label" for="status_in_corso">
                        In corso
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_completato" value="completato">
                    <label class="form-check-label" for="status_completato">
                        Completato
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_in_attesa" value="in attesa"
                        checked>
                    <label class="form-check-label" for="status_in_attesa">
                        In attesa
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status_cancellato" value="cancellato">
                    <label class="form-check-label" for="status_cancellato">
                        Cancellato
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Crea progetto </button>
        </form>
    </div>
@endsection
