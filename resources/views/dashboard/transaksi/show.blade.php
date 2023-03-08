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
                <div class="row align-items-center">
                    <div class="col-12 col-xl-6">
                        <div class="table-responsive">
                            <table class="table" style="white-space: nowrap">
                                <tr>
                                    <td>Nama Outlet</td>
                                    <td>{{ $transaksi->outlet->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Outlet</td>
                                    <td>{{ $transaksi->outlet->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No Telepon Outlet</td>
                                    <td>{{ $transaksi->outlet->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Paket</td>
                                    <td>{{ $transaksi->detailTransaksi->paket->nama }}</td>
                                </tr>
                                <tr>
                                    <td>jenis</td>
                                    <td>{{ $transaksi->detailTransaksi->paket->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pelanggan</td>
                                    <td>{{ $transaksi->member->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No Telepon Pelanggan</td>
                                    <td>{{ $transaksi->member->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pelanggan</td>
                                    <td>{{ $transaksi->member->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin Pelanggan</td>
                                    <td>{{ $transaksi->member->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Kasir</td>
                                    <td>{{ $transaksi->user->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Kode Invoice</td>
                                    <td>{{ $transaksi->kode_invoice }}</td>
                                </tr>
                                <tr>
                                    <td>QTY</td>
                                    <td>{{ $transaksi->detailTransaksi->qty }} Kg</td>
                                </tr>
                                <tr>
                                    <td>Diskon</td>
                                    <td>{{ $transaksi->diskon }}%</td>
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
                                    <td>Harga Paket</td>
                                    <td>Rp.{{ number_format($transaksi->detailTransaksi->paket->harga, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya Tambahan</td>
                                    <td>Rp.{{ number_format($transaksi->biaya_tambahan, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Pajak</td>
                                    <td>Rp.{{ number_format($transaksi->pajak, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td style="white-space: normal">{{ $transaksi->detailTransaksi->keterangan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="table-responsive">
                            <div class="bg-white rounded-4 text-dark m-auto my-5" style="width: 500px">
                                <div id="capture" class="p-3">
                                    <div class="d-flex justify-content-center align-items-center py-3">
                                        <img class="img-fluid me-1" src="/img/laundry.png" alt="Logo" width="40"/>
                                        <span class="fs-4 fw-bold text-dark">Laundry</span>
                                    </div>            
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-dark" style="white-space: nowrap">
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
                                                <td>: {{ $transaksi->detailTransaksi->qty }} Kg</td>
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
                                            <tr style="border-top: 1px dashed black">
                                                <td>Subtotal Paket</td>
                                                <td>: Rp.{{ number_format($transaksi->detailTransaksi->paket->harga, 2) }} <span class="ms-3">x{{ $transaksi->detailTransaksi->qty }}</span></td>
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
                                                <td class="fw-bold">: Rp.{{ number_format($total, 2) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="text-center">
                                        <small class="d-block">Terimakasih sudah menggunakan jasa laundry kami^^</small>
                                        <small class="d-block">{{ $transaksi->outlet->alamat }}: {{ $transaksi->outlet->telepon }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <div class="d-sm-block d-grid gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Edit Transaksi</button>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end text-xl-center mb-2">
                        <div class="d-sm-block d-grid gap-2">
                            <button onclick="cetakStruk()" class="btn btn-success">Cetak PNG</button>
                            <button onclick="cetakStrukPDF()" class="btn btn-success">Cetak PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('dashboard.transaksi.edit')

<script>
    var kode_invoice = {{ Js::from($transaksi->kode_invoice) }};
</script>
@endsection