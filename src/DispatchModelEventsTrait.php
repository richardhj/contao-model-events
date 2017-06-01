<?php

namespace Contao\Model;

use Composer\EventDispatcher\EventDispatcher;
use Contao\Model\Event\DeleteModelEvent;
use Contao\Model\Event\PostSaveModelEvent;
use Contao\Model\Event\PreSaveModelEvent;


trait DispatchModelEventsTrait
{

    /**
     * Dispatch the PreSaveModelEvent to modify the current row before it is stored in the database
     *
     * @param array $arrData
     *
     * @return array
     */
    protected function preSave(array $arrData)
    {
        global $container;

        /** @noinspection PhpUndefinedMethodInspection */
        $arrData = parent::preSave($arrData);

        /** @var EventDispatcher $dispatcher */
        $dispatcher = $container['event-dispatcher'];
        /** @var \Model $this */
        $event = new PreSaveModelEvent($this, $this->cloneOriginal(), $arrData);
        $dispatcher->dispatch(PreSaveModelEvent::NAME, $event);

        return $event->getData();
    }


    /**
     * Dispatch the PostSaveModelEvent
     *
     * @param int $intType
     */
    protected function postSave($intType)
    {
        global $container;

        /** @noinspection PhpUndefinedMethodInspection */
        parent::postSave($intType);

        /** @var EventDispatcher $dispatcher */
        $dispatcher = $container['event-dispatcher'];
        /** @var \Model $this */
        $dispatcher->dispatch(PostSaveModelEvent::NAME, new PostSaveModelEvent($this, $this->cloneOriginal()));
    }


    /**
     * Dispatch the DeleteModelEvent after deleting the model
     *
     * @return void
     */
    public function delete()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        if (parent::delete()) {
            global $container;

            /** @var EventDispatcher $dispatcher */
            $dispatcher = $container['event-dispatcher'];
            /** @var \Model $this */
            $dispatcher->dispatch(DeleteModelEvent::NAME, new DeleteModelEvent($this));
        }
    }
}
