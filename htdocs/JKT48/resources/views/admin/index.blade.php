@extends("app")
@section("content")
    <div class="relative overflow-x-auto shadow-xl rounded my-5">
        <table class="w-full text-left">
            <thead class="text-lg text-pink-700 bg-pink-300 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-4">
                        Action
                    </th>
            </tr>
            </thead>
            <tbody>
                @foreach($artikels as $artikel)
                    <tr class="bg-white border-b text-base text-black border-pink-200">
                        <td class="px-6 py-5">
                            <img class="w-60" src="{{ asset("/images/".$artikel->image) }}" alt="">
                        </td>
                        <td class="px-6 py-5">{{ $artikel->judul }}</td>
                        <td class="px-6 py-5">{{ $artikel->time }}</td>
                        <td class="px-6 py-5 text-lg">
                            <a href="{{ route("admin.store", $artikel->id_artikel) }}" class="font-medium text-yellow-600 hover:underline">Edit</a>
                            <span class="mx-5">|</span>
                            <form id="delete" class="w-fit inline" method="POST" onsubmit="confirm(); return false;">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="id_artikel" value="{{ $artikel->id_artikel }}">
                                <button class="font-medium text-red-600 hover:underline" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route("admin.store") }}">
        <button class="mt-10 px-6 py-3 border border-pink-700 text-lg text-pink-700 text-center rounded-xl bg-pink-200 hover:opacity-[1.1]">+ Add Article</button>
    </a>
    <a href="{{ route("admin.anggota") }}">
        <button class="ms-5 mt-10 px-6 py-3 border border-pink-700 text-lg text-pink-700 text-center rounded-xl bg-pink-200 hover:opacity-[1.1]">Members</button>
    </a>
    <script>
        async function confirm(){
            let res = await Swal.fire({
                title: "Peringatan",
                text: "Apakah kamu yakin akan menghapus artikel ini?",
                icon: "warning",
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batalkan",
                confirmButtonColor: "#F00",
                showCancelButton: true
            });
            if(res.isConfirmed) document.getElementById("delete").submit();
        }
    </script>
@endsection
