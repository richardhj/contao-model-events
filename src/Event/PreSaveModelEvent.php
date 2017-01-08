<?php

namespace Contao\Model\Event;

use Symfony\Component\EventDispatcher\Event;


class PreSaveModelEvent extends Event
{

    const NAME = 'model.pre-save';


    /**
     * @var \Model
     */
    protected $model;


    /**
     * @var \Model
     */
    protected $originalModel;


    /**
     * @var array
     */
    protected $data;


    /**
     * PreSaveModelEvent constructor.
     *
     * @param \Model $model
     * @param \Model $originalModel
     * @param array  $data
     */
    public function __construct(\Model $model, \Model $originalModel, array $data)
    {
        $this->model = $model;
        $this->originalModel = $originalModel;
        $this->data = $data;
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


    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * @param array $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
