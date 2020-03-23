<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-6">
        <input name="title" type="text" class="form-control" placeholder="Campaign Title" maxlength="30" value="{{ $campaign->title ?? '' }}"/>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Enter the new campaign title (30 characters)</small>
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Introduction</label>
    <div class="col-sm-6">
        <textarea rows="6" maxlength="250" name="short_description" class="form-control" placeholder="Campaign Introduction">{{ $campaign->short_description ?? '' }}</textarea>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Enter the new campaign introduction (255 characters)</small>
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-6">
        <textarea rows="10" name="long_description" class="form-control" placeholder="Campaign Description">{{ $campaign->long_description ?? '' }}</textarea>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Enter the new campaign description</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label"for="campaign_type_id">Type</label>
    <div class="col-sm-6">
        <select name="campaign_type_id" class="form-control" id="campaign_type_id" required>
            @foreach($campaign_types as $id => $campaign_type)
                <option value="{{ $id }}" {{ (isset($campaign->campaign_type_id) == $campaign->campaign_type_id) ? 'selected' : '' }}>{{ $campaign_type }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Choose the campaign type</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="start">Start Date</label>
    <div class="col-sm-6">
        <input name="start" type="date" class="form-control" required placeholder="yyyy-mm-dd" value="{{ $campaign->start ?? '' }}"/>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Choose the campaign start date</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="start">End Date</label>
    <div class="col-sm-6">
        <input name="end" type="date" class="form-control" required placeholder="yyyy-mm-dd" value="{{ $campaign->end ?? '' }}"/>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Choose the campaign end date</small>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="start">Status</label>
    <div class="col-sm-6">
        <select name="status" class="form-control" id="status" required>
            <option value="0" @if($user->status =='0') selected @endif>Draft</option>
            <option value="1" @if($user->status =='1') selected @endif>Active</option>
            <option value="3" @if($user->status =='2') selected @endif>Disable</option>
        </select>
    </div>
    <div class="col-sm-4">
        <small class="form-text text-muted">Choose the campaign status (by Default is inactive)</small>
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
