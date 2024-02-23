<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
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

    }

    public function render()
    {
        return view('livewire.integrations');
    }
}
