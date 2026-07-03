@php
    $ogTitle       = ($page->title ? $page->title . ' — ' : '') . $page->siteName;
    $ogDescription = $page->excerpt ?? $page->description;
    $ogImage       = rtrim($page->baseUrl, '/') . ($page->cover ?? $page->image ?? $page->openGraph['image']);
    $ogUrl         = $page->getUrl();
@endphp

{{-- Open Graph --}}
<meta property="og:type" content="{{ $page->openGraph['type'] }}">
<meta property="og:site_name" content="{{ $page->siteName }}">
<meta property="og:locale" content="{{ $page->openGraph['locale'] }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:url" content="{{ $ogUrl }}">
<meta property="og:image" content="{{ $ogImage }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="{{ $page->openGraph['twitter'] }}">
<meta name="twitter:title" content="{{ $ogTitle }}">
<meta name="twitter:description" content="{{ $ogDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">
