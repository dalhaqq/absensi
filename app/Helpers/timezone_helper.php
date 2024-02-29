<?php

const TIMEZONE = 'Asia/Jakarta';

function time_now()
{
    return Carbon\Carbon::now()->timezone(TIMEZONE);
}