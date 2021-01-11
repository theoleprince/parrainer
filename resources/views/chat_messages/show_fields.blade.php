<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $chatMessage->content }}</p>
</div>

<!-- Received At Field -->
<div class="form-group">
    {!! Form::label('received_at', 'Received At:') !!}
    <p>{{ $chatMessage->received_at }}</p>
</div>

<!-- Sender Delete At Field -->
<div class="form-group">
    {!! Form::label('sender_delete_at', 'Sender Delete At:') !!}
    <p>{{ $chatMessage->sender_delete_at }}</p>
</div>

<!-- Receiver Delete At Field -->
<div class="form-group">
    {!! Form::label('receiver_delete_at', 'Receiver Delete At:') !!}
    <p>{{ $chatMessage->receiver_delete_at }}</p>
</div>

<!-- Viewed At Field -->
<div class="form-group">
    {!! Form::label('viewed_at', 'Viewed At:') !!}
    <p>{{ $chatMessage->viewed_at }}</p>
</div>

<!-- Files Field -->
<div class="form-group">
    {!! Form::label('files', 'Files:') !!}
    <p>{{ $chatMessage->files }}</p>
</div>

<!-- Sender Id Field -->
<div class="form-group">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    <p>{{ $chatMessage->sender_id }}</p>
</div>

<!-- Chat Discussion Id Field -->
<div class="form-group">
    {!! Form::label('chat_discussion_id', 'Chat Discussion Id:') !!}
    <p>{{ $chatMessage->chat_discussion_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chatMessage->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chatMessage->updated_at }}</p>
</div>

