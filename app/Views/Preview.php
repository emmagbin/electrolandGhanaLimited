 <div class="divider">
            <div class="divider-content " style = "color: #11582d"><b><i class="icon icon-files-o"></i> Preview</b></div>
        </div>
        <div class="row">
        <div class="col-sm-12">
         <div class="card">

                      <div class="card-header no-border">
                          <div class="col-md-12">
                              <div class="demo-form-wrapper">
                                  <!-- <form class="form form-horizontal" action="searchList.html"> -->
                                   <div class="row">
    <div class="col-xs-6 col-md-3">
        <div class="card">
            <div class="card-values">
                <div class="p-x">
                    <small>Total Records In The File <i class = "icon icon-list" style = "color: #7fb4de"></i></small>
                    <h3 class="card-title fw-l"><?php echo count($serialnumbertemp) ?></h3>
                </div>
            </div>
            <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(127, 180, 222, 0.03)", "borderColor": "#000", "data": [25250, 23370, 25568, 28961, 26762, 30072, 25135]}]' data-scales='{"yAxes": [{ "ticks": {"max": 32327}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
            </div>
        </div>
    </div>
       </div>
    <br>

                                      <table id="demo-datatables-responsive-1" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">
                                                                  <thead>
                                                                  <tr>
                                                                      <th>Serial Number</th>
                                                                       <!-- <th>C2</th> -->
                                                                      
                                                                   

                                                                  </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <?php foreach($serialnumbertemp as $records):?>
                                                                  <tr>
                                                                     <td><?php echo ucfirst($records->serialnumber)?></td>
                                  
                               
                                                                  </tr>
                                                                  <?php endforeach ?>



                                                                  </tbody>
                                                              </table>
                                      

                                      
                                       
                                      

                                      <br>
                                      <?php if(count($serialnumbertemp)>0){ ?>
                                        <center>
                                          <form method="post" action="submitEntries" >
                                            <button type="submit" class="btn btn-block btn-primary" style="background-color: #fff; border-color: #000; color: #000"><i class="icon icon-check"></i> Submit Entries</button>

                                          </form></center>
                                      <?php } ?>
                                      
                                  </div></div>

                      </div></div>
        </div>
       
        </div>