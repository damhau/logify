<table class="table table-responsive" id="probes-table">
    <thead>
        <th>Name</th>
        <th>Ip</th>
        <th>Input</th>
        <th>Filter</th>
        <th>Output</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($probes as $probe)
        <tr>
            <td>{!! $probe->Name !!}</td>
            <td>{!! $probe->Ip !!}</td>
            <td>{!! $probe->Input !!}</td>
            <td>{!! $probe->FIlter !!}</td>
            <td>{!! $probe->Output !!}</td>
            <td>
                {!! Form::open(['route' => ['probes.destroy', $probe->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('probes.show', [$probe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('probes.edit', [$probe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>