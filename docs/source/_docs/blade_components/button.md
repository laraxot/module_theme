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
