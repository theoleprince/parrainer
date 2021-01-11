<!-- Last Message Field -->
<div class="form-group">
    {!! Form::label('last_message', 'Last Message:') !!}
    <p>{{ $chatDiscussion->last_message }}</p>
</div>

<!-- User Id 1 Field -->
<div class="form-group">
    {!! Form::label('user_id_1', 'User Id 1:') !!}
    <p>{{ $chatDiscussion->user_id_1 }}</p>
</div>

<!-- User Id 2 Field -->
<div class="form-group">
    {!! Form::label('user_id_2', 'User Id 2:') !!}
    <p>{{ $chatDiscussion->user_id_2 }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chatDiscussion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chatDiscussion->updated_at }}</p>
</div>

