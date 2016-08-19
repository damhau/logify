<table class="table table-responsive" id="alerts-table">
    <thead>
        <th>Name</th>
        <th>Index</th>
        <th>Type</th>
        <th>Alert</th>
        <th>Query Key</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($alerts as $alert)
        <tr>
            <td>{!! $alert->Name !!}</td>
            <td>{!! $alert->Index !!}</td>
            <td>{!! $alert->Type !!}</td>
            <td>{!! $alert->Alert !!}</td>
            <td>{!! $alert->Query_key !!}</td>
            <td>
                {!! Form::open(['route' => ['alerts.destroy', $alert->id, 'subdomain' => 'dhc1'],'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alerts.show', [$alert->id, 'subdomain' => 'dhc1'] ) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alerts.edit', [$alert->id, 'subdomain' => 'dhc1']) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                             
					
					{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>