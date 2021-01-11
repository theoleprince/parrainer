<div class="table-responsive">
    <table class="table" id="blogComments-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Website</th>
        <th>Comment</th>
        <th>Blog Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogComments as $blogComment)
            <tr>
                <td>{{ $blogComment->name }}</td>
            <td>{{ $blogComment->email }}</td>
            <td>{{ $blogComment->website }}</td>
            <td>{{ $blogComment->comment }}</td>
            <td>{{ $blogComment->blog_id }}</td>
                <td>
                    {!! Form::open(['route' => ['blogComments.destroy', $blogComment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('blogComments.show', [$blogComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('blogComments.edit', [$blogComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
