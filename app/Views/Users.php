<div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-body">
                  <table id="demo-datatables-responsive-1" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%" style="font-size: 12px">
                    <thead>
                      <tr>
                        <th>User Email</th>
                        <th>Staff Name</th>
                        <th>Created On</th>
                        <th>Sex</th>
                        <th>accountstatus</th>
                        <th>
                          <Center> Actions</Center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $active=0; $notactive=0; ?>
                     <?php foreach ($users as $records): {?>
                       
                      <tr>
                        <td><?php echo $records->useremail?></td>
                        <td><?php echo $records->fname?></td>
                        <td><?php echo $records->createdon?></td>
                        <td><?php echo $records->sex?></td>
                        <td>
                        
                        <?php if($records->accountstatus==="1"){?>
                          <?php  $active+=1; ?>
                          Active

                          <?php } else { ?>

                            <?php  $notactive+=1; ?>
                            Disabled

                          <?php } ?>
                      </td>
                        <td>
                          <Center>
                            <?php if($records->accountstatus==="1"){?>
                            <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: goldenrod; border-color: goldenrod" type="button" data-toggle="modal" data-target="#editUser<?= $records->id?>">
                              <i class="icon icon-edit"></i>
                            </button> | <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: black; border-color: black" type="button" data-toggle="modal" data-target="#disUser<?= $records->id?>">
                              <i class="icon icon-lock"></i>
                            </button> 
                            <?php } else { ?>
                              | <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: green; ; border-color: green" type="button" data-toggle="modal" data-target="#enaUser<?= $records->id?>">
                              <i class="icon icon-unlock"></i>
                            </button>| 
                            <?php } ?>
                            <button class="btn  btn-warning" style="text-transform: capitalize;  background-color: maroon; ; border-color: maroon" type="button" data-toggle="modal" data-target="#delUser<?= $records->id?>">
                              <i class="icon icon-trash"></i>
                            </button>
                          </Center>
                        </td>
                      </tr>
                    <?php }endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="divider">
            <div class="divider-content " style="color: #7fb4de">
              <b>
                <i class="icon icon-line-chart"></i> Statistics </b>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-body" data-toggle="match-height">
                <h6 class="text-left m-t-0">Account accountstatus Distribution</h6>
                <div class="row">
                  <div class="col-xs-3">
                    <br>
                    <br>
                    <ul class="list-unstyled">
                      <li class="m-b">
                        <small class="nowrap">
                          <span class="icon icon-square icon-fw" style="color: #7fb4de"></span> Active </small>
                      </li>
                      <li class="m-b">
                        <small class="nowrap">
                          <span class="icon icon-square icon-fw" style="color: gainsboro"></span> Disabled </small>
                      </li>
                    </ul>
                  </div>
                  <div class="col-xs-6">
                    <canvas data-chart="pie" data-labels='["Active", "Disabled"]' data-values='[{"backgroundColor": ["#7fb4de", "gainsboro"], "data": [<?php echo $active ?>, <?php echo $notactive; ?>]}]' data-hide='["scalesX", "scalesY", "legend"]' height="100" width="300"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!--background-color: #7fb4de-->
