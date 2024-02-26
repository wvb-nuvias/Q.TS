<?php

namespace App\Livewire\Integrations;

use Livewire\Component;
use App\Models\Integration;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\Log;
use App\Models\Brand;

class IntegrationTile extends Component
{
    public User $user;
    public $integration;
    public $tenant_id;
    public $rights;
    public $brands;
    public $enabled,$active,$settings,$hasrun;

    public function mount()
    {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
        $this->tenant_id=$this->user->tenant_id;
        $this->brands=Brand::all();
        $this->settings=$this->integration->getsettings();
        $this->hasrun=$this->integration->getsetting('hasrun');

        //check if there are settings, $this->settings count > 0, anders icoon tonen in rood om aandacht te trekken, nog niet geconfigureerd.

        if ($this->integration->getsetting('active')=="true")
        {
            $this->active=true;
            //toon icoon active, en disable indien tenantadmin
        }

        if ($this->integration->getsetting('enabled')=="true")
        {
            $this->enabled=true;
            //toon icoon enabled en disable
        }

        if ($this->integration->getsetting('hasrun')=="true")
        {
            $this->hasrun=true;
            //toon icoon hasrun
        }


    }

    public function render()
    {

        return view('livewire.integrations.integration-tile');
    }


}
