@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                View Campaign
            </div>
            <div class="card-body">
            
            	@if($pledge === true)      	
            	<div class="alert alert-success" role="alert">
	            	<h4 class="alert-heading">Thank you!</h4>
            		<p>Thank you for your support to the <strong>{{ $campaign->title }}</strong> campaign.</p>
            	</div>
            	@endif

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <p class="text-justify">{{ $campaign->title }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Introduction</label>
                    <div class="col-sm-9">
                        <p class="text-justify">{{ $campaign->short_description }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <p class="text-justify">{{ $campaign->long_description }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="start">Start Date</label>
                    <div class="col-sm-10">
                        <p class="text-justify">{{ $campaign->start }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="start">End Date</label>
                    <div class="col-sm-10">
                        <p class="text-justify">{{ $campaign->end }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="start">Status</label>
                    <div class="col-sm-10">
                        @if($campaign->status =='0') Draft
                        @elseif ($campaign->status =='1') Active
                        @elseif ($campaign->status =='2') Disable
                        @endif
                    </div>
                </div>

                @if($campaign->created_at)
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Created at</label>
                        <div class="col-sm-3">
                            {{ $campaign->created_at ?? '' }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Updated at</label>
                        <div class="col-sm-6">
                            {{ $campaign->updated_at ?? '' }}
                        </div>
                    </div>
                @endif

				<form action="{{ action('HomeController@pledge', $campaign->id) }}" method="POST">
                    @if($pledge == true)
                    @else
                    @csrf
                    <button type="submit" class="btn btn-primary" title="Pledge" value="Pledge">Pledge</button>
                	@endif
                	<a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                </form>
                            
                

                </div>
            </div>
        </div>
@endsection