</div>

          <?php foreach($users as $records):{?>

<div id="delUser<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color: #9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-trash icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">User Account Delete</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Delete <span><?= $records->fname?></span>?</a>
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="delete_data" method="post">
                <center>
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="<?= $records->tablename?>" name="tablename">
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
        <div id="disUser<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color:#9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-lock icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">Disable User Account</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Disable <span><?= $records->fname?></span>?</a>
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="update_data" method="post">
                <center>
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="0" name="thevalue">
                  <input type="hidden" value="accountstatus" name="thevalueField">
                  <input type="hidden" value="<?= $records->tablename?>" name="tablename">
                  <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                    <i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp </button>
                  <button type="button" class="btn btn-danger" style="background-color: black;border-color:black;">
                    <i class="icon icon-close"></i> Cancel </button>
                </center>
              </form>
              </div>
            </div>
          </div>
        </div>
        <div id="enaUser<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color:#9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-unlock icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 14px">Enable User Account</h4>
                </div>
              </div>
              <div class="modal-tabs">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a href="#display" data-toggle="tab" style="font-size: 12px">Do You Want To Enable  <span><?= $records->fname?></span></a> 
                  </li>
                </ul>
              </div>
              <div class="modal-footer">
                <form action="update_data" method="post">
                <center>
                   <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" value="1" name="thevalue">
                  <input type="hidden" value="accountstatus" name="thevalueField">
                  <input type="hidden" value="<?= $records->tablename?>" name="tablename">
                  <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                    <i class="icon icon-check"></i>&nbsp &nbsp Yes &nbsp &nbsp </button>
                  <button type="button" class="btn btn-danger" style="background-color: black;border-color:black;">
                    <i class="icon icon-close"></i> Cancel </button>
                </center>
              </form>
              </div>
            </div>
          </div>
        </div>
        <div id="editUser<?= $records->id?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary" style="background-color: #9A2A2A">
                <button type="button" class="close" data-dismiss="modal" style="color: #fff">
                  <span aria-hidden="true" style="color: #fff">×</span>
                  <span class="sr-only">Close</span>
                </button>
                <div class="text-center">
                  <span class="icon icon-edit icon-5x m-y-lg"></span>
                  <h4 class="modal-title" style="font-size: 12px">Edit User's Details</h4>
                </div>
              </div>
              <form class="userCrude" action="userCrude" >
              <!-- <form method="post"> -->
              <div class="modal-tabs">
                <div class="tab-content">
                  <div class="tab-pane fade active in" id="display4">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <label class="form-label" style="font-size: 12px">User's Full Name</label>
                          <input id="form-control-6" value="<?= $records->fname?>" class="form-control" name="fname" type="text" style="font-size: 11px">
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" style="font-size: 12px">Sex</label>
                          <select id="demo-select2-2" class="form-control" name="sex" style="font-size: 11px">
    <option value="--" <?php echo ($records->sex == "--") ? 'selected' : ''; ?>>--</option>
    <option value="Male" <?php echo ($records->sex == "Male") ? 'selected' : ''; ?>>Male</option>
    <option value="Female" <?php echo ($records->sex == "Female") ? 'selected' : ''; ?>>Female</option>
</select>

                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <label class="form-label" style="font-size: 12px">User Email</label>
                          <input id="form-control-7" value="<?= $records->useremail?>" class="form-control" name="useremail" type="Email" style="font-size: 11px">
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" style="font-size: 12px">Phone Number</label>
                          <input id="phoneNumber" maxlength="10" value="<?= $records->phonenumber?>" class="form-control" name="phonenumber" type="text" style="font-size: 11px" >
                        </div>
                      </div>
                    </div>
                    <hr style="border-color: #9A2A2A">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label class="form-label" style="font-size: 12px">User Role</label>
                          <select id="demo-select2-3" class="form-control" name="roleid" style="font-size: 11px">
    <option value="1" <?php echo ($records->roleid == 1) ? 'selected' : ''; ?>>Dashboard User</option>
    <option value="2" <?php echo ($records->roleid == 2) ? 'selected' : ''; ?>>User Management User</option>
    <option value="3" <?php echo ($records->roleid == 3) ? 'selected' : ''; ?>>Administrator</option>
</select>



                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <input type="hidden" value="<?= $records->id?>" name="id">
                  <input type="hidden" name="crudetype" value="update">

                <button type="submit" class="btn btn-primary" style="background-color: #9A2A2A;border-color: #9A2A2A;">
                  <i class="icon icon-save"></i> Save </button>
              </div>
            </form>
            </div>
          </div>
        </div>



            <?php } endforeach ?>