@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="display-5">Campaign Manager</h2>
            <p class="lead">&nbsp;</p>
            <a href="{{ route('campaigns.create') }}" class="btn btn-primary">Create new campaign</a>
        </div>
        <h3 class="display-5">My Campaings</h3>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- START -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($campaigns as $campaign)

                        <tr>
                            <th scope="row">{{ $campaign->id }}</th>
                            <td>{{ $campaign->title }}</td>
                            <td>{{ date('F d, Y', strtotime($campaign->created_at)) }}</td>
                            <td>{{ date('F d, Y', strtotime($campaign->created_at)) }}</td>
                            <td>
                                <a href="{{ action('CampaignController@show', ['campaign' => $campaign->id]) }}" alt="View" title="View">View</a>
                                <a href="{{ action('CampaignController@edit', ['campaign' => $campaign->id]) }}" alt="Edit" title="Edit">Edit</a>

                                <form action="{{ action('CampaignController@destroy', ['campaign' => $campaign->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-link" title="Delete" value="DELETE">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse

                    </tbody>
                </table>
                <!-- END -->
            </div>
        </div>
    </div>
@endsection
