<?php

namespace App\Livewire\Integrations;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use App\Models\Log;
use App\Models\Integration;
use App\Models\IntegrationType;
use App\Models\IntegrationSetting;

use App\Models\UserSetting;

class Integrations extends Component
{
    public User $user;
    public $active_integrations;
    public $inactive_integrations;
    public $tenant_id;
    public $rights;
    public $integration;
    public $mode='tiles';

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();
        $this->tenant_id=$this->user->tenant_id;

        $allids=IntegrationSetting::select('integration_id')
                    ->where('tenant_id',$this->tenant_id)
                    ->pluck('integration_id');
        $actids=IntegrationSetting::select('integration_id')
                    ->where('tenant_id',$this->tenant_id)
                    ->where('integration_setting_key','active')
                    ->where('integration_setting_val','true')
                    ->pluck('integration_id');

        $this->active_integrations=Integration::whereIn('id',$actids)->get();
        $this->inactive_integrations=Integration::whereIn('id',$allids)
                    ->whereNotIn('id',$actids)
                    ->get();

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Integrations",
            "log_type"      => 2,
            "message"       => 'Integrations Page is opened.',
            "log_date"      => now()
        ]);
    }

    public function render()
    {
        if ($this->user->hasright('VIEW_INC'))
        {
            if ($this->mode=="tiles")
            {
                return view('livewire.integrations.integrations');
            }
            elseif ($this->mode=="add")
            {
                $this->integration=new Integration();
                return view('livewire.integrations.add');
            }
            elseif ($this->mode=="settings")
            {
                //$this->integration=new Integration();
                return view('livewire.integrations.settings');
            }
        }
        else
        {
            return view('errors.403');
        }
    }

    public function updateIntegration()
    {
        $this->switchmode('tiles');
    }
}
