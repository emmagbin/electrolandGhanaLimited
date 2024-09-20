<div class="row">


                  <div class ="col-xs-4">
                      <div class = "row">
                          <div class = "col-lg-12">

                              <div class="col-md-6">
                                  <div class="card" style="background-color: #fff; color: #000; border: 1px #eee solid">
                                      <div class="card-values">
                                          <div class="p-x">
                                              <small>Total Roles <i class = "icon icon-group" style = "color: #fff"></i></small><br><br>
                                              <h3 class="card-title fw-l"><b><?php echo count($roles) ?></b></h3>
                                          </div>
                                      </div>
                                      <div class="card-chart">
                                           <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(234,239,251, 0.03)", "borderColor": "#7fb4de", "data": [116196, 145160, 124419, 147004, 134740, 120846, 137225]}]' data-scales='{"yAxes": [{ "ticks": {"max": 158029}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
                                      </div>
                                  </div>

                              </div></div></div>





                  </div>


              </div>
              <br><hr>
              <div class="pull-left">
                  <button class=" btn " style = "text-transform: capitalize; background-color: #fff; color: #000" data-toggle="modal" data-target="#newRole" type="button"> <i class = "icon icon-group"></i> &nbsp New Role</button>
<br>

              </div>
              <br><br><br>
              <div class="row">
                  <div class="col-xs-12">
                      <div class="card">
                          <div class="card-header">
                            

                          </div>
                          <div class="card-body">
                              <table id="demo-datatables-responsive-1" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">
                                  <thead>
                                  <tr>
                                      <th>Role ID</th>
                                      <th>Serial Number Management</th>
                                      <th>Queries & Reports</th>
                                      <th>Draw Data</th>
                                      <th>User Management</th>
                                       <th>Show Room Entry Management</th>
                                      <th>Action</th>

                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php $first=0; $second=0;$third=0; $fouth=0; ?>
                                    <?php foreach($Allroles as $records):?>
                                  <tr>
                                      <td><?php echo ucfirst($records->rolename)?></td>

                                      <td>
                                        <?php if($records->serialnumber==="1"){?>
                                          <i class="icon icon-check" style="color: #11582d"></i>
                                          <?php  $first+=1; ?>
                                        <?php } else {?>
                                          `<i class="icon icon-close" style="color: maroon"></i>
                                        <?php } ?> 
                                      </td>
                                      <td>
                                        <?php if($records->reports==="1"){?>
                                          <i class="icon icon-check" style="color: #11582d"></i>
                                          <?php  $second+=1; ?>
                                        <?php } else {?>
                                          `<i class="icon icon-close" style="color: maroon"></i>
                                        <?php } ?> 
                                      </td>
                                      <td>
                                        <?php if($records->draws==="1"){?>
                                          <i class="icon icon-check" style="color: #11582d"></i>
                                          <?php  $third+=1; ?>
                                        <?php } else {?>
                                          `<i class="icon icon-close" style="color: maroon"></i>
                                        <?php } ?> 
                                      </td>
                                      <td>
                                        <?php if($records->user_management==="1"){?>
                                          <i class="icon icon-check" style="color: #11582d"></i>
                                          <?php  $fouth+=1; ?>
                                        <?php } else {?>
                                          `<i class="icon icon-close" style="color: maroon"></i>
                                        <?php } ?> 
                                      </td>
                                       <td>
                                        <?php if($records->show_room_management==="1"){?>
                                          <i class="icon icon-check" style="color: #11582d"></i>
                                          <?php  $fouth+=1; ?>
                                        <?php } else {?>
                                          `<i class="icon icon-close" style="color: maroon"></i>
                                        <?php } ?> 
                                      </td>
                                       <td>
                          <Center>
                            <?php if($records->rolestatus==="1"){?>
                            <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: goldenrod; border-color: goldenrod" type="button" data-toggle="modal" data-target="#edit<?= $records->id?>">
                              <i class="icon icon-edit"></i>
                            </button> | <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: black; border-color: black" type="button" data-toggle="modal" data-target="#Disable<?= $records->id?>">
                              <i class="icon icon-lock"></i>
                            </button> 
                            <?php } else { ?>
                              | <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: green; ; border-color: green" type="button" data-toggle="modal" data-target="#Enable<?= $records->id?>">
                              <i class="icon icon-unlock"></i>
                            </button>| 
                            <?php } ?>
                            <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: maroon; ; border-color: maroon" type="button" data-toggle="modal" data-target="#Delete<?= $records->id?>">
                              <i class="icon icon-trash"></i>
                            </button>
                          </Center>
                        </td>
                                    
                                      

                                  </tr>
                                 
                               
                                  <?php endforeach ?>

                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <hr>
<div class="row">

              <div class="col-md-12">
                  <div class="card" >
                      <div class="card-body" >
                          <h6 class="card-title">Module-Role Count Analysis</h6>
                      </div>
                      <div class="card-body">
                          <div class="card-chart">
                              <canvas data-chart="line" data-animation="false" data-labels='["Serial Number Management", "Queries & Reports", "User Management", "Draw Data"]' data-values='[{"label": "Roles", "backgroundColor": "rgba(39, 174, 96, 0.03)", "borderColor": "#000", "data": [<?php echo $first ?>,<?php echo $second ?>,<?php echo $third ?>,<?php echo $fouth ?>]}]' data-tooltips='{"mode": "label"}'  height="35"></canvas>


                          </div>
                      </div>
                  </div>
              </div>
              </div>



            </div>


    <div id="newRole" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="background-color: #7fb4de">
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff" >
                        <span aria-hidden="true" style="color: #fff">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="text-center">
                        <span class="icon icon-group icon-5x m-y-lg"></span>
                        <h4 class="modal-title" style="font-size: 12px">New Role</h4>

                    </div>
                </div>
                <form action="CreateRole" class="jqueryform">
                <div class="modal-tabs">

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="display">
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label  class="form-label" style="font-size: 12px">Role Name</label>
                                            <input  class="form-control" name="rolename" type="text" style="font-size: 11px"></div>

                                        <hr>

                                    </div></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="serialnumber" > Serial Number Management
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="reports" > Reports & Queries
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="draws" > Draws
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="user_management" > User Management
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="show_room_management" > Show Room Entry
                                                </label>
                                            </div>

                                        </div>




                                    </div>
                                </div>


                           

                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" style="background-color: #7fb4de;border: #7fb4de;"><i class="icon icon-save"></i> Create Role</button>
                </div>
                 </form>
            </div>
        </div>
    </div>

<?php foreach($Allroles as $records):?>
 <div id="edit<?php echo $records->id ?>" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary" style="background-color: #7fb4de">
                    <button type="button" class="close" data-dismiss="modal" style="color: #fff" >
                        <span aria-hidden="true" style="color: #fff">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <div class="text-center">
                        <span class="icon icon-group icon-5x m-y-lg"></span>
                        <h4 class="modal-title" style="font-size: 12px">Edit <?php echo $records->rolename."  Role" ?></h4>

                    </div>
                </div>
                <form action="UpdateRole" class="jqueryform">
                <div class="modal-tabs">

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="display">
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <input type="hidden" value="<?php echo $records->id ?>" name="id">
                                            <label  class="form-label" style="font-size: 12px">Role Name</label>
                                            <input  class="form-control" value="<?php echo $records->rolename ?>" name="rolenameold" type="hidden" style="font-size: 11px">
                                            <input  class="form-control" value="<?php echo $records->rolename ?>" name="rolename" type="text" style="font-size: 11px">
                                          </div>

                                        <hr>

                                    </div></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="serialnumber" <?php echo ($records->serialnumber == 1) ? 'checked' : ''; ?> > Serial Number Management
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="reports" <?php echo ($records->reports == 1) ? 'checked' : ''; ?> > Reports & Queries
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="draws" <?php echo ($records->draws == 1) ? 'checked' : ''; ?> > Draws
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="user_management" <?php echo ($records->user_management == 1) ? 'checked' : ''; ?> > User Management
                                                </label>
                                            </div>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" name="show_room_management" <?php echo ($records->show_room_management == 1) ? 'checked' : ''; ?> > Show Room Record
                                                </label>
                                            </div>

                                        </div>




                                    </div>
                                </div>


                           

                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" style="background-color: #7fb4de;border: #7fb4de;"><i class="icon icon-save"></i> Update Role</button>
                </div>
                 </form>
            </div>
        </div>
    </div>

<div id="Delete<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color: #9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-trash icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">Role Delete</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Delete <span><?= $records->rolename?></span>?</a>
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="delete_data" method="post">
                <center>
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="roles" name="tablename">
                  <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                    <i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp </button>
                  <button type="button" class="btn btn-danger" style="background-color: black;border-color: black;">
                    <i class="icon icon-close"></i> Cancel </button>
                </center>
              </form>
              </div>
            </div>
          </div>
        </div>


<div id="Disable<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color:#9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-lock icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">Disable Role</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Disable <span><?= $records->rolename?></span>?</a>
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="update_data" method="post">
                <center>
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="0" name="thevalue">
                  <input type="hidden" value="rolestatus" name="thevalueField">
                  <input type="hidden" value="<?= $records->tablename?>" name="tablename">
                  <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                    <i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp </button>
                  <button type="submit" class="btn btn-danger" style="background-color: black;border-color:black;">
                    <i class="icon icon-close"></i> Cancel </button>
                </center>
              </form>
              </div>
            </div>
          </div>
        </div>
        <div id="Enable<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color:#9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-unlock icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">Enable Role</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Enable  <span><?= $records->rolename?></span></a> 
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="update_data" method="post">
                <center>
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="1" name="thevalue">
                  <input type="hidden" value="rolestatus" name="thevalueField">
                  <input type="hidden" value="<?= $records->tablename?>" name="tablename">
                  <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                    <i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp </button>
                  <button type="submit" class="btn btn-danger" style="background-color: black;border-color:black;">
                    <i class="icon icon-close"></i> Cancel </button>
                </center>
              </form>
              </div>
            </div>
          </div>
        </div>
<?php endforeach ?>