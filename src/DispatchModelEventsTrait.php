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

namespace Contao\Model;

use Contao\Model\Event\DeleteModelEvent;
use Contao\Model\Event\PostSaveModelEvent;
use Contao\Model\Event\PreSaveModelEvent;
use Contao\System;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


trait DispatchModelEventsTrait
{

    /**
     * Dispatch the PreSaveModelEvent to modify the current row before it is stored in the database
     *
     * @param array $data
     *
     * @return array
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    protected function preSave(array $data)
    {
        $data = parent::preSave($data);

        /** @var \Model $this */
        $event = new PreSaveModelEvent($this, $this->cloneOriginal(), $data);
        $this->getEventDispatcher()->dispatch(PreSaveModelEvent::NAME, $event);

        return $event->getData();
    }

    /**
     * Dispatch the PostSaveModelEvent
     *
     * @param int $type
     *
     * @return void
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    protected function postSave($type)
    {
        parent::postSave($type);

        /** @var \Model $this */
        $event = new PostSaveModelEvent($this, $this->cloneOriginal());
        $this->getEventDispatcher()->dispatch(PostSaveModelEvent::NAME, $event);
    }

    /**
     * Dispatch the DeleteModelEvent after deleting the model
     *
     * @return integer
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    public function delete()
    {
        if ($affected = parent::delete()) {
            /** @var \Model $this */
            $event = new DeleteModelEvent($this);
            $this->getEventDispatcher()->dispatch(DeleteModelEvent::NAME, $event);
        }

        return $affected;
    }

    /**
     * @return EventDispatcherInterface
     *
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
     * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
     */
    private function getEventDispatcher(): EventDispatcherInterface
    {
        $dispatcher = System::getContainer()->get('event_dispatcher');

        /** @var EventDispatcherInterface $dispatcher */
        return $dispatcher;
    }
}
