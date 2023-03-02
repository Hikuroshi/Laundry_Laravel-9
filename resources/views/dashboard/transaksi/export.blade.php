<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Outlet</td>
            <td>Alamat Outlet</td>
            <td>No Telepon Outlet</td>
            <td>Paket</td>
            <td>jenis</td>
            <td>Nama Pelanggan</td>
            <td>No Telepon Pelanggan</td>
            <td>Alamat Pelanggan</td>
            <td>Jenis Kelamin Pelanggan</td>
            <td>Kasir</td>
            <td>Kode Invoice</td>
            <td>QTY</td>
            <td>Diskon</td>
            <td>Status Barang</td>
            <td>Status Pembayaran</td>
            <td>Tanggal</td>
            <td>Batas Waktu</td>
            <td>Tanggal Bayar</td>
            <td>Harga Paket</td>
            <td>Biaya Tambahan</td>
            <td>Pajak</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaksi->outlet->nama }}</td>
            <td>{{ $transaksi->outlet->alamat }}</td>
            <td>{{ $transaksi->outlet->telepon }}</td>
            <td>{{ $transaksi->detailTransaksi->paket->nama }}</td>
            <td>{{ $transaksi->detailTransaksi->paket->jenis }}</td>
            <td>{{ $transaksi->member->nama }}</td>
            <td>{{ $transaksi->member->telepon }}</td>
            <td>{{ $transaksi->member->alamat }}</td>
            <td>{{ $transaksi->member->jenis_kelamin }}</td>
            <td>{{ $transaksi->user->nama }}</td>
            <td>{{ $transaksi->kode_invoice }}</td>
            <td>{{ $transaksi->detailTransaksi->qty }} Kg</td>
            <td>{{ $transaksi->diskon }}%</td>
            <td>{{ $transaksi->status }}</td>
            <td>{{ $transaksi->dibayar }}</td>
            <td>{{ $transaksi->tgl }}</td>
            <td>{{ $transaksi->batas_waktu }}</td>
            <td>{{ $transaksi->tgl_bayar ?? 'Belum bayar'}}</td>
            <td>Rp.{{ number_format($transaksi->detailTransaksi->paket->harga, 2) }}</td>
            <td>Rp.{{ number_format($transaksi->biaya_tambahan, 2) }}</td>
            <td>Rp.{{ number_format($transaksi->pajak, 2) }}</td>
            <td>{{ $transaksi->detailTransaksi->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>