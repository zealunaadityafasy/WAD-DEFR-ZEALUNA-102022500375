
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">

    @if (session('pesan'))
        <div class="success">{{ session('pesan') }}</div>
    @endif

    <h1>Data Supplier Bahan Baku</h1>

    <a href="{{ url('/tambah') }}" class="btn-tambah">+ Tambah Supplier</a>

    <form method="GET" action="{{ url('/') }}" class="search-form">
        <input
            type="text"
            name="keyword"
            placeholder="Cari supplier..."
            value="{{ $keyword }}"
        >
        <button type="submit">Cari</button>
        <a href="{{ url('/') }}">Reset</a>
    </form>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Jenis Pasokan</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->jenis_pasokan }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->no_telepon }}</td>
                        <td class="actions">
                            <a href="{{ url('/edit/' . $supplier->id) }}"
                               class="btn-edit">Edit</a>

                            <form
                                action="{{ url('/hapus/' . $supplier->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus supplier ini?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada data supplier.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
