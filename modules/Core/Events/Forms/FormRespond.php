<?php

namespace Zix\Core\Events\Forms;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Zix\Core\Entities\Forms\Form;

/**
 * Class FormRespond
 * @package Zix\Core\Events\Forms
 */
class FormRespond
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var Form
     */
    private $form;
    private $response_identifier;

    /**
     * Create a new event instance.
     *
     * @param Form $form
     * @param $response_identifier
     */
    public function __construct(Form $form, string $response_identifier)
    {
        $this->form = $form;
        $this->response_identifier = $response_identifier;
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
