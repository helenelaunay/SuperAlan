@extends('layout')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3> Modifier un héros</h3>
                            <!-- Message d'information -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Formulaire -->
                            <form action="{{ route('updateHero', $hero->id) }}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="name" class="form-control" value="{{ $hero->name }}">
                                </div>
                                <div class="form-group input-group">
                                    <input type="file" class="form-control" name="image" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Choisir une image">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="inputGroupFileAddon04">Ajouter</button>
                                </div>
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input type="text" name="gender" class="form-control" value="{{ $hero->gender }}">
                                </div>
                                <div class="form-group">
                                    <label>Race</label>
                                    <input type="text" name="race" class="form-control" value="{{ $hero->race }}">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-text">Description</span>
                                    <textarea class="form-control" name="description" aria-label="description">{{ $hero->description }}</textarea>
                                </div>
                                <div class=" form-group input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Pouvoir</label>
                                    <select class="form-select" id="inputGroupSelect01" name="skill_id">
                                        @foreach ($skills as $skill)
                                        {{-- Si skill->id est égal à $hero->skill->id alors je rajoute l'attribut selected sinon je ne rajoute rien --}}
                                            <option {{ $skill->id == $hero->skill->id ? 'selected' : ''}} value="{{ $skill->id }}">{{ $skill->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm"> Ajouter un héros
                                </button>
                            </form>
                            <!-- Fin du formulaire -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
