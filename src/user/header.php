<?php
require_once '../config.php';

if (Auth::user()) {
    Auth::user()->name;
}
