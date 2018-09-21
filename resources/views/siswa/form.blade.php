<div id="studentModal" class="modal fade" role="dialog" data-backdrop="static">
         <div class="modal-dialog">
            <div class="modal-content">
               <form method="post" id="student_form">
                  <div class="modal-header" style="background-color: lightblue;">
                     <button type="button" class="close" data-dismiss="modal" >&times;</button>
                     <h4 class="modal-title" >Add Data</h4>
                  </div>
                  <div class="modal-body">
                     {{csrf_field()}}
                     <span id="form_output"></span>
                     <div class="form-group">
                      <input type="hidden" name="id" id="id">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="John Bred" />
                        <span class="help-block has-error nama_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" placeholder="XI" />
                        <span class="help-block has-error kelas_error"></span>
                     </div>
                     <!-- <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="RPL" />
                        <span class="help-block has-error jurusan_error"></span>
                     </div> -->
                     <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <option disabled selected>Pilih Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="TKR">TKR</option>
                        <option value="TSM">TSM</option>
                        <option value="Tata Boga">Tata Boga</option>
                        <option value="Farmasi">Farmasi</option>
                        </select>
                        <span class="help-block has-error jurusan_error"></span>
                     </div>
                     <!-- <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jk">
                        <option>-</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Tidak Diketahui">Tidak Diketahui</option>
                        </select>
                        <span class="help-block has-error jk_error"></span>
                     </div> -->
                    <label>Jenis Kelamin :</label>
                     <div class="form-group">
                      <form>
                        <label class="radio-inline">
                          <input type="radio" name="jk" value="Laki-Laki" id="l">Laki-Laki
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="jk" value="Perempuan" id="p">Perempuan
                        </label>

                      </form>
                      <span class="help-block has-error jk_error"></span>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl Tonggoh nomor 55"></textarea>
                        <span class="help-block has-error alamat_error"></span>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="student_id" id="student_id" value=""/>
                    <input type="hidden" name="button_action" id="button_action" value="insert"/>
                     <input type="submit" name="submit" id="aksi" value="Tambah" class="btn btn-info" />
                  </div>
               </form>
            </div>
         </div>
      </div>