---
title: Card Press
description: Card Press
extends: _layouts.documentation
section: content
lang: it
id: 87
parent_id: 5
---

# Card {#card}

```php
<x-card-simple>
    <x-slot name="title">Card Press</x-slot>
    <x-slot name="txt">
        <x-input.group type="select" name="conn" :options="['sync' => 'sync', 'database' => 'database']" />
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-secondary" wire:click="dummyAction()">1000 Dummy Action</button>
    </x-slot>
</x-card-simple>
```

```php
<x-card>
    <x-slot name="title">titolo</x-slot>
    <x-slot name="txt">
        txt
    </x-slot>
</x-card>
```