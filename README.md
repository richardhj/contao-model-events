# Contao Model Events

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]]()
[![Dependency Status][ico-dependencies]][link-dependencies]

This extension provides the `DispatchModelEventsTrait` that makes the following events available for your custom model:

## Events implemented

### PrePersistModelEvent

Triggered before persisting the model in the database. You can acces the `Model` with the current data and the `Model` with the original data.

Row data can be modified at this point, when using `setData()`.

### PostPersistModelEvent

Triggered after persisting the model in the database. You can acces the `Model` with the current data and the `Model` with the original data.

### DeleteModelEvent

Triggered after the model has been deleted successfully. You can access the `Model` instance.

## Usage

### Implement the Trait in your custom model

```php
use Contao\Model;

class MyModule extends Model
{

    use Model\DispatchModelEventsTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected static $strTable = 'tl_my_module';
} 
```

### Listen on the events

https://github.com/contao-community-alliance/event-dispatcher#listen-on-events

[ico-version]: https://img.shields.io/packagist/v/richardhj/contao-model-events.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-LGPL-brightgreen.svg?style=flat-square
[ico-dependencies]: https://www.versioneye.com/php/richardhj:contao-model-events/badge.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/richardhj/contao-model-events
[link-dependencies]: https://www.versioneye.com/php/richardhj:contao-model-events
