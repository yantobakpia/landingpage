@extends("app")
@section("content")
    <div class="py-5 pl-10 text-2xl text-pink-700 bg-pink-400 font-bold ">Member JKT48</div>
    <button onclick="tambah()" class="ms-5 mt-10 px-6 py-3 border border-pink-700 text-lg text-pink-700 text-center rounded-xl bg-pink-200 hover:opacity-[1.1]">+ Add Members</button>
    <div class="grid grid-cols-5 my-5">
        @foreach($anggotas as $anggota)
            <div class="card p-3 mx-5 rounded-lg border border-pink-200 my-4">
                <img alt="Member" src="/images/{{ $anggota->image }}" class="w-full">
                <div class="font-bold text-xl text-center text-pink-500 bg-pink-200 mt-3 w-full p-5 rounded-xl">
                    {{ $anggota->nama }}
                </div>
                <form id="delete" method="POST" onsubmit="confirm(); return false;">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="id_anggota" value="{{ $anggota->id_anggota }}">
                    <button class="mt-2 font-medium text-red-600 hover:underline text-center w-full" type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <script>
        async function confirm(){
            let res = await Swal.fire({
                title: "Peringatan",
                text: "Apakah kamu yakin akan menghapus anggota ini?",
                icon: "warning",
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batalkan",
                confirmButtonColor: "#F00",
                showCancelButton: true
            });
            if(res.isConfirmed) document.getElementById("delete").submit();
        }
        async function tambah(){
            Swal.fire({
                title: 'Add Members',
                html: `<input type="text" id="nama" class="swal2-input" placeholder="Name">
                       <input type="file" id="image" class="swal2-file" placeholder="Image">`,
                showCancelButton: true,
                confirmButtonText: "Add",
                cancelButtonText: "Cancel",
                focusConfirm: false,
                preConfirm: () => {
                    const nama = Swal.getPopup().querySelector('#nama').value;
                    const image = Swal.getPopup().querySelector('#image').files[0];
                    return { nama, image };
                }
            }).then(res => {
                let form = new FormData();
                form.append("nama", res.value.nama);
                form.append("image", res.value.image);
                console.log(res.value.image);
                form.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: location.href,
                    method: "POST",
                    data: form,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: () => location.reload(),
                    error: err => console.log(err)
                });
            });
        }
    </script>
@endsection
