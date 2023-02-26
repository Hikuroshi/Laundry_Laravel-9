@extends('dashboard.layouts.main')

@section('container')
<div class="page-title">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Transaksi {{ $transaksi->member->nama }}</h3>
            <p class="text-subtitle text-muted">
                Disini kamu bisa cetak struk transaksi atau memperbarui transaksi
            </p>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Data Transaksi</h2>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="d-flex">
                    <div class="col-12 col-lg-6">
                        <div id="content">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Nama Outlet</td>
                                        <td>{{ $transaksi->outlet->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Invoice</td>
                                        <td>{{ $transaksi->kode_invoice }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pelanggan</td>
                                        <td>{{ $transaksi->member->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Paket</td>
                                        <td>{{ $transaksi->detailTransaksi->paket->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>QTY</td>
                                        <td>{{ $transaksi->detailTransaksi->qty }}%</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>{{ $transaksi->tgl }}</td>
                                    </tr>
                                    <tr>
                                        <td>Batas Waktu</td>
                                        <td>{{ $transaksi->batas_waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <td>{{ $transaksi->tgl_bayar ?? 'Belum bayar'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tambahan</td>
                                        <td>{{ $transaksi->biaya_tambahan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Diskon</td>
                                        <td>{{ $transaksi->diskon }}%</td>
                                    </tr>
                                    <tr>
                                        <td>Pajak</td>
                                        <td>{{ $transaksi->pajak }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Barang</td>
                                        <td>{{ $transaksi->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status Pembayaran</td>
                                        <td>{{ $transaksi->dibayar }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kasir</td>
                                        <td>{{ $transaksi->user->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>{{ $transaksi->detailTransaksi->keterangan }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div id="editor"></div>
                        </div>
                        <button id="cmd" class="btn btn-primary">Generate PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection