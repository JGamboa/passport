<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitud', 'Latitud:') !!}
    {!! Form::text('latitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitud Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitud', 'Longitud:') !!}
    {!! Form::text('longitud', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::textarea('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('lugares.index') !!}" class="btn btn-default">Cancel</a>
</div>
