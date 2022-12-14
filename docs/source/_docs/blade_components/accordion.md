---
title: Accordion
description: Accordion
extends: _layouts.documentation
section: content
---

# Accordion {#accordion}

Rappresenta un componente Accordion. 

Il componente verrà renderizzato utilizzando una vista Blade, che sarà determinata dalla proprietà $type, che di default richiamerà la blade **theme::components.accordion.rows**

Il componente verrà inizializzato con una collection di dati, che sarà disponibile come proprietà $rows. 

```php
<x-accordion.rows :rows="collection"></x-accordion.rows>
```