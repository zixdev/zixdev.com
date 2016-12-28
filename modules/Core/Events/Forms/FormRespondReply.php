<?php

namespace Zix\Core\Events\Forms;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Zix\Core\Entities\Forms\Form;
use Zix\Core\Entities\Forms\FormResponse;

class FormRespondReply
{
    use InteractsWithSockets, SerializesModels;
    /**
     * @var Form
     */
    private $form;

    /**
     * @var FormResponse
     */
    private $response;

    /**
     * Create a new event instance.
     *
     * @param Form $form
     * @param FormResponse $response
     */
    public function __construct(Form $form, FormResponse $response)
    {
        $this->form = $form;
        $this->response = $response;
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
