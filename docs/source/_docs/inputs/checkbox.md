---
title: Checkbox
description: Checkbox
extends: _layouts.documentation
section: content
lang: it
id: 50
parent_id: 10
---

# Checkbox {#checkbox}

Esempio di input tipo checkbox da inserire nel proprio form
solitamente da utilizzare dentro un foreach 

```php
@foreach($options as $k=>$v)
    <x-input.group type="checkbox" :name="$name.'.'.$loop->index" label="{{ $v }}" value="{{ $k }}" checked />
@endforeach
```
