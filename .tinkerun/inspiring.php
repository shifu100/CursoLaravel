<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;

Inspiring::quote();


User::where('id', 1)->get();