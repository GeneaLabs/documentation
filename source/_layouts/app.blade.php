<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/images/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif

        @stack ('styles')
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-900 leading-normal font-sans">
        <div id="app">
            <header class="flex items-center shadow bg-white border-b h-24 py-4" role="banner">
                <div class="container flex items-center mx-auto px-4 lg:px-8">
                    <div class="flex items-center">
                        <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                            <img class="h-8 md:h-10 mr-3" src="/assets/images/genealabs_logo_new.png" alt="{{ $page->siteName }} logo" />
                        </a>
                    </div>

                    @yield ("top-menu")

                </div>

                @yield('nav-toggle')
            </header>

            <main role="main"
                class="w-full flex-auto relative"
            >
                @yield('body')
            </main>
        </div>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <footer class="bg-white text-center text-sm py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center list-reset">
                <li class="md:mr-2">
                    &copy;
                    <a
                        class="text-green-600 hover:text-green-900"
                        href="https://genealabs.com"
                        title="GeneaLabs website"
                    >GeneaLabs</a>
                    {{ date('Y') }}.
                </li>
                <li class="md:mr-2">
                    <a
                        class="text-green-600 hover:text-green-900"
                        href="https://genealabs.com/privacy-policy"
                        title="Privacy Policy"
                    >Privacy Policy</a>
                </li>
                <li class="md:mr-2">
                    <a
                        class="text-green-600 hover:text-green-900"
                        href="https://genealabs.com/terms-of-service"
                        title="Terms of Service"
                    >Terms of Service</a>
                </li>
                <li class="md:mr-2">
                    <a
                        class="text-green-600 hover:text-green-900"
                        href="https://genealabs.com/disclaimer"
                        title="Disclaimer"
                    >Disclaimer</a>
                </li>
            </ul>
        </footer>
    </body>
</html>
