<div>
    @foreach($arr as $v)
        <x-input.group :name="$v['name']" :type="$v['type']" />
    @endforeach
</di>