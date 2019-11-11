<?php

namespace Contao\Model\Event;

use Contao\Model;
use Symfony\Contracts\EventDispatcher\Event;

class DeleteModelEvent extends Event
{

    public const NAME = 'model.delete';

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}
