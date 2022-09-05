<div>
    <livewire:input.arr type="text_with_checkbox" label="frase precisa da cercare" name="must" :value="$must"
        :modelId="$model_id" />
    <livewire:input.arr type="text_with_checkbox" label="parole da escludere" name="must_not" :value="$must_not"
        :modelId="$model_id" />
    <livewire:input.arr type="text" label="parola iniziale" name="regexp" :value="$regexp" :modelId="$model_id" />
    {{-- <livewire:input.arr type="text_with_checkbox" label="or" name="should" :value="$should" :modelId="$model_id" /> --}}
    <livewire:input.arr type="text" label="parola simile a" name="fuzzy" :value="$fuzzy" :modelId="$model_id" />
</div>
