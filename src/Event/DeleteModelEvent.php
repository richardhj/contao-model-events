<?php

namespace Contao\Model\Event;

use Symfony\Component\EventDispatcher\Event;


class DeleteModelEvent extends Event
{

    const NAME = 'model.delete';


    /**
     * @var \Model
     */
    protected $model;


    /**
     * DeleteModelEvent constructor.
     *
     * @param \Model $model
     */
    public function __construct(\Model $model)
    {
        $this->model = $model;
    }


    /**
     * @return \Model
     */
    public function getModel()
    {
        return $this->model;
    }
}
