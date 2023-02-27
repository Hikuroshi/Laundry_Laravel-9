<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Invoice</th>
            <th>Pelanggan</th>
            <th>Outlet</th>
            <th>Paket</th>
            <th>QTY</th>
            <th>Tanggal</th>
            <th>Batas Waktu</th>
            <th>Tanggal Bayar</th>
            <th>Biaya Tambahan</th>
            <th>Diskon</th>
            <th>Pajak</th>
            <th>Status Barang</th>
            <th>Status Pembayaran</th>
            <th>Kasir</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->kode_invoice }}</td>
            <td>{{ $transaksi->member->nama }}</td>
            <td>{{ $transaksi->outlet->nama }}</td>
            <td>{{ $transaksi->detailTransaksi->paket->nama }}</td>
            <td>{{ $transaksi->detailTransaksi->qty }}</td>
            <td>{{ $transaksi->tgl }}</td>
            <td>{{ $transaksi->batas_waktu }}</td>
            <td>{{ $transaksi->tgl_bayar ?? 'Belum bayar' }}</td>
            <td>{{ $transaksi->biaya_tambahan }}</td>
            <td>{{ $transaksi->diskon }}%</td>
            <td>{{ $transaksi->pajak }}</td>
            <td>{{ $transaksi->status }}</td>
            <td>{{ $transaksi->dibayar }}</td>
            <td>{{ $transaksi->user->nama }}</td>
            <td>{{ $transaksi->detailTransaksi->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>