@extends('layout.blanc')

@section('contenu')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <form method="get" class="custom-form mt-4 pt-2 mb-lg-0" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1"></span>

                        <input name="entreprise" type="search" class="form-control" id="keyword" placeholder="Nom ou id paysage de l'établissement" aria-label="Search" value="{{ request()->entreprise ?? '' }}">
                        <button type="submit" class="form-control mx-2">Rechercher</button>
                        {{-- <button type="submit" class="form-control">Rechercher</button> --}}
                    </div>

                </form>
            </div>

            <div class="row">

                <div class="offset-9 col-3 my-3">
                    <div class="form-group">
                        <select id="trie" class="form-control" name="trie">
                            <option>Trie ...</option>
                            <option value="nom_croiss">Nom croissant</option>
                            <option value="nom_decroiss">Nom décroissant</option>
                            <option value="id_croiss">Id paysage croissant</option>
                            <option value="id_decroiss">Id paysage décroissant</option>
                        </select>
                    </div>
                </div>

                @foreach ($universites as $univ)
                    <div class="col-md-6 p-2">
                        <a href="{{ route('universites.show', $univ->id) }}"  class="w-100">
                            <div class="card-header">
                                <div style="position: relative" class="p-0">
                                    <img src="{{ asset('bg.jpg') }}" class="w-100 p-0 m-0" style="height: 250px">
                                    <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0,0,0,0.6)"></div>
                                    <div class="d-flex justify-content-center text-center px-3" style="position: absolute; top: 40%; bottom: 0; left: 0; right: 0;">
                                        <h6 class="position-absolute text-white" style="top: 0"> {{ $univ->uo_lib }} <br> ( {{ $univ->etablissement_id_paysage }} ) </h6>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="card">
                            <div class="card-body" style="height: 150px">
                                <p class="card-text">
                                    <ul class="list-unstyled">
                                        <li> Secteur : {{ $univ->secteur_d_etablissement }}</li>
                                        <li> Localisation : {{ explode('>', $univ->localisation)[1] . ' ( ' .  explode('>', $univ->localisation)[0] . ' )' }}</li>
                                        <li> Site : <a href="{{ $univ->url }}"> {{ $univ->url }} </a> </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {!! $universites->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#trie').change(function() {
            let trie = $(this).val();
            let entrteprise = $('#entreprise').val() == undefined ? $('#entreprise').val() : '';

            if ($('#entreprise').val() == undefined || $('#entreprise').val() == '') {
                window.location.href = "{{ route('universites') }}?trie=" + trie;
            } else {
                window.location.href = "{{ route('universites') }}?trie=" + trie + "&entreprise=" + $('#entreprise').val();
            }

        });
    </script>
@endsection