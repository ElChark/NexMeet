<?php

namespace Core\middleware;

use Core\Functions;
use Exception;

class UserFriendlyOnly
{
    private $aiApiUrl;
    private $aiApiKey;

    public function __construct()
    {
        // Configuración para Gemini API
        $this->aiApiKey = 'AIzaSyDyqE-MepxLXiTVr4P5yY5MadwKGW-KpbE';
        $this->aiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . $this->aiApiKey;
    }

    public function handle()
    {
        if (!isset($_POST['contenido'])) {
            header("Location: /notAuthorized");
            exit();
        }
        $contenido = trim($_POST['contenido']);

        try {
            $esSeguro = $this->revisarContenido($contenido);

            if (!$esSeguro) {
                // redirigir
                header("Location: /notAuthorized");
                exit();
            }
        } catch (Exception $e) {
        }
    }

    private function revisarContenido($contenido)
    {
        ///Llamamos a nuestro mentor gemini
        $curl = curl_init();

        //Definimos bien el prompt
        $prompt = "Eres un moderador de contenido para una red social familiar. Analiza el siguiente texto y determina si es apropiado para una comunidad segura. Responde ÚNICAMENTE con 'SEGURO' si el contenido es apropiado (sin violencia explícita, discurso de odio, contenido sexual explícito, spam, amenazas o lenguaje extremadamente ofensivo) o 'PELIGROSO' si no es apropiado. No agregues explicaciones adicionales.\n\nContenido a analizar: " . $contenido;

        $datos = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt
                        ]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.1,
                'maxOutputTokens' => 10,
                'topP' => 0.1,
                'topK' => 1
            ]
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->aiApiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($datos),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
            ],
        ]);

        $respuesta = curl_exec($curl);
        $codigoHttp = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $error = curl_error($curl);

        curl_close($curl);


        //Manejo de errore que se puedan presentar 
        if ($error) {
            throw new Exception("Error cURL: " . $error);
        }

        if ($codigoHttp !== 200) {
            throw new Exception("Error HTTP: " . $codigoHttp . " - Respuesta: " . $respuesta);
        }

        if ($respuesta === false) {
            throw new Exception("No se pudo conectar con Gemini API");
        }



        $resultado = json_decode($respuesta, true);

        if (!$resultado || !isset($resultado['candidates'][0]['content']['parts'][0]['text'])) {
            throw new Exception("Respuesta inválida de Gemini API");
        }

        $respuestaIA = trim(strtoupper($resultado['candidates'][0]['content']['parts'][0]['text']));


        //Functions::dd($respuestaIA);
        // Verificar si la IA considera el contenido seguro
        return strpos($respuestaIA, 'SEGURO') !== false;
    }
}

