<?php

return [
    'production' => false,
    // Set to the production domain (e.g. 'https://jezga.com') so Open Graph
    // URLs/images are absolute, as social networks require.
    'baseUrl' => '',
    'siteName' => 'JEZGA Proyecto y Construcción S.A. de C.V.',
    'title' => null,
    'description' => 'Soluciones estructurales para un futuro sólido. Ingeniería, diseño y construcción de alta precisión.',
    'tagline' => 'Soluciones estructurales para un futuro sólido. Ingeniería, diseño y construcción de alta precisión.',

    // Open Graph / social share defaults. Pages override title/description
    // automatically; collection items also override the image with their cover.
    'openGraph' => [
        'image'   => '/assets/images/foto-1-100.jpg',
        'type'    => 'website',
        'locale'  => 'es_MX',
        'twitter' => 'summary_large_image',
    ],

    /*
    |---------------------------------------------------------------------------
    | Collections — content managed as files for easy editing
    |---------------------------------------------------------------------------
    | Add a service:  create source/_services/<slug>.md
    | Add a project:  create source/_projects/<slug>.md
    */
    'collections' => [
        'services' => [
            'path' => 'servicios/{filename}',
            'sort' => 'order',
        ],
        'projects' => [
            'path' => 'proyectos/{filename}',
            'sort' => 'order',
        ],
    ],

    // Primary navigation (keys map to each page's `active` front matter)
    'nav' => [
        'proyectos' => ['label' => 'Proyectos', 'url' => '/proyectos'],
        'servicios' => ['label' => 'Servicios', 'url' => '/servicios'],
        'seguridad' => ['label' => 'Seguridad', 'url' => '/seguridad'],
        'nosotros'  => ['label' => 'Nosotros',  'url' => '/nosotros'],
    ],

    // Leadership team (Nosotros page)
    'team' => [
        ['name' => 'Ing. Jesús Zavala García',            'role' => 'Director General'],
        ['name' => 'Ing. Diego Alejandro Hernández Rodríguez', 'role' => 'Departamento de Costos'],
        ['name' => 'Ing. Luis Enrique Zavala García',     'role' => 'Departamento de Construcción'],
        ['name' => 'Lic. Norma Elizabeth Flores Ramírez', 'role' => 'Departamento Administrativo'],
        ['name' => 'Ing. Luis Humberto Lujano García',    'role' => 'Supervisión'],
        ['name' => 'Julio César Mendoza Cueva',           'role' => 'Supervisión'],
    ],

    // Contact details (reused across footer + contact page)
    'contact' => [
        'address' => 'C. Niños Héroes 3, San Vicente',
        'city'    => '45672 Zapote del Valle, Jal., México',
        'phones'  => ['33 2241 0721', '33 2338 6186'],
        'emails'  => ['jezga.co@gmail.com', 'jezga.proyectos@gmail.com'],
        'country_code' => '+52',
        'geo'     => [
            'ref'    => 'GDL_20.51_-103.45',
            'label'  => 'Mapa_Site_Ref_01',
            'coords' => 'X: 20.5123 / Y: -103.4561',
        ],
    ],

    // Social networks (footer)
    'social' => [
        ['label' => 'Instagram', 'url' => 'https://www.instagram.com/jezga_/', 'icon' => 'instagram'],
    ],

    // Footer link columns (managed here, no hardcoded links in markup)
    'footer' => [
        'explorar' => [
            ['label' => 'Proyectos', 'url' => '/proyectos'],
            ['label' => 'Servicios', 'url' => '/servicios'],
            ['label' => 'Seguridad', 'url' => '/seguridad'],
            ['label' => 'Nosotros',  'url' => '/nosotros'],
        ],
        'legal' => [
            ['label' => 'Política de Privacidad', 'url' => '/privacidad'],
            ['label' => 'Términos de Servicio',   'url' => '/terminos'],
            ['label' => 'Mapa de Sitio',          'url' => '/mapa-de-sitio'],
        ],
    ],
];
