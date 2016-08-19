<table class="table table-responsive" id="reports-table">
    <thead>
        <th>Name</th>
        <th>Schedule</th>
        <th>Dashboard</th>
        <th>Email</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{!! $report->Name !!}</td>
            <td>{!! $report->Schedule !!}</td>
            <td>{!! $report->Dashboard !!}</td>
            <td>{!! $report->Email !!}</td>
            <td>
                {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reports.show', [$report->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reports.edit', [$report->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>