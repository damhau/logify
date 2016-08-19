<table class="table table-responsive" id="damienapi1s-table">
    <thead>
        <th>Es Cluster</th>
        <th>Logify Name</th>
        <th>Vip</th>
        <th>Public Ip </th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($damienapi1s as $damienapi1)
        <tr>
            <td>{!! $damienapi1->es_cluster !!}</td>
            <td>{!! $damienapi1->logify_name !!}</td>
            <td>{!! $damienapi1->VIP !!}</td>
            <td>{!! $damienapi1->public_ip  !!}</td>
            <td>
                {!! Form::open(['route' => ['damienapi1s.destroy', $damienapi1->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('damienapi1s.show', [$damienapi1->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('damienapi1s.edit', [$damienapi1->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>