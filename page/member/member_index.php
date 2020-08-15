    <div class="card">
        <div class="card-header bg-warning">Daftar Member</div>
        <div class="card-body">
            <div class="btn-group" role="group">
                <button type="button" id="btnadd" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
            </div>

            <br><br>

            <table id="member" class="display" style="width:100%">
                <thead>
                    <tr align="center">
                        <th>NO.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbl_member">
                
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">MEMBER</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                
                    <input type="hidden" id="tid">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nim :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tnim">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tnama">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Telepon :</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="ttelepon">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat :</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="talamat"></textarea>
                        </div>
                    </div>

                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnclose">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnsave">Save</button>
                </div>
                
            </div>
        </div>
  </div>
