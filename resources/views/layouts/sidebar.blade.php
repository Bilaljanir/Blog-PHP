<div class="col-md-4">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h4>
                @if(session()->get('lang') === 'fr')
                    Catégories
                @else
                    Categories
                @endif
            </h4>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <a href="{{url('/')}}" class="btn btn-link text-decoration-none text-dark">
                        @if(session()->get('lang') === 'fr')
                            Toutes les Posts
                            <span class="badge bg-primary rounded-pill">
                                {{\App\Models\Post::count()}}
                            </span>
                        @else
                            All Posts
                            <span class="badge bg-primary rounded-pill">
                                {{\App\Models\Post::count()}}
                            </span>
                        @endif
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <a href="{{route('category.posts', $category)}}" class="btn btn-link text-decoration-none text-dark">
                            @if(session()->get('lang') === 'fr')
                                {{$category->name_fr}}
                            @else
                                {{$category->name_en}}
                            @endif
                        </a>
                        <span class="badge bg-primary rounded-pill">
                            {{$category->posts()->count()}}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    // Récupérez tous les éléments de catégorie
    const categoryItems = document.querySelectorAll('.list-group-item-action');
    categoryItems.forEach(item => {
        // Ajoutez un écouteur d'événement pour le survol
        item.addEventListener('mouseover', () => {
            item.classList.add('shadow-lg');
        });
        item.addEventListener('mouseout', () => {
            item.classList.remove('shadow-lg');
        });
    });
</script>
