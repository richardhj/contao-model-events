<?php

namespace Contao\Model;

use Contao\Model;
use Contao\Model\Event\DeleteModelEvent;
use Contao\Model\Event\PostSaveModelEvent;
use Contao\Model\Event\PreSaveModelEvent;
use Contao\System;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

trait DispatchModelEventsTrait
{

    /**
     * Dispatch the PreSaveModelEvent to modify the current row before it is
     * stored in the database
     */
    protected function preSave(array $data): array
    {
        $data = parent::preSave($data);

        /** @var Model $this */
        $event = new PreSaveModelEvent($this, $this->cloneOriginal(), $data);
        $this->getEventDispatcher()->dispatch($event);

        return $event->getData();
    }

    /**
     * Dispatch the PostSaveModelEvent
     */
    protected function postSave(int $type): void
    {
        parent::postSave($type);

        /** @var Model $this */
        $event = new PostSaveModelEvent($this, $this->cloneOriginal());
        $this->getEventDispatcher()->dispatch($event);
    }

    /**
     * Dispatch the DeleteModelEvent after deleting the model
     */
    public function delete(): int
    {
        if ($affected = parent::delete()) {
            /** @var Model $this */
            $event = new DeleteModelEvent($this);
            $this->getEventDispatcher()->dispatch($event);
        }

        return $affected;
    }

    private function getEventDispatcher(): EventDispatcherInterface
    {
        return System::getContainer()->get('event_dispatcher');
    }
}
