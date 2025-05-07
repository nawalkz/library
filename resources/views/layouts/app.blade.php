<!DOCTYPE html>
<html lang="fr">
    @include('layouts.head')
    <body>
        @include('layouts.header')

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    @yield('content')
                </main>
            </div>
        </div>
        @include('layouts.navbar')
        @include('layouts.footer')
        @include('layouts.scripts')
    </body>
</html>