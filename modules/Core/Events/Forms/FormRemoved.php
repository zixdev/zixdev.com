<?php

namespace Zix\Core\Events\Forms;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Zix\Core\Entities\Forms\Form;

class FormRemoved
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var Form
     */
    private $form;

    /**
     * Create a new event instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        //
        $this->form = $form;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
