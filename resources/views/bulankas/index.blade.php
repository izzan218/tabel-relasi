@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Data Kas Bulanan</h1>

    <button class="btn btn-primary mb-3" id="add-btn">Tambah Data</button>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Bulan</th>
                <th>Jumlah Target</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <tr id="row-1">
                <td>1</td>
                <td class="bulan">Januari 2025</td>
                <td class="jumlah">50.000</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="1">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-2">
                <td>2</td>
                <td class="bulan">Februari 2025</td>
                <td class="jumlah">50.000</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="2">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-3">
                <td>3</td>
                <td class="bulan">Maret 2025</td>
                <td class="jumlah">50.000</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="3">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-4">
                <td>4</td>
                <td class="bulan">April 2025</td>
                <td class="jumlah">50.000</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="4">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </td>
            </tr>
            <tr id="row-5">
                <td>5</td>
                <td class="bulan">Mei 2025</td>
                <td class="jumlah">50.000</td>
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

            const bulan = row.querySelector('.bulan').innerText;
            const jumlah = row.querySelector('.jumlah').innerText;

            row.innerHTML = `
                <td>${id}</td>
                <td><input type="text" class="form-control bulan-input" value="${bulan}"></td>
                <td><input type="text" class="form-control jumlah-input" value="${jumlah}"></td>
                <td>
                    <button class="btn btn-success btn-sm save-btn">Simpan</button>
                    <button class="btn btn-secondary btn-sm cancel-btn">Batal</button>
                </td>
            `;

            row.querySelector('.cancel-btn').addEventListener('click', () => {
                row.innerHTML = `
                    <td>${id}</td>
                    <td class="bulan">${bulan}</td>
                    <td class="jumlah">${jumlah}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${id}">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                `;
                attachEditEvents();
            });

            row.querySelector('.save-btn').addEventListener('click', () => {
                const updatedBulan = row.querySelector('.bulan-input').value;
                const updatedJumlah = row.querySelector('.jumlah-input').value;

                row.innerHTML = `
                    <td>${id}</td>
                    <td class="bulan">${updatedBulan}</td>
                    <td class="jumlah">${updatedJumlah}</td>
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

document.getElementById('add-btn').addEventListener('click', () => {
    const tableBody = document.getElementById('table-body');
    const newId = tableBody.rows.length + 1;

    const newRow = document.createElement('tr');
    newRow.id = 'row-' + newId;
    newRow.innerHTML = `
        <td>${newId}</td>
        <td><input type="text" class="form-control bulan-input"></td>
        <td><input type="text" class="form-control jumlah-input"></td>
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
        const bulan = newRow.querySelector('.bulan-input').value;
        const jumlah = newRow.querySelector('.jumlah-input').value;

        newRow.innerHTML = `
            <td>${newId}</td>
            <td class="bulan">${bulan}</td>
            <td class="jumlah">${jumlah}</td>
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