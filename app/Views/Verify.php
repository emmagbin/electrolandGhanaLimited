
        <div class="divider">
            <div class="divider-content " style = "color: #11582d"><b><i class="icon icon-money"></i> Verify Winner</b></div>
        </div>
        <div class="row">
        <div class="col-sm-3">
         <div class="card">

                      <div class="card-header no-border">
                          <div class="col-md-12">
                              <div class="demo-form-wrapper">
                                                                  <form class="form form-horizontal" action="verify" method="post">

                                  <!-- <form class="form form-horizontal" action="searchList.html"> -->


                                    <div class="form-group">
                                          <label for="form-control-31" class="form-label" style="font-size: 11px"><u>Verification Type</u></label>
                                          <select id="demo-select2-23" name="searchtype" class="form-control" style="font-size: 11px" required>
                                            <option value="" selected disabled>Verification Type</option>
                                            <option value="Ghana Card" >Ghana Card</option>
                                            <option value="Phone Number">Phone Number</option>
                                        

                                        </select>
                                      </div>
                                       <div class="form-group">
                                          <label for="form-control-31" class="form-label" style="font-size: 11px"><u>Details</u></label>
                                          <input id="form-control-31" name="searchinfo" class="form-control" type="text" style="font-size: 11px" required>
                                      </div>
                                      

                                      
                                       
                                      

                                      <br>
                                      <center><button type="submit" class="btn btn-primary" style="background-color: #fff; border-color: #000; color: #000"><i class="icon icon-list"></i> Generate Report </button></center>
                                  </form></div></div>

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
            <th>Entry Date</th>
            <th>Entry Time</th>
            <th>Serial Number</th>
            <th>Ghana Card</th>
            <th>Phone Number</th>
            <th>Region</th>
            <th>Won?</th>
            <th><center>Action</center></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($searchoutput as $records): ?>
            <tr>
                <td><?php echo htmlspecialchars($records->dateEntry, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($records->timeEntry, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($records->serialnumber, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($records->ghanacard, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($records->msisdn, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($records->region, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <?php if ($records->winStatus === "W"): ?>
                        <span>Yes</span>
                    <?php else: ?>
                        <span>No</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($records->winStatus === "W"): ?>
                        <form action="redemption" method="post">
                            <input type="hidden" value="<?php echo htmlspecialchars($records->id, ENT_QUOTES, 'UTF-8'); ?>" name="id">
                            <center>
                                <button type="submit" class="btn btn-pill btn-primary" style="background-color: #fff; border-color: #000; color: #000">
                                    <i class="icon icon-check-o"></i> Redeem Prize
                                </button>
                            </center>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div></div>
        </div>
    </div>