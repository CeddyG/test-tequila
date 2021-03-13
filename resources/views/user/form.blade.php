@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <br>
                <div class="card">	
                    <div class="card-header">
                        @if(isset($oItem))
                            <h3 class="card-title">Modification</h3>
                        @else
                            <h3 class="card-title">Ajouter</h3>
                        @endif
                    </div>
                    <div class="card-body"> 
                        @if(isset($oItem))
                            {!! BootForm::open()->action(route('user.update', $oItem->id_user))->put() !!}
                            {!! BootForm::bind($oItem) !!}
                        @else
                            {!! BootForm::open()->action(route('user.store'))->post() !!}
                        @endif
                            
                            {!! BootForm::text('Nom', 'name') !!}
                            <div class="my-3">
                                {!! BootForm::text('Code postal', 'postal_code') !!}
                            </div>
                            {!! BootForm::submit('Enregistrer', 'btn-outline-success')->addClass('mt-1') !!}

                        {!! BootForm::close() !!}
                    </div>
                </div>
                <a href="javascript:history.back()" class="btn btn-primary mt-5">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
            </div>
        </div>
    </div>
@endsection
