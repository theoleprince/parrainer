<!-- Last Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_message', 'Last Message:') !!}
    {!! Form::text('last_message', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id_1', 'User Id 1:') !!}
    {!! Form::select('user_id_1', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id_2', 'User Id 2:') !!}
    {!! Form::select('user_id_2', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chatDiscussions.index') }}" class="btn btn-default">Cancel</a>
</div>
