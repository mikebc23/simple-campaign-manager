@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Welcome to the admin section</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <ul class="list-unstyled">
                                <li><a href="#">Users</a></li>
                                <li><a href="{{ action('CampaignTypeController@index') }}">Campaign Type</a></li>
                                <li>&nbsp;</li>
                                <li><a href="#">Clean cache</a></li>
                                <li><a href="#">Send test email</a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
