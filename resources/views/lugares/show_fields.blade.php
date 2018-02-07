<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $lugares->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $lugares->titulo !!}</p>
</div>

<!-- Latitud Field -->
<div class="form-group">
    {!! Form::label('latitud', 'Latitud:') !!}
    <p>{!! $lugares->latitud !!}</p>
</div>

<!-- Longitud Field -->
<div class="form-group">
    {!! Form::label('longitud', 'Longitud:') !!}
    <p>{!! $lugares->longitud !!}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{!! $lugares->photo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $lugares->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $lugares->updated_at !!}</p>
</div>

