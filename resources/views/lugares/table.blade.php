<table class="table table-responsive" id="lugares-table">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Photo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lugares as $lugares)
        <tr>
            <td>{!! $lugares->titulo !!}</td>
            <td>{!! $lugares->latitud !!}</td>
            <td>{!! $lugares->longitud !!}</td>
            <td><img src='{!! $lugares->photo !!}' width='300'/></td>
		
            <td>
                {!! Form::open(['route' => ['lugares.destroy', $lugares->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lugares.show', [$lugares->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lugares.edit', [$lugares->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>