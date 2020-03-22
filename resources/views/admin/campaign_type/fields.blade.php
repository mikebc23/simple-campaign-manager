<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-6">
        <input name="name" type="text" class="form-control" placeholder="Campaign Type Name" value="{{ $campaign_type->name ?? '' }}"/>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Enter the new campaign type name</small>
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-6">
        <textarea name="description" class="form-control" placeholder="Campaign Type Description">{{ $campaign_type->description ?? '' }}</textarea>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Enter the new campaign type name</small>
    </div>
</div>

@if($campaign_type->created_at)
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
@endif


@csrf
