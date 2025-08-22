<?php

function pivotDataFromGame($pivotTable, $game, $attribute)
{
    $pivotIds = [];

    foreach ($pivotTable as $pivotRow) :
        if ($pivotRow->game_id === $game->id) :
            array_push($pivotIds, $pivotRow->$attribute);
        endif;
    endforeach;

    return $pivotIds;
}