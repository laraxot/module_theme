---
title: Card
description: Card
extends: _layouts.documentation
section: content
---

# Card {#card}

    <x-card-simple>
        <x-slot name="title">Job Status</x-slot>
        <x-slot name="txt">
            <pre>{!! $out !!}</pre>

            <x-input.group type="select" name="conn" :options="['sync' => 'sync', 'database' => 'database']" wire.model.lazy="form_data.conn" />

        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-secondary" wire:click="dummyAction()">1000 Dummy Action</button>
            @foreach ($acts as $act)
                <button class="btn btn-primary" wire:click="artisan('{{ $act->name }}')">{{ $act->name }}
                </button>
            @endforeach
        </x-slot>
    </x-card-simple>