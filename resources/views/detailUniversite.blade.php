@extends('layout.blanc')

@section('contenu')
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">

        <h2 class="text-center text-white">{{ $universite->uo_lib }}</h2>

        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">Informations générales</h5>

                    <table class="table table-light table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fa fa-hashtag mx-3" aria-hidden="true"></i>
                                    {{ $universite->secteur_d_etablissement }}
                                </td>
                                <td>
                                    <i class="fa fa-hashtag mx-3" aria-hidden="true"></i>
                                    {{ json_decode($universite->type_d_etablissement)[0] }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-location-arrow mx-3" aria-hidden="true"></i>
                                    {{ explode('>', $universite->localisation)[1] . ' ( ' .  explode('>', $universite->localisation)[0] . ' )' }}
                                </td>
                                <td>
                                    <i class="fa fa-map-marker mx-3" aria-hidden="true"></i>
                                    {{ $universite->adresse_uai }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title">Enseignants</h6>
                        <p class="card-text"> {{ $universite->enseignants->count() }} </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title">Personnels</h6>
                        <p class="card-text"> {{ $universite->personnels->count() }} </p>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h6 class="card-title">Etudiants</h6>
                        <p class="card-text"> {{ $universite->inscrits ?? 'NC' }} </p>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h5>Evolution des inscription des etudiants</h5>
            </div>
            <div class="card-body">
                <canvas id="etudiantsChart"></canvas>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h5>Personnel administratif</h5>
            </div>
            <div class="card-body">
                <table class="table table-light" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Rentrée</th>
                            <th>Type</th>
                            <th>Categorie</th>
                            <th>Effectif</th>
                            <th>Eff Homme</th>
                            <th>Eff Femme</th>
                            <th>Code Filiere</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($universite->personnels as $pers)
                        <tr>
                            <td> {{ $pers->rentree }} </td>
                            <td> {{ $pers->type_personnel }} </td>
                            <td> {{ $pers->categorie }} </td>
                            <td> {{ $pers->effectif }} </td>
                            <td> {{ $pers->effectif_hommes }} </td>
                            <td> {{ $pers->effectif_femmes }} </td>
                            <td> {{ $pers->code_filiere }} </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7"></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}

<script>
    // document.querySelector('#myTable').dataTable()

    const ctx = document.getElementById('etudiantsChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"],
            datasets: [{
                label: "Nombre d'inscription",
                data: [
                    {{ $universite->inscrits_2010?? 0 }},
                    {{ $universite->inscrits_2011?? 0 }},
                    {{ $universite->inscrits_2012?? 0 }},
                    {{ $universite->inscrits_2013?? 0 }},
                    {{ $universite->inscrits_2014?? 0 }},
                    {{ $universite->inscrits_2015?? 0 }},
                    {{ $universite->inscrits_2016?? 0 }},
                    {{ $universite->inscrits_2017?? 0 }},
                    {{ $universite->inscrits_2018?? 0 }},
                    {{ $universite->inscrits_2019?? 0 }},
                    {{ $universite->inscrits_2020?? 0 }},
                    {{ $universite->inscrits_2021?? 0 }},
                    {{ $universite->inscrits_2022?? 0 }},
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection