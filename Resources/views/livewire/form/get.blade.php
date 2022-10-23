<div>
    <form>
        @foreach ($this->form_elements as $k => $element)
            {{-- dddx($element) --}}
            <div class="row clearfix">
                <div class="col-md-10 d-flex align-items-center">
                    {!! $element['renderedView'] !!}
                </div>
            </div>
        @endforeach
    </form>
</div>
