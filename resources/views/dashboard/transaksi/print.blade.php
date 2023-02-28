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
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div id="capture">
                            <div class="bg-white text-dark">
                                <div class="d-flex justify-content-center align-items-center py-3">
                                    <img class="img-fluid me-1" src="/img/laundry.png" alt="Logo" width="40"/>
                                    <span class="fs-4 fw-bold text-dark">Laundry</span>
                                </div>            
                                <div class="table-responsive">
                                    <table class="table table-borderless text-dark">
                                        <tr>
                                            <td>Nama Outlet</td>
                                            <td>: {{ $transaksi->outlet->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Paket</td>
                                            <td>: {{ $transaksi->detailTransaksi->paket->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td>: {{ $transaksi->member->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kasir</td>
                                            <td>: {{ $transaksi->user->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kode Invoice</td>
                                            <td>: {{ $transaksi->kode_invoice }}</td>
                                        </tr>
                                        <tr>
                                            <td>QTY</td>
                                            <td>: {{ $transaksi->detailTransaksi->qty }}%</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>: {{ $transaksi->tgl }}</td>
                                        </tr>
                                        <tr>
                                            <td>Batas Waktu</td>
                                            <td>: {{ $transaksi->batas_waktu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Bayar</td>
                                            <td>: {{ $transaksi->tgl_bayar ?? 'Belum bayar'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal Paket</td>
                                            <td>: Rp.{{ number_format($transaksi->detailTransaksi->paket->harga, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal Diskon</td>
                                            <td>: Rp.{{ number_format($diskon, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Tambahan</td>
                                            <td>: Rp.{{ number_format($transaksi->biaya_tambahan, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Pajak</td>
                                            <td>: Rp.{{ number_format($transaksi->pajak, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Pesanan</td>
                                            <td class="fw-bold">: Rp.{{ number_format($harga, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button onclick="cetakStruk()" class="btn btn-primary mt-3">Cetak Struk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection