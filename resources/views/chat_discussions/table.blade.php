<div class="table-responsive">
    <table class="table" id="chatDiscussions-table">
        <thead>
            <tr>
                <th>Last Message</th>
        <th>User Id 1</th>
        <th>User Id 2</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chatDiscussions as $chatDiscussion)
            <tr>
                <td>{{ $chatDiscussion->last_message }}</td>
            <td>{{ $chatDiscussion->user_id_1 }}</td>
            <td>{{ $chatDiscussion->user_id_2 }}</td>
                <td>
                    {!! Form::open(['route' => ['chatDiscussions.destroy', $chatDiscussion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('chatDiscussions.show', [$chatDiscussion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('chatDiscussions.edit', [$chatDiscussion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
