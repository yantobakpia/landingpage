@extends("app")
@section("content")
    <form action="{{ route("admin.index") }}" method="POST" class="p-3" enctype="multipart/form-data">
        @if(isset($artikel))
            @method("PUT")
            <input type="hidden" name="id_artikel" value="{{ $artikel->id_artikel }}">
        @endif
        @csrf
        <h1 class="text-2xl font-medium">
            @if(isset($artikel))
                Edit
            @else
                Tambah
            @endif
            Artikel
        </h1>
        <div class="text-lg mt-3">Judul</div>
        <input class="w-full mt-2 border-2 px-2 py-1" name="judul"
        @if(isset($artikel))
            value="{{ $artikel->judul }}"
        @endif>
        <div class="text-lg mt-3">Isi</div>
        <textarea class="w-full mt-2 border-2 px-2 py-1" name="isi" rows="10">@if(isset($artikel)){{ $artikel->isi }}@endif</textarea>
        <div class="text-lg mt-2">Image</div>
        <input class="w-full" type="file" name="image" accept="image/jpeg,image/png">
        @if(isset($artikel))
            <img class="w-1/3 mt-3" alt="Preview" src="{{ asset("images/".$artikel->image) }}">
            <button class="px-5 py-1 bg-yellow-300 rounded mt-3">Edit</button>
        @else
            <button class="px-2 py-1 bg-blue-400 text-white rounded mt-3">Tambah</button>
        @endif
    </form>
@endsection
