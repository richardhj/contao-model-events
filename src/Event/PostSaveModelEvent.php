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


class PostSaveModelEvent extends Event
{

    public const NAME = 'model.post-save';


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
