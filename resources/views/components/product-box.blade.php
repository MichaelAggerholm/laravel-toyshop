<section class="product-box">
    <div class="image">
        <img src="{{asset('storage/' . $product->image)}}" alt="">
        {{--Only display if logged in--}}
        @auth
            @if(auth()->user()->wishlist->contains($product))
                <form action="{{route('removeFromWishlist', $product->id)}}" method="post">
                    @csrf
                    <button type="submit" class="add-to-wishlist">Fjern fra ønskeliste</button>
                </form>

            @else
                <form action="{{route('addToWishlist', $product->id)}}" method="post">
                    @csrf
                    <button type="submit" class="add-to-wishlist">Tilføj til ønskeliste</button>
                </form>
            @endif
        @endauth
    </div>

    <a href="{{route('product', $product->id)}}">
        <div class="product-title">{{$product->title}}</div>
        <div class="color-plateletes">
            @foreach($product->colors as $color)
                <div class="color-platelete" style="background: {{$color->code}}"></div>
            @endforeach
        </div>
        <div class="product-category">{{$product->category->name}}</div>
        <div class="product-price">{{$product->price}} Dkk,-</div>
    </a>
</section>

