---
title: Radio
description: Radio
extends: _layouts.documentation
section: content
---

# Radio {#radio}

Esempio di input tipo checkbox da inserire nel proprio form
solitamente da utilizzare dentro un foreach 

```php
@foreach($options as $k=>$v)
    <x-input.group type="radio" :name="$name.'.'.$loop->index" label="{{ $v }}" value="{{ $k }}"/>
@endforeach
```