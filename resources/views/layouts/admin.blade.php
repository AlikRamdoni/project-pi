<!-- layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'admin')</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gray-200 min-h-screen">
            <div class="p-4">
                <button class="/admin text-black text-lg font-bold mb-4">Dashboard</button>

                {{-- product-button --}}
                <div>
                    <button onclick="showProduct()">Produk</button>
                </div>

                {{-- transaction-button --}}
                <div>
                    <button onclick="showTransaction()">Pemesanan</button>
                </div>
                <div>
                    <button onclick="showResults()">Transaksi</button>
                </div>
                
            </div>
        </div>

        <!-- Content -->
        <div class="w-4/5 bg-white p-4" id="content">
            <x-navbar-admin></x-navbar-admin>
            <h1>Selamat Datang, Admin!</h1>
            <h3>Silahkan Kontrol Website kamu disini!</h3>
        </div>
    </div>

    <script>
        function buttonClick() {
            console.log("button clicked")
        }
        function showProduct() {
            fetchProductContent(); // Misalnya, fungsi untuk mengambil dan menampilkan konten produk
        }

        function showTransaction() {
            fetchTransactionContent(); // Misalnya, fungsi untuk mengambil dan menampilkan konten transaksi
        }

        function fetchProductContent() {
            // Contoh: mengambil konten produk dari server
            fetch('/admin/product-content')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                });
        }

        function fetchTransactionContent() {
            // Contoh: mengambil konten transaksi dari server
            fetch('/admin/transaction-content')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                    fetchTransactions();
                });
        }

        async function showResults() {
            const response = await fetch('/admin/result');

            const result = await response.text();

            document.getElementById('content').innerHTML = result;
        }

        async function showDetailTransactionModal(userId) {
    try {
        // Fetch detail transaksi
        const response = await fetch(`/admin/transactions/${userId}`);
        const data = await response.json();

        // Hitung total harga
        let totalPrice = 0;
        data.forEach(item => {
            totalPrice += item.menu.price * item.quantity;
        });

        console.log(data);

        // Tampilkan modal
        const modal = document.getElementById('detailTransactionModal');
        modal.classList.remove('hidden');
        modal.classList.add('fixed');
        modal.innerHTML = `
            <div class="flex justify-center items-center bg-gray-900 bg-opacity-50 fixed top-0 left-0 bottom-0 right-0 max-h-screen">
                <div class="bg-white rounded-lg p-8">
                    <h2 class="text-2xl font-bold mb-4">Detail Transaksi</h2>
                    <h3>Nama: ${data[0]?.user?.name}</h3>
                    <table>
                        <thead>
                            <tr>
                                <th class="py-2">Nama Produk</th>
                                <th class="py-2">Jumlah</th>
                                <th class="py-2">Harga</th>
                                <th class="py-2">Total</th>
                            </tr>
                        </thead>
                        <tbody id="detail-transaction-data"></tbody>
                    </table>
                    <div class="mt-4 flex justify-between">
                        <h3 class="text-xl font-semibold">Total Harga: </h3>
                        <h1 class="font-bold">Rp ${totalPrice}</h1>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button class="bg-green-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded" onclick="deleteTransactionUser(${userId}, ${totalPrice})">Selesai</button>
                        <button class="bg-red-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded" onclick="closeDetailTransactionModal()">Tutup</button>
                    </div>
                </div>
            </div>
        `;

        // Isi tabel detail transaksi
        const detailTransactionTable = document.getElementById('detail-transaction-data');
        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="border px-4 py-2">${item.menu.name}</td>
                <td class="border px-4 py-2">${item.quantity}</td>
                <td class="border px-4 py-2">Rp.${item.menu.price}</td>
                <td class="border px-4 py-2">Rp.${item.menu.price * item.quantity}</td>
            `;
            detailTransactionTable.appendChild(row);
        });
    } catch (error) {
        console.error('Error fetching transaction details:', error);
    }
}


    async function deleteTransactionUser(userId, totalPrice) {
    try {
        console.log("delete transaction", userId, totalPrice);
        const response = await fetch(`/admin/transactions/delete/${userId}/t/${totalPrice}`, );

        console.log("delete transaction", await response.json());



        // Lakukan sesuatu dengan hasilnya jika diperlukan
    } catch (error) {
        console.error('Error:', error);
    } finally {
        closeDetailTransactionModal();
        fetchTransactionContent();
    }
}



        async function getDetailTransaction(userId) {
           
            console.log(data);
            return data[0];
        }


        function closeDetailTransactionModal() {
            const modal = document.getElementById('detailTransactionModal');
            modal.classList.remove('fixed');
            modal.classList.add('hidden');
        }



        async function fetchTransactions() {

            try {
                const trxTable = document.getElementById('transaction-data');
                if(!trxTable) return
                if (!trxTable) {
                    throw new Error("Element with ID 'transaction-data' not found.");
                }

                const response = await fetch('/admin/transactions');
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();
                const dataArr = Object.values(data);

                console.log(dataArr);

                dataArr.forEach(element => {
                    const row = document.createElement('tr');
                    let totalPrice = 0;
                    element.forEach(item => {
                        totalPrice += parseInt(item.menu.price * item.quantity);
                    });
                    row.innerHTML = `
                <td class="border px-4 py-2">${element[0].user.id}</td>
                <td class="border px-4 py-2">${element[0].user.name}</td>
                <td class="border px-4 py-2">${totalPrice.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 })}</td>
                <td class="border px-4 py-2"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded" onclick="showDetailTransactionModal(${element[0].user.id})">Lihat</button></td>
                `;
                    trxTable.appendChild(row);
                });
            } catch (error) {
                console.error('Error fetching or processing transactions:', error);
            }
        }

        function toggleModal() {
            const modal = document.getElementById('addProductModal');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }

        document.getElementById('closeModal').addEventListener('click', function() {
            toggleModal();
        });

        
    </script>

</body>
</html>
