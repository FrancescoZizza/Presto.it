@switch(Config::get('app.locale'))
    @case('it')
    {{$category->name}}
    @break

    @case('en')
    {{$category->lang_en}}
    @break

    @case('pt')
    {{$category->lang_pt}}
    @break
@endswitch
