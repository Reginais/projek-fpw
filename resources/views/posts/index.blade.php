<div>
    <!-- It is never too late to be what you might have been. - George Eliot -->
     <p>Whats up</p>
     @foreach ($posts as $post )
         <h2>{{ $post -> title }}</h2>
         @if ($post -> published)
            <span>Published</span>
        @else
            <span>Draft</span>
        @endif
     @endforeach

</div>
