---
title: Datagrid Row
description: Datagrid Row
extends: _layouts.documentation
section: content
path: it/docs/livewire_components/datagrid
---

# Datagrid Row {#datagrid-row}

Mostra la riga di un modello (row) in una tabella (tr) con un tasto per modificare la riga stessa al volo.

Nome Componente:

```php
livewire:datagrid-editable.row
```

Parametri

```php
//item (riga) del modello
public mixed $row;
//indice (non serve a niente in realtà)
public string $index;
```

Esempio:

```php
@php
$user = \App\Models\User::make();
@endphp

<livewire:datagrid-editable.row :row="$user" index=0 />
```

