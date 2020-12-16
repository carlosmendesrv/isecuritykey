<?php

function instanceId()
{
    return auth()->user()->instance_id;
}

function instanceName()
{
    return auth()->user()->instance->name;
}
