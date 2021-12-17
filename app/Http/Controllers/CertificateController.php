<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


}
