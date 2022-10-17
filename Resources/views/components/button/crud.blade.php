<div role="group" aria-label="Actions" class="btn-group btn-group-sm">
    @foreach ($panel->getItemTabs() as $tab)
<<<<<<< HEAD
        <x-button type="simple2" :attrs="get_object_vars($tab)"></x-button>
=======
        <x-button :attrs="get_object_vars($tab)" class="btn"></x-button>
>>>>>>> ede0df7 (first)
    @endforeach
</div>
<br />
<div role="group" aria-label="Actions" class="btn-group btn-group-sm">
    <x-button.edit :panel="$panel" />
    <x-button.delete :panel="$panel" />
    <x-button.show :panel="$panel" />
</div>
