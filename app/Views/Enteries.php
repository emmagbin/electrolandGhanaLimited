<div class="divider">
            <div class="divider-content " style = "color: #11582d"><b><i class="icon icon-money"></i> Entries Reporting</b></div>
        </div>
        <div class="row">
        <div class="col-sm-3">
         <div class="card">

                      <div class="card-header no-border">
                          <div class="col-md-12">
                              <div class="demo-form-wrapper">
                                  <form class="form form-horizontal" action="Enteries" method="post">


                                    <div class="form-group">
                                          <label for="form-control-31" class="form-label" style="font-size: 11px"><u>From</u></label>
                                          <input id="form-control-31"  name="fromdatesearch" class="form-control" type="date" style="font-size: 11px" required>
                                      </div>
                                       <div class="form-group">
                                          <label for="form-control-31" class="form-label" style="font-size: 11px"><u>To</u></label>
                                          <input id="form-control-31" name="todatesearch" class="form-control" type="date" style="font-size: 11px" required>
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
                                       
                                          <li><a  ><i class ="icon icon-list-ol"></i> Report: <?php if($searchdatefrom!=''){?>
                                          <?php echo $searchdatefrom. ' To '. $searchdateto ?>
                                          <form action='export' method='post' >
                                              <input type='hidden' name="fromdatesearch" value="<?php echo $searchdatefrom ?>">
                                              <input type='hidden' name="todatesearch" value="<?php echo $searchdateto ?>">
                                               
                                              
                                          <button type="submit"  class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; color: white;float:right;margin-top:-25px;"><i class="icon icon-download"></i> Excel </button>
                                          </form>
                                          <?php } ?>
                                          </a>
                                          </li>

                                      </ul>
                                    </div>
                                    
                                                            <table id="demo-datatables-responsive-1" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">
                                                                  <thead>
                                                                  <tr>
                                                                      <th>Date</th>
                                                                       <th>Time</th>
                                                                        <th>Number</th>
                                                                      <th> Serial Number</th>
                                                                       <th>Ghana Card</th>
                                                                      <th>Region</th>
                                                                      <!--<th>Action</th>-->
                                                                      
                                                                   

                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>

<!-- SELECT `dateEntry`, `timeEntry`, `msisdn`, `serialnumber`, `id`, `ghanacard`, `region` FROM `raffleentry` WHERE 1 -->
                                                                    
                                                                     <?php foreach($searchoutput as $records):?>
                                                                  <tr>
                                  <td><?php echo $records->dateEntry?></td>
                                   <td><?php echo $records->timeEntry?></td>
                                  <td><?php echo $records->msisdn?></td>
                                  <td><?php echo $records->serialnumber?></td>
                                  <td><?php echo $records->ghanacard?></td>
                                  <td><?php echo $records->region?></td>
                                  
   <!--<td><Center> Add To Stock </Center></td>-->
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