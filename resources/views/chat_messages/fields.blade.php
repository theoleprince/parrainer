<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Files Field -->
<div class="form-group col-sm-6">
    {!! Form::label('files', 'Files:') !!}
    {!! Form::file('files') !!}
</div>
<div class="clearfix"></div>

<!-- Sender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    {!! Form::select('sender_id', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Chat Discussion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chat_discussion_id', 'Chat Discussion Id:') !!}
    {!! Form::select('chat_discussion_id', $chat_discussionItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chatMessages.index') }}" class="btn btn-default">Cancel</a>
</div>
