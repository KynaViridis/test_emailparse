<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessfulEmail;

class EmailController extends Controller
{
    public function index()
    {
        return response()->json(SuccessfulEmail::all());
    }

    public function show($id)
    {
        $email = SuccessfulEmail::find($id);

        if ($email) {
            return response()->json($email);
        } else {
            return response()->json(['message' => 'Email not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $email = SuccessfulEmail::create($request->all());
        return response()->json($email, 201);
    }

    public function update(Request $request, $id)
    {
        $email = SuccessfulEmail::find($id);

        if ($email) {
            $email->update($request->all());
            return response()->json($email);
        } else {
            return response()->json(['message' => 'Email not found'], 404);
        }
    }

    public function destroy($id)
    {
        $email = SuccessfulEmail::find($id);

        if ($email) {
            $email->delete();
            return response()->json(['message' => 'Email deleted']);
        } else {
            return response()->json(['message' => 'Email not found'], 404);
        }
    }
}
