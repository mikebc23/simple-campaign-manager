@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Campaign Type
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    {{ $campaign_type->name ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    {{ $campaign_type->description ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Created at</label>
                <div class="col-sm-3">
                    {{ $campaign_type->created_at ?? '' }}
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Updated at</label>
                <div class="col-sm-6">
                    {{ $campaign_type->updated_at ?? '' }}
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <a href="{{ route('campaign-type.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
