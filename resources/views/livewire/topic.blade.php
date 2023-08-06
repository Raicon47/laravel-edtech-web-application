<section class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb d-flex justify-content-center">
        @forelse ($topics as $topic)
        <li class="breadcrumb-item">
            <a href="{{route('topic', $topic->slug)}}" class="text-muted">
                {{$topic->name}}
            </a>
        </li>
        @empty
           <div class="alert alert-warning">empty</div>
        @endforelse
        {{-- <li class="breadcrumb-item active" aria-current="page">Library</li> --}}
      </ol>
    </nav>
</section>
