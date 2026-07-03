<?php
/**
 * Credenciales SMTP para el envío del formulario de contacto.
 *
 * ▸ EDITA los valores con los datos reales de tu proveedor de correo.
 * ▸ Este archivo se ejecuta en el servidor: su contenido NO es visible
 *   para los visitantes (PHP no se sirve como texto).
 * ▸ No lo subas a un repositorio público con la contraseña real.
 *
 * Ejemplos de proveedor:
 *   Gmail  → host: smtp.gmail.com   | port: 587 | encryption: tls
 *            (usa una "Contraseña de aplicación", no la de la cuenta)
 *   Hosting→ revisa el panel (cPanel/Plesk) por los datos SMTP del dominio.
 */

return [
    'host'       => 'smtp.gmail.com',            // servidor SMTP
    'port'       => 587,                          // 587 (TLS) o 465 (SSL)
    'encryption' => 'tls',                        // 'tls' o 'ssl'
    'username'   => 'jezga.co@gmail.com',         // usuario SMTP
    'password'   => 'REEMPLAZAR_APP_PASSWORD',    // contraseña / App Password
    'from_email' => 'jezga.co@gmail.com',         // remitente (debe coincidir con el dominio/cuenta)
    'from_name'  => 'JEZGA Web',
];
