---
title: Button
description: Button
extends: _layouts.documentation
section: content
---

# Button {#button}

```php
<x-button.primary-button type="submit">
    Button Label
</x-button.primary-button>
```

```php
<x-button.secondary-button href="{{ route('forum') }}" x-show="activeTag">
    Remove filter
</x-button.secondary-button>
```

```php
<x-button type="advanced" class="mobile-full" :primary="true">
    <x-slot name="label">Avanti</x-slot>
</x-button>
```

## Button Crud {#button-crud}

Visualizza i tre bottoni crud (edit, show e delete) di un modello/istanza.
Come parametro riceve un pannello di un modello istanza.

Può anche visualizzare i tasti relativi alle tabs del pannello. Esempio:

```php
<x-button.crud :panel="Panel::make()->get(Auth::user())"></x-button.crud>
```

Questo componente utilizza componenti che creano il singolo bottone di un azione crud:
```php
<x-button.edit :panel="$panel" />
<x-button.delete :panel="$panel" />
<x-button.detach :panel="$panel" />
<x-button.show :panel="$panel" />
```
