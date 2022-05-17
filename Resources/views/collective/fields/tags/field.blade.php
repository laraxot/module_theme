@php
$opts = $options['field']->options;
//dddx([$opts, get_defined_vars()]);
$row = $_panel->row;
$tagA = \Modules\Tag\Models\Tag::findOrCreate('staging1', 'domains');
$tagA = \Modules\Tag\Models\Tag::findOrCreate('camera', 'domains');
@endphp
@foreach ($opts as $opt)
    <h3>{{ $opt }}</h3>
    @php
        $tags = \Modules\Tag\Models\Tag::getWithType($opt);
        $values = $row->tagsWithType($opt);
        $values_ids = $values->pluck('id')->all();
    @endphp
    .
    @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, $values_ids)) />
    @endforeach
@endforeach
