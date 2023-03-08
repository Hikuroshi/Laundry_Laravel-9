<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Perbarui transaksi {{ $transaksi->member->nama }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/transaksis/{{ $transaksi->kode_invoice }}" method="post">
                    @csrf
                    @method('put')
                    
                    <div class="form-group mb-4">
                        <label for="paket" class="form-label">Paket <span class="text-danger">*</span></label>
                        <select name="paket_id" id="paket" class="form-select @error('paket_id') is-invalid @enderror">
                            <option value="">Pilih Paket</option>
                            @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}" @selected(old('paket_id', $transaksi->detailTransaksi->paket_id) == $paket->id)>
                                {{ $paket->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('paket_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="qty">QTY <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input name="qty" type="number" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $transaksi->detailTransaksi->qty) }}" placeholder="Masukan qty...">
                                    <span class="input-group-text">Kg</span>
                                    @error('qty')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="diskon">Diskon <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input name="diskon" type="number" id="diskon" class="form-control @error('diskon') is-invalid @enderror" value="{{ old('diskon', $transaksi->diskon) }}" placeholder="Masukan diskon...">
                                    <span class="input-group-text">%</span>
                                    @error('diskon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-4">
                                <label for="status" class="form-label">Status Barang <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="">Status barang saat ini</option>
                                    @foreach ($all_status as $status)
                                    <option value="{{ $status }}" @selected(old('status', $transaksi->status) == $status)>
                                        {{ $status }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-4">
                                <label for="dibayar" class="form-label">Status pembayaran <span class="text-danger">*</span></label>
                                <div class="form-check mt-2">
                                    <div class="checkbox">
                                        <input type="checkbox" class="form-check-input" id="dibayar" name="dibayar" value="Telah bayar" @checked(old('dibayar', $transaksi->dibayar) == 'Telah bayar') />
                                        <label for="dibayar">Sudah dibayar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="biaya_tambahan">Biaya tambahan <span class="text-danger">*</span></label>
                        <input name="biaya_tambahan" type="number" id="biaya_tambahan" class="form-control @error('biaya_tambahan') is-invalid @enderror" value="{{ old('biaya_tambahan', $transaksi->biaya_tambahan) }}" placeholder="Masukan biaya tambahan...">
                        @error('biaya_tambahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Masukan keterangan transaksi...">{{ old('keterangan', $transaksi->detailTransaksi->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>