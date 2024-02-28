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

        $button=Actions::button($id,'eye','view_'.$page,'green','View',$user->hasright('VIEW_'.$short));
        if ($button) $buttons[]=$button;

        if ($row->incident_status_id!=6)
        {
            $button=Actions::button($id,'pen','edit_'.$page,'amber','Edit',$user->hasright('EDIT_'.$short));
            if ($button) $buttons[]=$button;

            $button=Actions::button($id,'trash-can','delete_'.$page,'red','Delete',$user->hasright('DELETE_'.$short));
            if ($button) $buttons[]=$button;

            $button=Actions::button($id,'lock','close_'.$page,'purple','Close',$user->hasright('CLOSE_'.$short));
            if ($button) $buttons[]=$button;
        } else
        {
            $button=Actions::button($row->incident_nr,'unlock','reopen_'.$page,'blue','ReOpen',$user->hasright('REOPEN_'.$short));
            if ($button) $buttons[]=$button;
        }
        return $buttons;
    }

    public static function getGUID($fromtext){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5($fromtext));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
}
