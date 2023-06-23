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
                            <img src="{{ asset($post->photo) }}"
                                 class="card-img-top img-fluid w-100"
                                 alt="{{ $post->title_fr }}">
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
                            </div>
                        </div>
                    </div>
                @endforeach
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
                    <p>Téléphone: +41 077 952 40 42 </p>
                    <p>Email: bilaljanir@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <h4>Newsletter</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1398041.1378619722!2d8.22421005!3d46.8131873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sch!4v1687523850074!5m2!1sfr!2sch" width="250" height="140" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>

@endsection
<style></style>
