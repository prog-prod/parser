<?php

function user() : \Illuminate\Contracts\Auth\Authenticatable
{
    return auth()->user();
}
