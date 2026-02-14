@extends("app")
@section("content")
    <div class="grid grid-cols-[80%_auto] my-10">
        <div class="ml-10">
            <div class="w-full">
                <img alt="Preview" src="/images/{{ $artikel->image }}" class="w-[700px]">
            </div>
            <div class="w-full">
                <h1 class="text-4xl font-bold my-10">{{ $artikel->judul }}</h1>
            </div>
            @foreach(explode("\n", $artikel->isi) as $isi)
                <div class="border-r border-red-500 mt-10">
                    <p class="text-xl mr-20">{{ $isi }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
