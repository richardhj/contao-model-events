<?php

namespace Contao\Model\Event;

use Contao\Model;
use Symfony\Contracts\EventDispatcher\Event;

class PostSaveModelEvent extends Event
{

    public const NAME = 'model.post-save';

    protected $model;

    protected $originalModel;

    public function __construct(Model $model, Model $originalModel)
    {
        $this->model = $model;
        $this->originalModel = $originalModel;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getOriginalModel(): Model
    {
        return $this->originalModel;
    }
}
