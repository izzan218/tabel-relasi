@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Siswa</h1>

    <!-- Tombol Tambah Inline -->
    <button class="btn btn-primary mb-3" id="add-btn">Tambah Data</button>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody id="table-body">
            
            <tr id="row-1">
                <td>1</td>
                <td class="nama">Izzan</td>
                <td class="nis">1001</td>
                <td class="jk">Laki-laki</td>
                <td class="alamat">Jl. Rudal</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="1">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="1">Hapus</button>
                </td>
            </tr>
            <tr id="row-2">
                <td>2</td>
                <td class="nama">Siti</td>
                <td class="nis">1002</td>
                <td class="jk">Perempuan</td>
                <td class="alamat">Jl. Kenanga No.2</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="2">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="2">Hapus</button>
                </td>
            </tr>
            <tr id="row-3">
                <td>3</td>
                <td class="nama">Tio</td>
                <td class="nis">1003</td>
                <td class="jk">Laki-laki</td>
                <td class="alamat">Jl. Aik pelempang</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="3">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="3">Hapus</button>
                </td>
            </tr>
            <tr id="row-4">
                <td>4</td>
                <td class="nama">Hana</td>
                <td class="nis">1004</td>
                <td class="jk">Laki-laki</td>
                <td class="alamat">Jl. Air saga</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="4">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="4">Hapus</button>
                </td>
            </tr>
            <tr id="row-5">
                <td>5</td>
                <td class="nama">Afgan</td>
                <td class="nis">1005</td>
                <td class="jk">Laki-laki</td>
                <td class="alamat">Jl. Anggrek mekar Pontianak</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="5">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="5">Hapus</button>
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
            const nis = row.querySelector('.nis').innerText;
            const jk = row.querySelector('.jk').innerText;
            const alamat = row.querySelector('.alamat').innerText;

            row.innerHTML = `
                <td>${id}</td>
                <td><input type="text" class="form-control nama-input" value="${nama}"></td>
                <td><input type="text" class="form-control nis-input" value="${nis}"></td>
                <td>
                    <select class="form-control jk-input">
                        <option value="Laki-laki" ${jk==='Laki-laki'?'selected':''}>Laki-laki</option>
                        <option value="Perempuan" ${jk==='Perempuan'?'selected':''}>Perempuan</option>
                    </select>
                </td>
                <td><input type="text" class="form-control alamat-input" value="${alamat}"></td>
                <td>
                    <button class="btn btn-success btn-sm save-btn">Simpan</button>
                    <button class="btn btn-secondary btn-sm cancel-btn">Batal</button>
                </td>
            `;

            row.querySelector('.cancel-btn').addEventListener('click', () => {
                row.innerHTML = `
                    <td>${id}</td>
                    <td class="nama">${nama}</td>
                    <td class="nis">${nis}</td>
                    <td class="jk">${jk}</td>
                    <td class="alamat">${alamat}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${id}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${id}">Hapus</button>
                    </td>
                `;
                attachEditEvents();
            });

            row.querySelector('.save-btn').addEventListener('click', () => {
                const updatedNama = row.querySelector('.nama-input').value;
                const updatedNis = row.querySelector('.nis-input').value;
                const updatedJk = row.querySelector('.jk-input').value;
                const updatedAlamat = row.querySelector('.alamat-input').value;

                row.innerHTML = `
                    <td>${id}</td>
                    <td class="nama">${updatedNama}</td>
                    <td class="nis">${updatedNis}</td>
                    <td class="jk">${updatedJk}</td>
                    <td class="alamat">${updatedAlamat}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${id}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${id}">Hapus</button>
                    </td>
                `;
                attachEditEvents();
            });
        });
    });

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            if(confirm('Yakin ingin menghapus data ini?')) {
                document.getElementById('row-' + id).remove();
            }
        });
    });
}

attachEditEvents();

document.getElementById('add-btn').addEventListener('click', () => {
    const tableBody = document.getElementById('table-body');
    const newId = tableBody.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.id = 'row-' + newId;
    newRow.innerHTML = `
        <td>${newId}</td>
        <td><input type="text" class="form-control nama-input"></td>
        <td><input type="text" class="form-control nis-input"></td>
        <td>
            <select class="form-control jk-input">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </td>
        <td><input type="text" class="form-control alamat-input"></td>
        <td>
            <button class="btn btn-success btn-sm save-btn">Simpan</button>
            <button class="btn btn-secondary btn-sm cancel-btn">Batal</button>
        </td>
    `;
    tableBody.appendChild(newRow);

    newRow.querySelector('.cancel-btn').addEventListener('click', () => newRow.remove());

    newRow.querySelector('.save-btn').addEventListener('click', () => {
        const nama = newRow.querySelector('.nama-input').value;
        const nis = newRow.querySelector('.nis-input').value;
        const jk = newRow.querySelector('.jk-input').value;
        const alamat = newRow.querySelector('.alamat-input').value;

        newRow.innerHTML = `
            <td>${newId}</td>
            <td class="nama">${nama}</td>
            <td class="nis">${nis}</td>
            <td class="jk">${jk}</td>
            <td class="alamat">${alamat}</td>
            <td>
                <button class="btn btn-warning btn-sm edit-btn" data-id="${newId}">Edit</button>
                <button class="btn btn-danger btn-sm delete-btn" data-id="${newId}">Hapus</button>
            </td>
        `;
        attachEditEvents();
    });
});
</script>
@endsection