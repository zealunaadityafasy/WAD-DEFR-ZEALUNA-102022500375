
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <h1>Edit Supplier</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/edit/' . $supplier->id) }}"
          method="POST" class="data-form">
        @csrf
        @method('PUT')

        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier"
               value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
               required>

        <label>Jenis Pasokan</label>
        <input type="text" name="jenis_pasokan"
               value="{{ old('jenis_pasokan', $supplier->jenis_pasokan) }}"
               required>

        <label>Alamat</label>
        <textarea name="alamat" required>{{ old('alamat', $supplier->alamat) }}</textarea>

        <label>No. Telepon</label>
        <input type="text" name="no_telepon"
               value="{{ old('no_telepon', $supplier->no_telepon) }}"
               required>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ url('/') }}" class="btn-kembali">Kembali</a>
    </form>
</div>
</body>
</html>
