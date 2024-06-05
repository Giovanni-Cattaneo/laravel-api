<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $lead = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Lead::to('destinatario@example.com')->send(new LeadController((object) $lead));

        return response()->json(['message' => 'Email inviata con successo!']);
    }
}
