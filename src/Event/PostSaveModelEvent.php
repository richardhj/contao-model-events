<?php

namespace Contao\Model\Event;

use Symfony\Component\EventDispatcher\Event;


class PostSaveModelEvent extends Event
{

    const NAME = 'model.post-save';


    /**
     * @var \Model
     */
    protected $model;


    /**
     * @var \Model
     */
    protected $originalModel;


    /**
     * PostSaveModelEvent constructor.
     *
     * @param \Model $model
     * @param \Model $originalModel
     */
    public function __construct(\Model $model, \Model $originalModel)
    {
        $this->model = $model;
        $this->originalModel = $originalModel;
    }


    /**
     * @return \Model
     */
    public function getModel()
    {
        return $this->model;
    }


    /**
     * @return \Model
     */
    public function getOriginalModel()
    {
        return $this->originalModel;
    }
}
