@extends('layouts.app')

@section('content')
    <form action="{{ route('campaign-type.store') }}" method="POST">

        <div class="container">
            <div class="card">
                <div class="card-header">
                    Campaign Type
                </div>
                <div class="card-body">

                    @include('admin.campaign_type.fields')

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('campaign-type.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
