<!DOCTYPE html>
<html>

<head>
    <title>Nuova richiesta in arrivo</title>
</head>

<body>
    <div style="background-color: #F0F4F8; padding: 20px;">
        <h1 style="color: #2E3A48; font-size: 28px; font-family: Arial, sans-serif;">Nuovo post inserito</h1>
        <hr style="border: none; border-top: 2px solid #C9D5E2; margin: 20px 0;">
        <p style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif;">
            Nuova richiesta:
        </p>
        <ul
            style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif; list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 10px;">
                <strong>Nome:</strong> {{$lead->name}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Cognome:</strong> {{$lead->surname}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Email:</strong> {{$lead->email}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Telefono:</strong> {{$lead->phone}}
            </li>
            <li style="margin-bottom: 10px;">
                <strong>Testo:</strong> {{$lead->message}}
            </li>
        </ul>
        <p style="color: #2E3A48; font-size: 16px; font-family: Arial, sans-serif;">
            Per ulteriori dettagli, si prega di accedere alla piattaforma.
        </p>
    </div>
</body>

</html>