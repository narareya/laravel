<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardiansController extends Controller
{
    public function guardian() {
        $guardians = Guardian::all();

        return view('guardian', [
            'title' => 'Guardian Page',
            'guardians' => $guardians
        ]);
    }
}
