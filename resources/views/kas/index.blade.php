@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Kas</h1>

    <!-- Tombol Tambah Inline -->
    <button class="btn btn-primary mb-3" id="add-btn">Tambah Data</button>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <tr id="row-1">
                <td>1</td>
                <td class="nama">Izzan</td>
                <td class="tanggal">2025-01-05</td>
                <td class="jumlah">Rp 50.000</td>
                <td class="keterangan">Bayar Januari</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="1">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-2">
                <td>2</td>
                <td class="nama">Siti</td>
                <td class="tanggal">2025-02-05</td>
                <td class="jumlah">Rp 45.000</td>
                <td class="keterangan">Bayar Februari</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="2">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-3">
                <td>3</td>
                <td class="nama">Tio</td>
                <td class="tanggal">2025-03-05</td>
                <td class="jumlah">Rp 50.000</td>
                <td class="keterangan">Bayar Maret</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="3">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-4">
                <td>4</td>
                <td class="nama">Hana</td>
                <td class="tanggal">2025-04-05</td>
                <td class="jumlah">Rp 40.000</td>
                <td class="keterangan">Bayar April</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="4">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-5">
                <td>5</td>
                <td class="nama">Afgan</td>
                <td class="tanggal">2025-05-05</td>
                <td class="jumlah">Rp 45.000</td>
                <td class="keterangan">Bayar Mei</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="5">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
function attachEditEvents() {
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const row = document.getElementById('row-' + id);

            const nama = row.querySelector('.nama').innerText;
            const tanggal = row.querySelector('.tanggal').innerText;
            const jumlah = row.querySelector('.jumlah').innerText;
            const keterangan = row.querySelector('.keterangan').innerText;

            row.innerHTML = `
                <td>${id}</td>
                <td><input type="text" class="form-control nama-input" value="${nama}"></td>
                <td><input type="date" class="form-control tanggal-input" value="${tanggal}"></td>
                <td><input type="text" class="form-control jumlah-input" value="${jumlah}"></td>
                <td><input type="text" class="form-control keterangan-input" value="${keterangan}"></td>
                <td>
                    <button class="btn btn-success btn-sm save-btn">Simpan</button>
                    <button class="btn btn-secondary btn-sm cancel-btn">Batal</button>
                </td>
            `;

            row.querySelector('.cancel-btn').addEventListener('click', () => {
                row.innerHTML = `
                    <td>${id}</td>
                    <td class="nama">${nama}</td>
                    <td class="tanggal">${tanggal}</td>
                    <td class="jumlah">${jumlah}</td>
                    <td class="keterangan">${keterangan}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${id}">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                `;
                attachEditEvents();
            });

            row.querySelector('.save-btn').addEventListener('click', () => {
                const updatedNama = row.querySelector('.nama-input').value;
                const updatedTanggal = row.querySelector('.tanggal-input').value;
                const updatedJumlah = row.querySelector('.jumlah-input').value;
                const updatedKeterangan = row.querySelector('.keterangan-input').value;

                row.innerHTML = `
                    <td>${id}</td>
                    <td class="nama">${updatedNama}</td>
                    <td class="tanggal">${updatedTanggal}</td>
                    <td class="jumlah">${updatedJumlah}</td>
                    <td class="keterangan">${updatedKeterangan}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${id}">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                `;
                attachEditEvents();
            });
        });
    });
}
attachEditEvents();

// Tambah baris baru
document.getElementById('add-btn').addEventListener('click', () => {
    const tableBody = document.getElementById('table-body');
    const newId = tableBody.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.id = 'row-' + newId;
    newRow.innerHTML = `
        <td>${newId}</td>
        <td><input type="text" class="form-control nama-input"></td>
        <td><input type="date" class="form-control tanggal-input"></td>
        <td><input type="text" class="form-control jumlah-input"></td>
        <td><input type="text" class="form-control keterangan-input"></td>
        <td>
            <button class="btn btn-success btn-sm save-btn">Simpan</button>
            <button class="btn btn-secondary btn-sm cancel-btn">Batal</button>
        </td>
    `;
    tableBody.appendChild(newRow);

    newRow.querySelector('.cancel-btn').addEventListener('click', () => {
        newRow.remove();
    });

    newRow.querySelector('.save-btn').addEventListener('click', () => {
        const nama = newRow.querySelector('.nama-input').value;
        const tanggal = newRow.querySelector('.tanggal-input').value;
        const jumlah = newRow.querySelector('.jumlah-input').value;
        const keterangan = newRow.querySelector('.keterangan-input').value;

        newRow.innerHTML = `
            <td>${newId}</td>
            <td class="nama">${nama}</td>
            <td class="tanggal">${tanggal}</td>
            <td class="jumlah">${jumlah}</td>
            <td class="keterangan">${keterangan}</td>
            <td>
                <button class="btn btn-warning btn-sm edit-btn" data-id="${newId}">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        `;
        attachEditEvents();
    });
});
</script>
@endsection