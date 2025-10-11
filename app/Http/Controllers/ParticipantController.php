<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function index(){
        return view('participants.create'); // Retorna a view para criar um participante
    }

    public function store(Request $request){
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:participants,email',
            'phone' => 'required|string|max:20|unique:participants,phone',
        ]);

        // Remove caracteres não numéricos do telefone
        $validated['phone'] = preg_replace('/\D/', '', $validated['phone']);
        
        // Criação do participante no banco de dados
        Participant::create($validated); // Usa o modelo Participant validado para criar um novo registro

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
    }

}

