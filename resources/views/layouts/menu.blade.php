<li class="{{ Request::is('generator_builder') ? 'active' : '' }}"><a href="generator_builder">Generator</a></li>


<li class="{{ Request::is('lugares*') ? 'active' : '' }}">
    <a href="{!! route('lugares.index') !!}"><i class="fa fa-edit"></i><span>Lugares</span></a>
</li>

