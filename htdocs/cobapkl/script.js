window.onload = function() {
    loadTable();

    const form = document.getElementById('crud-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        submitForm();
    });
};

function loadTable() {
    const container = document.getElementById('data-container');
    container.innerHTML = 'Loading...';

    fetch('fetch.php')
        .then(response => response.json())
        .then(data => {
            let table = '<table>';
            table += '<tr><th>ID</th><th>Nama</th><th>Nomor HP</th><th>Jenis Kelamin</th><th>Asal</th><th>Ikut Seminar</th><th>Aksi</th></tr>';
            
            data.forEach(item => {
                table += `<tr>
                            <td>${item.id}</td>
                            <td>${item.nama}</td>
                            <td>${item.nomor_hp}</td>
                            <td>${item.jenis_kelamin}</td>
                            <td>${item.asal}</td>
                            <td>${item.ikut_seminar == 1 ? 'Ya' : 'Tidak'}</td>
                            <td>
                                <button onclick="editItem(${item.id})">Edit</button>
                                <button onclick="deleteItem(${item.id})">Hapus</button>
                            </td>
                        </tr>`;
            });

            table += '</table>';
            container.innerHTML = table;
        });
}

function submitForm() {
    const form = document.getElementById('crud-form');
    const formData = new FormData(form);

    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            form.reset();
            loadTable();
        } else {
            alert('Gagal menyimpan data.');
        }
    });
}

function editItem(id) {
    fetch(`fetch.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            const form = document.getElementById('crud-form');
            form['id'].value = data.id;
            form['nama'].value = data.nama;
            form['nomor_hp'].value = data.nomor_hp;
            form['jenis_kelamin'].value = data.jenis_kelamin;
            form['asal'].value = data.asal;
            form['ikut_seminar'].checked = data.ikut_seminar == 1;
        });
}

function deleteItem(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        fetch(`delete.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadTable();
                } else {
                    alert('Gagal menghapus data.');
                }
            });
    }
}
