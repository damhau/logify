<table class="table table-responsive" id="provisions-table">
    <thead>
        <th>Es Cluster</th>
        <th>Logify Name</th>
        <th>Vip</th>
        <th>Ip Public</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($provisions as $provision)
        <tr>
            <td>{!! $provision->es_cluster !!}</td>
            <td>{!! $provision->logify_name !!}</td>
            <td>{!! $provision->VIP !!}</td>
            <td>{!! $provision->ip_public !!}</td>
            <td>
                {!! Form::open(['route' => ['provisions.destroy', $provision->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provisions.show', [$provision->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provisions.edit', [$provision->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>