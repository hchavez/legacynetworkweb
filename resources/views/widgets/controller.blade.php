@foreach($widgets as $widget)
    {{ Widget::run($widget['name'], isset($widget['attributes']) ? $widget['attributes']: null) }}
@endforeach