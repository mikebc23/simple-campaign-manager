@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-5">Welcome {{ Auth::user()->name }}!</h1>
            <p class="lead">Join or create your own campaign and support your community.</p>
            <a href="{{ route('campaigns.index') }}" class="btn btn-primary">Go to your campaigns</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">

                <!-- START -->
                <div class="card-columns">
                    @forelse ($campaigns as $campaign)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title @if($campaign->campaign_type_id == 1) text-success @elseif ($campaign->campaign_type_id ==2) text-secundary @else text-info  @endif"><a href="{{ route('view_campaign', $campaign->id) }}">{{ $campaign->title }}</a></h5>
                            <p class="card-text">{{ $campaign->short_description }}</p>
                            <p class="card-text"><small class="text-muted">Last updated on {{ date('F d, Y', strtotime($campaign->updated_at )) }}</small></p>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <!-- END -->

            </div>
        </div>
    </div>
@endsection


