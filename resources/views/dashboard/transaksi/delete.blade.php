<div class="modal fade text-left" id="hapus-{{ $transaksi->kode_invoice }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true" style="white-space: normal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel160">Hapus Data {{ $transaksi->kode_invoice }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah yakin ingin menghapus <b>{{ $transaksi->kode_invoice }}</b>? Data yang sudah dihapus tidak dapat dikembalikan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                </button>
                <form action="/dashboard/transaksis/{{ $transaksi->kode_invoice }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger ml-1">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
