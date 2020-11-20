<?php


function getTasks()
{
    $tasks = \App\Calendar::orderBy('id', 'asc')->take(8)->get();
    return $tasks;
}





