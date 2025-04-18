<?php
// test-curl.php

// Verificar conexión HTTPS a Google (puedes cambiar la URL si lo prefieres)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/oauth2/v4/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_CAINFO, "C:/laragon/bin/php/php-8.3.16-Win32-vs16-x64/extras/ssl/cacert.pem");  // Ruta correcta
$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo "Conexión exitosa!";
}
curl_close($ch);
