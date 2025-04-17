<div class="row">
    
    <div class="col-md-9">
        @if(isset($opened_category['name']))
            @foreach($opened_category as $key=>$value)
                @if(!\is_array($value))
                    <h5>{{Str::upper($key)}}: {{$value}}</h5>
                @endif
            @endforeach
        @endif
    </div>
    <div class="col-md-3">
        <h4>Categories</h4>
        @foreach ($this->form_data['categories'] as $category)
            <div class="col-md-12 p-0 m-0">
                <h5>
                    <a href='#' wire:click="openCategory('{{$category['id']}}')">{{ $category['name'] }}</a></h5>
            </div>
        @endforeach
    </div>
</div>
