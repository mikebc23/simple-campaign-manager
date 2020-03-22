@extends('layouts.app')

@section('content')
    <form action="{{ route('campaigns.store') }}" method="POST">

        <div class="container">
            <div class="card">
                <div class="card-header">
                    View Campaign
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <p class="text-justify">{{ $campaign->title }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Introduction</label>
                        <div class="col-sm-10">
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
                        <label class="col-sm-2 col-form-label"for="campaign_type_id">Type</label>
                        <div class="col-sm-10">
                            <p class="text-justify">{{ $campaign->campaignType->name }}</p>
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

                    <input type="hidden" id="user_creator_id" name="user_creator_id" value="{{ $user->id }}"/>

                    @csrf

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection


