<div class="books-gird" >
    @php
    $livres = $livres->appends(request()->query()); // Conserver les paramètres de la requête dans l'URL de pagination
    @endphp
<ul>
    @forelse ($livres as $livre)
    
        <li>
            <figure>
                <img src="{{ asset('storage/' . $livre->image) }}" alt="Book">
                <figcaption>
                    <p><strong>{{ $livre->titre }}</strong></p>
                    <p><strong>Auteur:</strong> {{ $livre->auteur->auteur ?? 'Auteur non trouvé' }}</p>
                    <p><strong>Catégorie:</strong> {{ $livre->categorie->categorie ?? 'Catégorie non trouvée' }}</p>
                </figcaption>
            </figure>

            <div class="book-list-icon blue-icon"></div>

            <div class="single-book-box">
                <div class="post-detail">
                    <header class="entry-header">
                        <h3 class="entry-title">
                            <a href="books-media-detail-v1.html">{{ $livre->titre }}</a>
                        </h3>
                        <ul>
                            <li><strong>Auteur:</strong> {{ $livre->auteur->auteur ?? 'Auteur non trouvé' }}</li>
                            <li><strong>ISBN:</strong> {{ $livre->isbn }}</li>
                        </ul>
                    </header>

                    <footer class="entry-footer mt-2">

                        <button type="submit" class="btn btn-primary">Réserver</button>

                    </footer>
                </div>
            </div>
      
</li>

@empty

    <li>Aucun livre trouvé.</li>


@endforelse</ul>
</div>

<!-- Pagination améliorée -->
<div class="mt-3 d-flex justify-content-center align-items-center gap-2">
    <!-- Aller à la première page -->
    @if(!$livres->onFirstPage())
    <a href="{{ $livres->url(1) }}" class="btn btn-outline-primary shadow-sm">
        <i class="bi bi-chevron-double-left"></i> Première
    </a>
    @endif

    <!-- Bouton -5 pages -->
    @if($livres->currentPage() > 5)
    <a href="{{ $livres->url($livres->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
        <i class="bi bi-arrow-left-circle"></i> -5
    </a>
    @endif

    <!-- Pagination Laravel -->
    {{ $livres->links('pagination::bootstrap-5') }}

    <!-- Bouton +5 pages -->
    @if($livres->currentPage() + 5 <= $livres->lastPage())
        <a href="{{ $livres->url($livres->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
            +5 <i class="bi bi-arrow-right-circle"></i>
        </a>
        @endif

        <!-- Aller à la dernière page -->
        @if($livres->currentPage() < $livres->lastPage())
            <a href="{{ $livres->url($livres->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                Dernière <i class="bi bi-chevron-double-right"></i>
            </a>
            @endif
</div>
