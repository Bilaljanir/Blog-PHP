@extends('layouts.main')

@section('title')
    @if (isset($category))
        {{ ucfirst($category->name_fr) }} Articles
    @elseif(isset($tag))
        {{ ucfirst($tag->name) }} Articles
    @else
        Accueil
    @endif
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row row-cols-3">
                @isset($postsPremium)
                    @foreach ($postsPremium as $post)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset($post->photo) }}"
                                     class="card-img-top img-fluid"
                                     alt="{{ $post->title_fr }}">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">
                                        @if(session()->get('lang') === 'fr')
                                            {{ $post->title_fr }}
                                        @else
                                            {{ $post->title_en }}
                                        @endif
                                    </h5>
                                    <p class="card-text">
                                        @if(session()->get('lang') === 'fr')
                                            {{ Str::limit($post->body_fr, 100) }}
                                        @else
                                            {{ Str::limit($post->body_en, 100) }}
                                        @endif
                                    </p>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                        @if(session()->get('lang') === 'fr')
                                            Voir
                                        @else
                                            View
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset

                    @foreach ($posts as $post)
                        <div class="col my-lg-1">
                            <div class="card h-100">
                                <img src="{{ asset($post->photo) }}" class="card-img-top img-fluid w-100" alt="{{ $post->title_fr }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold">
                                        @if(session()->get('lang') === 'fr')
                                            {{ $post->title_fr }}
                                        @else
                                            {{ $post->title_en }}
                                        @endif
                                    </h5>
                                    <p class="card-text flex-grow-1">
                                        @if(session()->get('lang') === 'fr')
                                            {{ Str::limit($post->body_fr, 100) }}
                                        @else
                                            {{ Str::limit($post->body_en, 100) }}
                                        @endif
                                    </p>

                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-eye"></i>
                                        @if(session()->get('lang') === 'fr')
                                            Voir
                                        @else
                                            View
                                        @endif
                                    </a>
                                    <form id="favorForm" action="{{ route('favors.add', $post->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger mt-2">
                                            <i class="fas fa-heart"></i>
                                            Ajouter aux favoris
                                        </button>
                                    </form>

                                    <script>
                                        document.getElementById('favorForm').addEventListener('submit', function(event) {
                                            event.preventDefault(); // Empêche le comportement par défaut du formulaire
                                            // Effectuez ici les actions supplémentaires que vous souhaitez effectuer sans rafraîchir la page

                                            // Par exemple, vous pouvez envoyer une requête AJAX au serveur pour ajouter les favoris
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', "{{ route('favors.add', $post->id) }}", true);
                                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                            xhr.onload = function() {
                                                // Traitez la réponse du serveur ici
                                            };
                                            xhr.send();

                                            return false; // Facultatif, assurez-vous que la soumission du formulaire ne rafraîchit pas la page
                                        });
                                    </script>


                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>

            <!-- Ajout de la pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links() }}
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Informations de contact</h4>
                    <p>Adresse: Rue de la plaine 53</p>
                    <p>Téléphone: +41 077 952 40 42</p>
                    <p>Email: bilaljanir@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <h4>Newsletter</h4>
                    <div class="d-flex justify-content-center">
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram fa-2x mx-3"></i>
                        </a>
                        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-f fa-2x mx-3"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-youtube fa-2x mx-3"></i>
                        </a>
                        <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter fa-2x mx-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

@endsection
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        color: #343a40;
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }

    .pagination .page-link:hover {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .pagination .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }
    .btn-outline-danger.favorite-btn {
        color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger.favorite-btn:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .fa-heart.filled {
        color: #dc3545;
    }

</style>
