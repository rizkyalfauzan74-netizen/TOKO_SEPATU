<html>
<head>
    <title>Tabel Item</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="p-4">

<div x-data="productApp()">

    @include('navbar')

    <div class="flex gap-2 mb-5">

        <!-- BUTTON TAMBAH -->
        <button @click="openAdd = true"
            class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Item
        </button>

        <!-- BUTTON PDF -->
        <button
            type="button"
            onclick="window.location.href='{{ route('products.pdf') }}'"
            class="bg-red-500 text-white px-4 py-2 rounded font-medium flex items-center gap-1 hover:bg-red-700 transition">
            <span class="material-icons text-sm">picture_as_pdf</span>
            Simpan Sebagai PDF
        </button>

    </div>

    <!-- TABLE -->
    <table class="table-auto w-full mt-5">
        <thead>
            <tr class="bg-gray-300">
                <th class="border p-2">Nama Item</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stock</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $p)
            <tr>
                <td class="border p-2">{{ $p->nama_barang }}</td>
                <td class="border p-2">Rp {{ number_format($p->harga,0,',','.') }}</td>
                <td class="border p-2">{{ $p->stok }}</td>
                <td class="border p-2">{{ $p->deskripsi }}</td>

                <td class="border p-2 text-center">
                    <div class="flex justify-center gap-3">

                        <!-- EDIT -->
                        <button @click="openEdit(@js($p))"
                            class="text-green-600">
                            <span class="material-icons">edit</span>
                        </button>

                        <!-- DELETE -->
                        <button
                            onclick="if(confirm('Yakin ingin menghapus?')) document.getElementById('del{{ $p->id }}').submit()"
                            class="text-red-600">
                            <span class="material-icons">delete</span>
                        </button>

                        <form id="del{{ $p->id }}"
                              action="{{ route('products.destroy',$p->id) }}"
                              method="post"
                              class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- MODAL TAMBAH -->
    <div x-show="openAdd"
         x-transition.opacity
         class="fixed inset-0 bg-black/50">

        <div class="flex items-center justify-center h-full">

            <div class="bg-white p-6 rounded-2xl w-96">

                <h2 class="font-bold mb-3">Tambah Item</h2>

                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <input name="nama_barang" placeholder="Nama"
                        class="w-full border p-2 mb-2 rounded">

                    <input name="harga" type="number" placeholder="Harga"
                        class="w-full border p-2 mb-2 rounded">

                    <input name="stok" type="number" placeholder="Stok"
                        class="w-full border p-2 mb-2 rounded">

                    <textarea name="deskripsi" placeholder="Deskripsi"
                        class="w-full border p-2 mb-2 rounded"></textarea>

                    <div class="flex justify-end gap-2">
                        <button type="button"
                            @click="openAdd=false"
                            class="text-gray-500">
                            Batal
                        </button>

                        <button class="bg-blue-500 text-white px-3 py-1 rounded">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div x-show="openEditModal"
         x-transition.opacity
         class="fixed inset-0 bg-black/50">

        <div class="flex items-center justify-center h-full">

            <div class="bg-white p-6 rounded-2xl w-96">

                <h2 class="font-bold mb-3">Edit Item</h2>

                <form :action="`/products/${edit.id}`" method="post">
                    @csrf
                    @method('PUT')

                    <input x-model="edit.nama_barang"
                        name="nama_barang"
                        class="w-full border p-2 mb-2 rounded">

                    <input x-model="edit.harga"
                        name="harga"
                        type="number"
                        class="w-full border p-2 mb-2 rounded">

                    <input x-model="edit.stok"
                        name="stok"
                        type="number"
                        class="w-full border p-2 mb-2 rounded">

                    <textarea x-model="edit.deskripsi"
                        name="deskripsi"
                        class="w-full border p-2 mb-2 rounded"></textarea>

                    <div class="flex justify-end gap-2">
                        <button type="button"
                            @click="openEditModal=false"
                            class="text-gray-500">
                            Batal
                        </button>

                        <button class="bg-green-500 text-white px-3 py-1 rounded">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
function productApp() {
    return {
        openAdd: false,
        openEditModal: false,

        edit: {
            id: null,
            nama_barang: '',
            harga: '',
            stok: '',
            deskripsi: ''
        },

        openEdit(item) {
            this.edit = { ...item };
            this.openEditModal = true;
        }
    }
}
</script>

</body>
</html>