---
title: Card Press
description: Card Press
extends: _layouts.documentation
section: content
lang: it
id: 87
parent_id: 5
---

# Card Press {#card}

Crea una card con il video player e le citazioni della ricerca restituite con gli Highlights di Elasticsearch.

Per funzionare bisogna che il modello $press utilizzi il seguente Trait:

```php
use Elastic\ScoutDriverPlus\Searchable;
```

Il modello deve avere un video con queste proprietà:

```php
//nome del disco in filesystem.php
$this->press->disk
//path del file nel disco
$this->press->file_mp4
//path dello screenshot, ma può essere anche di uno spinner di caricamento
$this->press->poster_path
//citazioni di elastic (per questo DEVE essere collegato ad Elastic con ScoutDriverPlus!)
$press->highlights
```

**Esempio di utilizzo:**

```php
<x-card.press :press="$press" type="v3"> </x-card.press>
```