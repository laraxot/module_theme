<form>
    @foreach($fields as $field)
        {{ $field->render()->with($field->data()) }}
    @endforeach

    <div class="d-flex justify-content-end gap-2">
        @foreach($buttons as $button)
            {{ $button->render()->with($button->data()) }}
        @endforeach
    </div>
</form>