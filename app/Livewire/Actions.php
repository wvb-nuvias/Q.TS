<?php

namespace App\Livewire;

use PowerComponents\LivewirePowerGrid\Button;
use Livewire\Component;

class Actions extends Component
{
    /*
    public function render()
    {
        return view('livewire.incidents-actions');
    }
    */

    public static function button($id,$icon,$dispatch,$color,$title,$hasright)
    {
        if ($hasright)
        {
            return Button::add($dispatch)
                ->slot('<i class="fa fas fa-solid fa-'.$icon.' fa-2xs fa-fw" title="'.$title.': '.$id.'"></i>')
                ->id()
                ->class('inline-flex items-center justify-center w-5 h-5 ml-1 bg-'.$color.'-600 opacity-80 dark:text-white hover:opacity-100 border border-white rounded-full focus:shadow-outline')
                ->dispatch($dispatch, ['rowId' => $id]);
        }

    }

    public static function action_buttons($id,$page,$short,$row,$user)
    {
        $buttons=[];

        $buttons[]=Actions::button($id,'eye','view_'.$page,'green','View',$user->hasright('VIEW_'.$short));

        if ($row->incident_status_id!=6)
        {
            $buttons[]=Actions::button($id,'pen','edit_'.$page,'amber','Edit',$user->hasright('EDIT_'.$short));
            $buttons[]=Actions::button($id,'trash-can','delete_'.$page,'red','Delete',$user->hasright('DELETE_'.$short));
            $buttons[]=Actions::button($id,'lock','close_'.$page,'purple','Close',$user->hasright('CLOSE_'.$short));
        } else
        {
            $buttons[]=Actions::button($row->incident_nr,'unlock','reopen_'.$page,'blue','ReOpen',$user->hasright('REOPEN_'.$short));
        }
        return $buttons;
    }
}
