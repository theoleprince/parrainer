<div class="table-responsive">
    <table class="table" id="testAndEvaluations-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>File</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testAndEvaluations as $testAndEvaluation)
            <tr>
                <td>{{ $testAndEvaluation->title }}</td>
            <td>{{ $testAndEvaluation->file }}</td>
            <td>{{ $testAndEvaluation->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['testAndEvaluations.destroy', $testAndEvaluation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testAndEvaluations.show', [$testAndEvaluation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('testAndEvaluations.edit', [$testAndEvaluation->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
