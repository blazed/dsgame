<?php

namespace DsGame\Controllers;

use Illuminate\Routing\Controllers\Controller;
use Illuminate\Validation\Validator;

class BaseController extends Controller
{
    public $restful = true;

    public function __construct()
    {

    }

}
