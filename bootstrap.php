<?php

use Illuminate\Container\Container;
use TightenCo\Jigsaw\Events\EventBus;
use TightenCo\Jigsaw\Jigsaw;

/** @var Container $container */
/** @var EventBus $events */

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

// Genera la lista de destinatarios del formulario de contacto desde config.php
// (contact.emails) para que el handler PHP (assets/contacto.php) la lea en runtime.
// Así config.php sigue siendo la única fuente de verdad de los correos.
$events->afterBuild(function (Jigsaw $jigsaw) {
    $raw = $jigsaw->getConfig('contact.emails');
    $emails = [];
    if (is_iterable($raw)) {
        foreach ($raw as $email) {
            if (is_string($email) && $email !== '') {
                $emails[] = $email;
            }
        }
    }
    $path = $jigsaw->getDestinationPath() . '/assets/contacto-destinatarios.json';
    file_put_contents($path, json_encode($emails, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
});
