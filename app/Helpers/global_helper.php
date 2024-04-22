<?php

use App\Models\metadata;

function get_metavalue($metakey){
    $data = metadata::where('metakey',$metakey)->first();
    //kalau ada datanya, ditampilkan
    if($data){
        return $data->metavalue;
    }
}
