<?php
    session_start();

    // Recupera i valori dalla sessione
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
    $cellulare = $_SESSION['cellulare'];
    $nPosti = $_SESSION['nPosti'];
    $nPostiTOT = $_SESSION['nPostiTOT'];
    $costoTOT = $_SESSION['costoTOT'];
    $numeroSicruo = $_SESSION['numeroSicuro'];

    function inviaSMS($destinatario, $messaggio) {
        $api_key = "7aa178e4";
        $api_secret = "lyAOdzS6TK8DpVVY";
        $mittente = "TeatroComFe"; // Max 11 caratteri

        $url = "https://rest.nexmo.com/sms/json";

        $data = [
            'api_key' => $api_key,
            'api_secret' => $api_secret,
            'to' => $destinatario,
            'from' => $mittente,
            'text' => $messaggio
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    // Esempio di utilizzo
    echo inviaSMS("+39".$cellulare, "Ciao! Messaggio inviato con Vonage.");
?>