<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: ../../login.php");
        exit;
    }

    if (!isset($_SESSION["active_login"])) {
        header("Location: ../../login.php");
        exit;
    }

    // Controlla se il cookie è impostato
    if (isset($_COOKIE["NomeUtente"])) {
        $user = $_COOKIE["NomeUtente"];
    }
    else {
        $user = "Utente non identificato";
    }

    if (isset($_POST['genera_pdf'])) {

        // Recupera i valori dalla sessione
        $nome = $_SESSION['nome'];
        $cognome = $_SESSION['cognome'];
        $email = $_SESSION['email'];
        $cellulare = $_SESSION['cellulare'];
        $nPosti = $_SESSION['nPosti'];
        $nPostiTOT = $_SESSION['nPostiTOT'];
        $costoTOT = $_SESSION['costoTOT'];
        $numeroSicuro = $_SESSION['numeroSicuro'];

        // Includi la libreria FPDF
        require('../../fpdf/fpdf.php');

        // Crea una nuova istanza di FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Imposta il font Arial
        $pdf->SetFont('Arial', '', 12); // Impostazione font base per il PDF

        // Titolo con numero ordine sicuro
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'CONFERMA ORDINE N° ' . $numeroSicuro, 0, 1, 'C');
        $pdf->Ln(10);

        // Saluto
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, "Gentile " . $nome . " " . $cognome . ",\nl'ordine da Lei effettuato e' avvenuto con successo!\nPer eventuali richieste o problematiche, puo' contattarci all'indirizzo email info@teatrocomunaleferrara.it");
        $pdf->Ln(10);

        // Dettagli ordine
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(100, 100, 100);  // Colore di riempimento per intestazione
        $pdf->Cell(0, 10, 'D E T T A G L I   O R D I N E', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

        // Larghezze fisse delle colonne (totale larghezza disponibile: 190mm)
        $col1 = 50; // Numero Ordine
        $col2 = 50; // Data e Ora
        $col3 = 50; // Numero Biglietti
        $col4 = 40; // Spesa

        // Stampa intestazioni
        $pdf->Cell($col1, 10, 'Numero Ordine', 1, 0, 'C', true);
        $pdf->Cell($col2, 10, 'Data e Ora', 1, 0, 'C', true);
        $pdf->Cell($col3, 10, 'Numero Biglietti', 1, 0, 'C', true);
        $pdf->Cell($col4, 10, 'Spesa', 1, 1, 'C', true);

        // Stampa contenuto
        $pdf->SetFillColor(255, 255, 255); // Ripristina il colore di riempimento bianco per i dati
        $pdf->Cell($col1, 10, $numeroSicuro, 1);
        $pdf->Cell($col2, 10, date("d-m-Y H:i:s"), 1);
        $pdf->Cell($col3, 10, $nPostiTOT . ' biglietti', 1);
        $pdf->Cell($col4, 10, "€ " . $costoTOT, 1);
        $pdf->Ln(20);

        // Dati anagrafici
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(100, 100, 100);  // Colore di riempimento per intestazione
        $pdf->Cell(0, 10, 'D A T I   A N A G R A F I C I', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

        // Larghezze fisse delle colonne (totale larghezza disponibile: 190mm)
        $col1 = 60; // Nominativo
        $col2 = 75; // Indirizzo Email
        $col3 = 55; // Numero di Telefono

        // Stampa intestazioni
        $pdf->Cell($col1, 10, 'Nominativo', 1, 0, 'C', true);
        $pdf->Cell($col2, 10, 'Indirizzo Email', 1, 0, 'C', true);
        $pdf->Cell($col3, 10, 'Numero di Telefono', 1, 1, 'C', true);

        // Stampa contenuto
        $pdf->SetFillColor(255, 255, 255); // Ripristina il colore di riempimento bianco per i dati
        $pdf->Cell($col1, 10, $nome . " " . $cognome, 1);
        $pdf->Cell($col2, 10, $email, 1);
        $pdf->Cell($col3, 10, $cellulare, 1);
        $pdf->Ln(20);

        // Dettagli biglietti
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(100, 100, 100);  // Colore di riempimento per intestazione
        $pdf->Cell(0, 10, 'B I G L I E T T I', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);

        // Larghezze fisse delle colonne (totale larghezza disponibile: 190mm)
        $col1 = 80; // Zona scelta
        $col2 = 40; // Quantità
        $col3 = 70; // Prezzo

        // Stampa intestazioni
        $pdf->Cell($col1, 10, 'Zona scelta', 1, 0, 'C', true);
        $pdf->Cell($col2, 10, 'Quantità', 1, 0, 'C', true);
        $pdf->Cell($col3, 10, 'Prezzo', 1, 1, 'C', true);

        // Stampa contenuto
        $pdf->SetFillColor(255, 255, 255); // Ripristina il colore di riempimento bianco per i dati
        foreach ($_SESSION['carrello'] as $zona => $prezzo) {
            $pdf->Cell($col1, 10, $zona, 1);
            $pdf->Cell($col2, 10, $nPosti . ' biglietti', 1);
            $pdf->Cell($col3, 10, "€ " . $prezzo*$nPosti, 1);
            $pdf->Ln();
        }

        // Output del PDF direttamente al browser per il download
        $pdf->Output('D', 'documento_ordini_' . $numeroSicuro . '.pdf');

        // Fermare l'esecuzione del codice per evitare l'output HTML
        exit();
    }
?>