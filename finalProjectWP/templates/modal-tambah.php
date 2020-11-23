<!-- Modal tambah data-->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTambahLabel">Tambah Data Buku</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="number" class="form-control" id="kode" placeholder="Kode Buku" name="kode">
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul">
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" placeholder="Pengarang Buku" name="pengarang">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Buku" name="penerbit">
            </div>
            <div class="form-group">
                <label for="tipe">Tipe Buku</label>
                <select class="form-control" id="tipe" name="tipe">
                    <option value="fiksi">Buku Fiksi</option>
                    <option value="non-fiksi">Buku Non-Fiksi</option>
                    <option value="pelajaran">Buku Pelajaran</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" placeholder="Harga Buku" name="harga">
            </div>
            
      </div>
      <!-- modal tambah data -->
    <div class="modal-footer">
        <button type="submit" class="btn btn-warning" name="tambah">Tambah</button>
    </div>
    </form>
    </div>
  </div>
</div>