<?php

namespace Contao\Model\Event;

use Contao\Model;
use Symfony\Contracts\EventDispatcher\Event;

class PreSaveModelEvent extends Event
{

    public const NAME = 'model.pre-save';

    protected $model;

    protected $originalModel;

    protected $data;

    public function __construct(Model $model, Model $originalModel, array $data)
    {
        $this->model = $model;
        $this->originalModel = $originalModel;
        $this->data = $data;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getOriginalModel(): Model
    {
        return $this->originalModel;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }
}
