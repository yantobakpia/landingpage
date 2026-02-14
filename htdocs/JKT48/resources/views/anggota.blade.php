@extends("app")
@section("content")
    <div class="py-5 pl-10 text-2xl text-pink-700 bg-pink-400 font-bold ">Member JKT48</div>
    <div class="grid grid-cols-5 my-10">
        @foreach($anggotas as $anggota)
            <div class="card p-3 mx-5 rounded-lg border border-pink-200 my-4">
                <img alt="Member" src="/images/{{ $anggota->image }}" class="w-full">
                <div class="font-bold text-xl text-center text-pink-500 bg-pink-200 mt-3 w-full p-5 rounded-xl">
                    {{ $anggota->nama }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
