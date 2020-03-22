@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <h3>Campaign Type Manager</h3>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('campaigns-type.create') }}" role="button">Add</a>
                </div>
            </div>
            <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Last Update</th>
                    <th class="Actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($campaign_types as $campaign_type)
                    <tr>
                        <td>{{ $campaign_type->id }}</td>
                        <td>{{ $campaign_type->name }}</td>
                        <td>{{ date('F d, Y', strtotime($campaign_type->created_at)) }}</td>
                        <td>{{ date('F d, Y', strtotime($campaign_type->updated_at)) }}</td>
                        <td class="actions">
                            <a
                                href="{{ action('CampaignTypeController@show', ['campaign_type' => $campaign_type->id]) }}"
                                alt="View"
                                title="View">
                                View
                            </a>
                            <a
                                href="{{ action('CampaignTypeController@edit', ['campaign_type' => $campaign_type->id]) }}"
                                alt="Edit"
                                title="Edit">
                                Edit
                            </a>
                            <form action="{{ action('CampaignTypeController@destroy', ['campaign_type' => $campaign_type->id]) }}" method="POST">
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

                {{ $campaign_types->links() }}
        </div>
    </div>

@endsection
