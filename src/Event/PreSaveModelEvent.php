<?php
/**
 * This file is part of richardhj/contao-ferienpass.
 *
 * Copyright (c) 2015-2018 Richard Henkenjohann
 *
 * @package   richardhj/contao-ferienpass
 * @author    Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @copyright 2015-2018 Richard Henkenjohann
 * @license   https://github.com/richardhj/contao-ferienpass/blob/master/LICENSE
 */

namespace Contao\Model\Event;

use Symfony\Component\EventDispatcher\Event;


class PreSaveModelEvent extends Event
{

    public const NAME = 'model.pre-save';


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
