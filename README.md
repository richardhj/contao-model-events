# Contao Model Events

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]]()

This extension provides the `DispatchModelEventsTrait` that makes the following events available for your custom model:

## Events implemented

### PrePersistModelEvent

Triggered before persisting the model in the database. You can access the `Model` with the current data and the `Model` with the original data.

Row data can be modified at this point, when using `setData()`.

### PostPersistModelEvent

Triggered after persisting the model in the database. You can access the `Model` with the current data and the `Model` with the original data.

### DeleteModelEvent

Triggered after the model has been deleted successfully. You can access the `Model` instance.

## Usage

### Implement the Trait in your custom model

```php
use Contao\Model;

class MyTableModel extends Model
{

    use Contao\Model\DispatchModelEventsTrait;

    /**
     * Table name
     *
     * @var string
     */
    protected static $strTable = 'tl_my_table';
}
```

From now on, the above mentioned events get triggered on any `save()` and `delete()` action.

[ico-version]: https://img.shields.io/packagist/v/richardhj/contao-model-events.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-LGPL-brightgreen.svg?style=flat-square

[link-dependencies]: https://www.versioneye.com/php/richardhj:contao-model-events
