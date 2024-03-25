<?php

namespace App\Livewire\Imports;

use Livewire\Component;
use App\Models\Log;
use App\Models\User;
use App\Models\Integration;
use App\Models\Device;
use App\Models\UserSetting;
use Livewire\Attributes\On;

class Imports extends Component
{
    public bool $showImportModal, $showConfirmImportModal = false;
    public User $user;
    public $rights;
    public $mode="phase1";
    public $source=null;
    public $destination=null;
    public $sources=["c-s-v","my-s-q-l","a-p-i"];
    public $integration=null;
    public $integrations =["afas","beneluxportal"];
    public $title;

    #[On('show-dialog-imports')]
    public function openImportModal()
    {
        $this->showImportModal = true;
    }

    public function switchmode($mode)
    {
        $this->mode=$mode;
    }

    public function cancel() {
        $this->showImportModal = false;
    }

    public function cancelImportModal()
    {
        $this->cancel();
    }

    public function switchsource($source)
    {
        $this->source=$source;
    }

    public function mount() {
        $this->user = auth()->user();
        $this->rights = $this->user->rights();

        $this->sources = [
            ["name" => "API" , "icon" => "code", "color" => "blue", "description" => "Import Data From an API source"],
            ["name" => "CSV" , "icon" => "file-csv", "color" => "yellow", "description" => "Import data from a csv file"],
            ["name" => "Json" , "icon" => "file-code", "color" => "emerald", "description" => "Import data from a json file"],
            ["name" => "MySQL" , "icon" => "database", "color" => "pink", "description" => "Import data from database"]
        ];

        $this->integrations=Integration::select('integration_name','integration_icon','integration_color','integration_description')
                ->where('integration_type',2)->get();
        foreach($this->integrations as $integration) {
            $this->sources[] = ["name" => $integration->integration_name, "icon" => $integration->integration_icon, "color" => $integration->integration_color, "description" => $integration->integration_description];
        }

        //dd($this->sources);

        Log::create([
            "tenant_id"     => $this->user->tenant_id,
            "log_user_id"   => $this->user->id,
            "category"      => "System",
            "source"        => "Imports",
            "log_type"      => 3,
            "message"       => 'Imports Page is opened.',
            "log_date"      => now()
        ]);
    }


    public function render()
    {
        //check if user can do imports
        //for integrations
        //based on dir?
        $isintegration=false;

        if ($this->source)
        {
            //select integration or built-in

            if ($isintegration)
            {
                return view('livewire.imports.integrations.'.$this->integration.'.'.$this->mode);
            }
            else
            {
                return view('livewire.imports.'.$this->source.'.'.$this->mode);
            }
        }
        else
        {
            return view('livewire.imports.imports');
        }
    }

    public function save()
    {
        //set source

        $this->mode="phase1";
        $this->source=null;
        $this->integration=null;
    }

    public function test()
    {

    }
}
