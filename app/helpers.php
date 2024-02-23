<?php

use App\Models\products;
use App\Models\section;
use App\Models\settings;

function getSettingsValue($key)
{
    $data = settings::where('key',$key)->first();
    if(isset($data->value)){
        return $data->value;
    }else{
        return 'empety';
    }
}

function getSectionData($key){
    $data = section::where('post_as',$key)->first();
    if(isset($data)){
        return $data;
    }
}

function getProducts(){
    $data = products::all();
    return $data;
}



















?>