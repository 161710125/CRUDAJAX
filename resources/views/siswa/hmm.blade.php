<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="John Bred" />
                        <span class="help-block has-error nama_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" placeholder="XI" />
                        <span class="help-block has-error kelas_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="RPL" />
                        <span class="help-block has-error jurusan_error"></span>
                     </div>
                     <div class="form-group">
                        <!-- <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                        <option>-</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Tidak Diketahui">Tidak Diketahui</option>
                        </select>
                        <span class="help-block has-error jk_error"></span> -->
                     </div>
                    <label>Jenis Kelamin :</label>
                     <div class="form-group">
                      <form>
                        <label class="radio-inline">
                          <input type="radio" name="jk" value="Laki-Laki" checked >Laki-Laki
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="jk" value="Perempuan">Perempuan
                        </label>
                      </form>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl Tonggoh nomor 55"></textarea>
                        <span class="help-block has-error alamat_error"></span>
                     </div>
                  </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>