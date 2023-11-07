@extends('layout') 
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Editer un pouvoir</h3>
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
                            <form method="POST" action="{{ route('updateSkill', $skill->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="name" class="form-control" value="{{ $skill->name }}">
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
@endsection