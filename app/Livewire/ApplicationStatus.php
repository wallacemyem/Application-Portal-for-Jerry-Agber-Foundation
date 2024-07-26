<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BioData;

class ApplicationStatus extends Component
{
    public $application;
    public $status;

    public function mount(BioData $application)
    {
        $this->application = $application;
        $this->status = $application->status;
    }

    public function updateStatus($newStatus)
    {
        $this->application->status = $newStatus;
        $this->application->save();
        $this->status = $newStatus;
    }

    public function render()
    {
        return view('livewire.application-status');
    }
}
