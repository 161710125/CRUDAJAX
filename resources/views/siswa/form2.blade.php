<div id="studentModal1" class="modal fade" role="dialog" data-backdrop="static">
         <div class="modal-dialog">
            <div class="modal-content">
               <form method="post" id="student_form1">
                  <div class="modal-header" style="background-color: lightblue;">
                     <button type="button" class="close" data-dismiss="modal" >&times;</button>
                     <h4 class="modal-title" >Add Data</h4>
                  </div>
                  <div class="modal-body">
                     {{csrf_field()}}
                     <span id="form_output"></span>
                     <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama1" id="nama1" class="form-control" placeholder="John Bred" />
                        <span class="help-block has-error nama_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas1" id="kelas1" class="form-control" placeholder="XI" />
                        <span class="help-block has-error kelas_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan1" id="jurusan1" class="form-control" placeholder="RPL" />
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
                          <input type="radio" name="jk1" value="Laki-Laki" checked >Laki-Laki
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="jk1" value="Perempuan">Perempuan
                        </label>
                      </form>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat1" id="alamat1" class="form-control" placeholder="Jl Tonggoh nomor 55"></textarea>
                        <span class="help-block has-error alamat_error"></span>
                     </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="student_id1" id="student_id1" value="update"/>
                    <input type="hidden" name="button_action1" id="button_action1" value="insert"/>
                     <input type="submit" name="submit" id="aksi1" value="Tambah" class="btn btn-info" />
                  </div>
               </form>
            </div>
         </div>
      </div>