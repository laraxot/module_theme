---
title: Select
description: Select
extends: _layouts.documentation
section: content
---

# Select {#select}

Esempio di input tipo select da inserire nel proprio form


```php
<x-input.group type="select" name="conn" :options="['sync' => 'sync', 'database' => 'database']" wire.model.lazy="form_data.conn" />
```