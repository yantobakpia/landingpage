@extends("app")
@section("content")
    <div class="owl-carousel owl-theme mt-3">
        @foreach($artikels as $artikel)
            @if($loop->index > 6)
                @break
            @endif
            <div>
                <img alt="Carousel" src="/images/{{ $artikel->image }}" class="mx-2">
            </div>
        @endforeach

    </div>
    <h1 class="text-center text-xl mt-12 mb-12 font-bold">Artikel Populer</h1>
    <div class="w-full grid grid-cols-[80%_auto] gap-x-20 mx-auto">
        <div class="mt-5">
            @foreach($artikels as $artikel)
                <a href="/artikel/{{ $artikel->id_artikel }}">
                    <div class="grid grid-cols-[300px_auto] ml-10 mb-5 cursor-pointer border-r border-red-500 rounded-r-lg shadow-lg hover:border-r-[10px] hover:ease-in hover:duration-100 hover:drop-shoadow-lg">
                        <img src="/images/{{ $artikel->image }}" alt="Artikel" class="w-[250px] h-[175px]">
                        <div class="pr-5 mt-5">
                            <h1 class="text-xl font-bold">{{ $artikel->judul }}</h1>
                            <span class="text-gray-500">{{ substr($artikel->isi, 0, 150)."..." }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div>
            @foreach($artikels as $artikel)
                @if($loop->index > 4)
                    @break
                @endif
                <a class="h-44 block" href="/artikel/{{ $artikel->id_artikel }}">
                    <div class="mt-5 overflow-hidden relative w-full h-full">
                        <img class="ms-[50%] translate-x-[-50%] min-h-full object-cover" alt="Artikel" src="/images/{{ $artikel->image }}">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(() => $(".owl-carousel").owlCarousel({
            loop: true,
            autoplay: true,
        }));
    </script>
@endsection
