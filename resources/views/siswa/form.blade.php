<div id="studentModal" class="modal fade" role="dialog" data-backdrop="static">
         <div class="modal-dialog">
            <div class="modal-content">
               <form method="POST" id="student_form" enctype="multipart/form-data">
                {{csrf_field()}} {{ method_field('POST') }}
                  <div class="modal-header" style="background-color: lightblue;">
                     <button type="button" class="close" data-dismiss="modal" >&times;</button>
                     <h4 class="modal-title" >Add Data</h4>
                  </div>
                  <div class="modal-body">
                     
                     <span id="form_output"></span>
                     <div class="form-group">
                      <input type="hidden" name="id" id="id">
                        <label>Nama Siswa :</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="John Bred" />
                        <span class="help-block has-error nama_error"></span>
                     </div>
                     <div class="form-group">
                        <label>Kelas :</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" placeholder="XI" />
                        <span class="help-block has-error kelas_error"></span>
                     </div>
                     <!-- <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="RPL" />
                        <span class="help-block has-error jurusan_error"></span>
                     </div> -->
                     <div class="form-group">
                        <label>Jurusan :</label>
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
                     <div class="form-group">
                        <label>Tanggal Lahir :</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                        <span class="help-block has-error tgl_lahir_error"></span>
                     </div>

                    <label>Jenis Kelamin :</label>
                    
                     <div class="form-group">
                      <form>
                        <label class="radio-inline" class="form-control">
                          <input type="radio" name="jk" value="Laki-Laki" id="l">Laki-Laki
                        </label>
                        <label class="radio-inline" class="form-control">
                          <input type="radio" name="jk" value="Perempuan" id="p">Perempuan
                        </label>
                        <span class="help-block has-error jk_error"></span>
                      </form>
                      

                     <div class="form-group">
                        <label>Alamat :</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl Tonggoh nomor 55"></textarea>
                        <span class="help-block has-error alamat_error"></span>
                     </div>
                  </div>


                  
                  <div class="form-group">
                    <label>Hobi :</label><br>
                        <div class="checkbox-inline">
                                <p><input type="checkbox" name="hobi[]" id="hobi" value="Sepak Bola"> Sepak Bola</p>
                        </div>
                        <div class="checkbox-inline">
                                <p><input type="checkbox" name="hobi[]" id="hobi" value="Volly"> Volly</p>
                        </div>
                        <div class="checkbox-inline">
                                <p><input type="checkbox" name="hobi[]" id="hobi" value="Band"> Band</p>
                        </div>
                        <div class="checkbox-inline">
                                <p><input type="checkbox" name="hobi[]" id="hobi" value="Kode"> Kode</p>
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="photo">Gambar</label>
                        <input type="file" id="Photo" name="Photo">
                        <span class="help-block has-error photo_error"></span>
                     </div>

                  <div class="modal-footer">
                    <input type="hidden" name="student_id" id="student_id" value=""/>
                    <input type="hidden" name="button_action" id="button_action" value="insert"/>
                     <input type="submit" name="submit" id="aksi" value="Tambah" class="btn btn-info" />
                     <input type="button"class="btn btn-default" data-dismiss="modal" value="Cancel" />
                  </div>
               </form>
            </div>
         </div>
      </div>