 <div class="divider">
            <div class="divider-content " style = "color: #11582d"><b><i class="icon icon-money"></i> Draws Reporting</b></div>
        </div>
        <div class="row">
        <div class="col-sm-3">
         <div class="card">

                      <div class="card-header no-border">
                          <div class="col-md-12">
                              <div class="demo-form-wrapper">
                                  <form class="form form-horizontal" method="post" action="Draws">
                                    <div class="form-group">
                                          <label for="form-control-31" class="form-label"  style="font-size: 11px"><u>Draw Date</u></label>
                                          <input id="form-control-31" class="form-control" name="datesearch" type="date" style="font-size: 11px" required>
                                      </div>
                                      <br>
                                      <center><button type="submit" class="btn btn-primary" style="background-color: #fff; border-color: #000; color: #000"><i class="icon icon-list"></i> Generate Report </button></center>
                                  </form>
                                </div>
                              </div>

                      </div></div>
        </div>
        <div class="col-sm-9">
             <div class="row gutter-xs">
                  <div class="col-xs-12">
                 
                      <div class="card">
                          
                          <div class="card-body">
                              <div class="col-md-12">
                                  <div class="panel m-b-lg">
                                      <ul class="nav nav-tabs nav-justified">
                                       
                                          <li><a href="#profile-11" data-toggle="tab"><i class ="icon icon-list-ol"></i> Report</a></li>

                                      </ul>
                                    </div>
                                                            <table id="demo-datatables-responsive-1" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">
                                                                  <thead>
                                                                  <tr>
                                                                      <th>Date</th>
                                                                     
                                                                        <th>Serial Number</th>
                                                                      <th> Prize</th>
                                                                       <th>Redeemed?</th>
                                                                   
                                                                   

                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>

                                                                    <?php foreach($searchoutput as $records):?>
                                                                  <tr>
                                                                      <td><?php echo $records->drawdate?></td>
                                  <td><?php echo $records->serialnumber?></td>
                                 <td><?php echo $records->prize?></td>
                                  
                                    <?php if($records->redeemstatus==="N") {?>
                                      <td>
                                      
                                      <span   >Yes</span>
                                    </td>

                                  <?php } else {?>

                                   <td>
                                      
                                      <span   >No</span>
                                    </td>

                                  <?php } ?>
                                 
                                 
                                                                  </tr>
                                                                <?php endforeach ?>



                                                                  </tbody>
                                                              </table>


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div></div>
        </div>