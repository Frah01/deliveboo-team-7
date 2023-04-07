<!DOCTYPE html>
<html>

<head>
    <title>Nuovo ordine in arrivo</title>
</head>

<body>
    <div style="background-color: #F0F4F8; padding: 20px;">
        <h1 style="color: #2E3A48; font-size: 28px; font-family: Arial, sans-serif;">Nuovo ordine</h1>
        <hr style="border: none; border-top: 2px solid #C9D5E2; margin: 20px 0;">
        <ul
            style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif; list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 10px;">
                <strong>Nome:</strong> {{$lead->nome}} {{$lead->cognome}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Data:</strong> {{$lead->data}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Telefono:</strong> {{$lead->telefono}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Email:</strong> {{$lead->email}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Note:</strong> {{$lead->note}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Indirizzo:</strong> {{$lead->indirizzo}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Prezzo totale:</strong> {{$lead->prezzo_totale}}&euro;
            </li>
        </ul>
        <p style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif;">
            Per ulteriori dettagli, si prega di accedere alla piattaforma.
        </p>
    </div>
</body>

</html>