<div class="divider">
            <div class="divider-content " style = "color: #11582d"><b><i class="icon icon-files-o"></i> Serial Number - File Upload</b></div>
        </div>
        <div class="row">
        <div class="col-sm-12">
         <div class="card">

                      <div class="card-header no-border">
                          <div class="col-md-12">
                              <div class="demo-form-wrapper">
                                <form id="uploadForm" enctype="multipart/form-data" class="form form-horizontal">
            <?= csrf_field(); ?>
            


                                       <div class="form-group">
                                          <label for="form-control-31" class="form-label" style="font-size: 11px"><u>Browse File To Upload</u></label>
                                          <input type="file" id="fileInput" class="form-control mr-2" name="excel_file" accept=".xlsx, .xls" required>
                                          <!-- <input id="form-control-31" class="form-control" type="file" style="font-size: 11px"> -->
                                      </div>
                                      

                                      
                                       
                                      

                                      <br>
                                      <center><button type="submit" id="uploadid" class="btn btn-block btn-primary" style="background-color: #fff; border-color: #000; color: #000;display: none;"><i class="icon icon-file"></i> Upload </button>

                                        <br>
                                      <div id="responseMessage" class="mt-3"></div>

                                    </center>
                                  </form></div>


                                  <div class="container">

        <div class="container mt-5">
        
        
    </div>
<div id="responseMessage"></div>
         
        <table id="demo-datatables-responsive-1" class="display table  table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">

            <thead>
                <tr id="headerRow"></tr>
            </thead>
            <tbody id="dataBody"></tbody>
        </table>
    </div>


                                </div>

                      </div>

                    </div>
        </div>
       
        </div>