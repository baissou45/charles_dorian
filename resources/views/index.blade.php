@extends('layout.blanc')

@section('contenu')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1" style="height: 100vh">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">Faites vos recherches</h1>

                <h6 class="text-center">Platform de visualisation des données des établissements du supérieur</h6>

                <form method="get" action="{{ route('universites') }}" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1">

                        </span>

                        <input name="entreprise" type="search" class="form-control" id="keyword" placeholder="Nom ou id paysage de l'établissement" aria-label="Search">
                        <button type="submit" class="form-control">Rechercher</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection