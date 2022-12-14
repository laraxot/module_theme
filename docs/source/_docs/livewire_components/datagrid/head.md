---
title: Datagrid Head
description: Datagrid Head
extends: _layouts.documentation
section: content
path: it/docs/livewire_components/datagrid
---

# Datagrid Head {#datagrid-head}

Ritorna l'intestazione della tabella (th) in base ai campi di un modello.

Nome Componente:

```php
livewire:datagrid.head
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
$user_class = \App\Models\User::make();
@endphp

<livewire:datagrid-editable.head :row="$user_class" index=0 />
```

