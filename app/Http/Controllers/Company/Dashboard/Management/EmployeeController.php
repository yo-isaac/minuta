<?php

namespace App\Http\Controllers\Company\Dashboard\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Dashboard\Management\Employee\RegisterRequest as Request;

class EmployeeController extends Controller
{
    public function __construct() {
    }

    public function store(Request $request)
    {
        $requests = $request->all();

        return response()->noContent(200);
    }
}
