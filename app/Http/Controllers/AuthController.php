<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Participant;
use Fouladgar\OTP\Exceptions\InvalidOTPTokenException;
use Fouladgar\OTP\OTPBroker as OTPService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\TwilioSMSClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthController extends Controller
{
    protected $OTPService;

    public function __construct(OTPService $OTPService)
    {
        $this->OTPService = $OTPService;
    }

    public function loginPage()
    {
        return view('pages.loginPage'); // Retorna a view para a página de login
    }
    public function escolhaOTP()
    {
        return view('pages.escolha-metodo-codigo'); // Retorna a view para a página de login
    }

    public function validarOTP()
    {
        return view('pages.validarOTP'); // Retorna a view para a página de login
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'CPF' => 'required|string|max:20',
        ]); // Validação do CPF recebido

        
        try  {
            $participant = Participant::where('CPF', $validated['CPF'])->first(); // Busca o participante pelo CPF


        }catch (\Exception $e) {
            Log::error('CPF não encontrado: ');
            return redirect()->back()->withErrors(['CPF' => 'CPF não encontrado.']); //retorna para a página anterior com uma mensagem de erro
            // return response()->json(['error' => 'CPF não encontrado.'], 404);

        }

        // Envia o OTP usando o pacote (gera token, armazena e envia via Twilio)
        try {
            $this->OTPService->send($participant->getMobileForOTPNotification());
            
            Log::info('Enviando OTP para: ' . $participant->getMobileForOTPNotification());
            return redirect()->route('validarOTP')->with('success', 'Código de verificação enviado para o telefone registrado.');
        } catch (\Exception $e) {
            Log::error('Falha ao enviar OTP: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Falha ao enviar o código de verificação. Tente novamente.']);
        }

        
    }

    // public function validateOTP(Request $request)
    // {
    //     $validated = $request->validate([
    //         'otp' => 'required|string|size:6', //com base no token_length no config
    //     ]);

    //     $phone = $request->session()->get('phone'); // Ou via hidden input no form

    //     try {
    //         $participant = $this->OTPService->validate($phone, $validated['otp']);

    //         // Fazendo o login 
    //         Auth::login($participant);

    //         return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
    //     } catch (InvalidOTPTokenException $e) {
    //         return redirect()->back()->withErrors(['otp' => 'Código inválido ou expirado.']);
    //     } catch (\Exception $e) {
    //         Log::error('Falha ao validar OTP: ' . $e->getMessage());
    //         return redirect()->back()->withErrors(['error' => 'Erro ao validar o código. Tente novamente.']);
    //     }
    // }
}

    // public function sendOTP(Request $request): JsonResponse
    // {
    //     try {
    //         /** @var Participant $participant */
    //         $participant = $this->OTPService->send($request->get('phone'));
    //     } catch (Throwable $ex) {
    //       // or prepare and return a view.
    //        return response()->json(['message' => 'An unexpected error occurred.'], 500);
    //     }

    //     return response()->json(['message' => 'A token has been sent to:'. $participant->phone]);
    // }

    // public function verifyOTPAndLogin(Request $request): JsonResponse
    // {
    //     try {
    //         /** @var Participant $participant */
    //         $participant = $this->OTPService->validate($request->get('phone'), $request->get('token'));

    //         // and do login actions...

    //     } catch (InvalidOTPTokenException $exception){
    //          return response()->json(['error' => $exception->getMessage()],$exception->getCode());
    //     } catch (Throwable $ex) {
    //         return response()->json(['message' => 'An unexpected error occurred.'], 500);
    //     }

    //      return response()->json(['message' => 'Logged in successfully.']);
    // }
