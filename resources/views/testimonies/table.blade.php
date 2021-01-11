<div class="table-responsive">
    <table class="table" id="testimonies-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Description</th>
        <th>Url</th>
        <th>Image</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testimonies as $testimony)
            <tr>
                <td>{{ $testimony->title }}</td>
            <td>{{ $testimony->description }}</td>
            <td>{{ $testimony->url }}</td>
            <td>{{ $testimony->image }}</td>
            <td>{{ $testimony->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['testimonies.destroy', $testimony->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testimonies.show', [$testimony->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('testimonies.edit', [$testimony->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
