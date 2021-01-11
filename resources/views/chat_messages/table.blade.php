<div class="table-responsive">
    <table class="table" id="chatMessages-table">
        <thead>
            <tr>
                <th>Content</th>
        <th>Files</th>
        <th>Sender Id</th>
        <th>Chat Discussion Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chatMessages as $chatMessage)
            <tr>
                <td>{{ $chatMessage->content }}</td>
            <td>{{ $chatMessage->files }}</td>
            <td>{{ $chatMessage->sender_id }}</td>
            <td>{{ $chatMessage->chat_discussion_id }}</td>
                <td>
                    {!! Form::open(['route' => ['chatMessages.destroy', $chatMessage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('chatMessages.show', [$chatMessage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('chatMessages.edit', [$chatMessage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
