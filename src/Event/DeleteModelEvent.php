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


class DeleteModelEvent extends Event
{

    public const NAME = 'model.delete';


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
