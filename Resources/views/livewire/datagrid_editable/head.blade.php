<tr wire:ignore>

    @foreach($fields as $field)
        <th>
            {{ $field->label }}
        </th>
    @endforeach

</tr>
