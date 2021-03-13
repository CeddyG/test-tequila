@extends('layout')

@section('CSS')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            @if(session()->has('ok'))

                <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

            @endif

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header">
                    <h3 class="box-title">Liste</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table id="tab-admin" class="table no-margin table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($oItems as $oItem)
                            <tr>
                                <td>{{ $oItem->id_user }}</td>
                                <td>{{ $oItem->name }}</td>
                                <td>{{ $oItem->postal_code }}</td>
                                <td>{{ $oItem->city }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $oItem->id_user) }}">
                                        <button type="button" class="btn btn-outline-warning">Editer</button>
                                    </a>
                                </td>
                                <td>
                                    {!! BootForm::open()->action(route('user.destroy', $oItem->id_user))->attribute("onsubmit", "return confirm('Voulez vous vraiment supprimer cet utilisateur ?')")->delete() !!}
                                        {!! BootForm::submit("Supprimer", "btn-outline-danger") !!}
                                    {!! BootForm::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="card-footer">
                    <a href="{{ route('user.create') }}">
                        <button type="button" class="btn btn-primary">Ajouter</button>
                    </a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@section('JS')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tab-admin').DataTable({
                 
                aoColumnDefs: [
                    {
                        bSortable: false,
                        aTargets: [ -1, -2 ]
                    }
                ],
                "language": {
                    "sProcessing":     "Traitement en cours...",
                    "sSearch":         "Rechercher&nbsp;:",
                    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix":    "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst":      "Premier",
                        "sPrevious":   "Pr&eacute;c&eacute;dent",
                        "sNext":       "Suivant",
                        "sLast":       "Dernier"
                    },
                    "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
                }
            });
        });
    </script>
@endsection
