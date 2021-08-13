# Intro to CHocoCode Paginator

Friendly PHP paginator to paginate everything

This package introduces a different way of pagination handling. You can read more about the internal logic on the given
documentation link.

## Requirements:

- PHP `>=7.4`.

## Features:

- Comming soon

## Installation and configuration:

### Pretty simple with [Composer](http://packagist.org), run

```sh
composer require choco-code/paginator
```

### Configuration & Usage examples

Comming soon

#### PHP:

```php
<?php declare(strict_types=1);

use ChocoCode\Paginator\Pagination\PaginationRender;
require_once __DIR__ . '/vendor/autoload.php';

$options = [
   'nextPageLabel' => 'Suivant',
   'previousPageLabel' => 'Précédent'
];

$paginator = paginator(
    500,//Total items to paginate
    5,//Items displayed per page
    5,//Page range
    request()->query()->getInt('page', 1), //current page
    $options//Options
);

render($paginator, PaginationRender::BOOTSTRAP_V5)
            ->getRendeContent();// get the output result(navigation links)
```

#### Pagination templates engine

That could be used out of the box in `$templateEngine` key:

* `PaginationRender::BOOTSTRAP_V4` (by default)
* `PaginationRender::BOOTSTRAP_V5`

### View

```php
<?php ?>
<!-- total items count !-->
<div class="count">
   <div class="d-flex">
       <div class="text-primary">Total items : <?= $paginator->getTotalItems() ?>|</div>
       <div class="text-primary">Pages : <?= $paginator->getPageCount() ?>|</div>
       <div class="text-primary">Showing items : <?= $paginator->getItemsPerPage() ?>|</div>
  </div>
</div>
<!-- display navigation !-->
<div class="navigation">
  <?php
       render($paginator, PaginationRender::BOOTSTRAP_V5)
       ->rende();
  ?>
</div>
```
