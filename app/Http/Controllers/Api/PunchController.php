<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PunchService;
use Illuminate\Http\Request;

class PunchController extends Controller
{
    protected $punchService;

    public function __construct(PunchService $punchService)
    {
        $this->punchService = $punchService;
    }


    public function store(Request $request)
    {
        $punch = $this->punchService->createPunch($request->user(), $request->ip(), $request->input('note'));

        return response()->json([
            'message' => 'Punch created successfully',
            'punch' => $punch
        ], 201);
    }

    public function index(Request $request)
    {
        return response()->json(
            $this->punchService->getUserPunches($request->user())
        );
    }
}