<!-- <?php 
    // $menu_active =9;
    // $layout_title = "Welcome...";
    // include_once '../../config/database.php';
    // include_once '../../config/athonication.php';
    // include_once '../layout/header.php';
?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>Agreement</h2>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>




<?php //include_once '../layout/footer.php' ?> -->
<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    
?>
<style>
    table *{ white-space:nowrap; }
</style>
 <form action="#" method="POST">
<div class="portlet light bordered">
    <div class="portlet light bordered">
        
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-1">Ref No</label>
                <div class="col-sm-4">
                  <input type="text"  class="form-control" id="" value="">
                </div>
              </div>
        
        <div class="row">
             <div class="col-lg-4 col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">I. Party A(Owner of the Vechicle)</h5>
                         <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">Name</label>
                            <div class="col-sm-8">
                             <select name="txt_partname" class="form-control">
                                <option value="">==All Customer==</option>
                                
                            </select>
                            </div>
                          </div>
                        
                    </div>
                   
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">II. Party B(Renter) And requirement</h5>
                         <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">Customer ID</label>
                            <div class="col-sm-8">
                             <select name="txt_partname" class="form-control">
                                <option value="">==Customer ID==</option>
                                
                            </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-8">
                             <input type="text" class="form-control" id="" value="" placeholder="Search Customer ">
                            </div>
                            <div class="col-sm-4">
                            <button type="submit" name="btn_add" class="btn " style="width:100%;">Get Agent</button>
                            </div>
                          </div>

                        
                    </div>

                   
                   <div class="table-wrapper-scroll-y">

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>

</div>






                    <div class="row">
                        <div class="form-inline">
    <div class="form-group">
        <div class="col-md-12">
            <label class="radio-inline">
                <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox0" value="0">Origanal Passport</label>
            <label class="radio-inline">
                <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox1" value="1">Origanal ID Card</label>
           
            
        </div>

        
        
    </div>
</div>
                    </div>

                         <div class="row">
                        <div class="form-inline">
    <div class="form-group">
        

        <div class="col-md-12">
            <label class="radio-inline">
            <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox2" value="2">Origanal ID Card</label>
            
        </div>
        
    </div>
</div>
                    </div>
                   
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">Special Notices </h5>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">2.Articlies</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">4.No Driver</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5"></label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         
                        
                    </div>
                   
                </div>

             </div>
             <div class="col-lg-5 col-xs-4">
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">III.Vechicle's information</h5>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Vechicle Ref No</label>
                            <select name="txt_partname" class="form-control">
                                <option value="">1122 454i5</option>
                                
                            </select>
                          </div>
                    </div>
                   </div>
                    </div>

                     <div class="col-lg-6 col-xs-6">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">(Validation returning)</h5>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Fuel</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Fuel Full Tank</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                        
                    </div>
                   </div>
                    </div>

                </div>
                
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">IV. Vechicle Period information</h5>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Inception Date</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Inception</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Return Date</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Return Time</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Period</label>
                            <div class="col-sm-4">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                            <div class="col-sm-3">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Day</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Rate($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Rate($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Total($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Total($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Deposit($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Long DAST($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Amount($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Discount($)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">($)</label>
                            <div class="col-sm-8">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-2">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">VAT(%)</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">($)</label>
                            <div class="col-sm-8">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-2">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Amount AFT/D</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Total Net Pay</label>
                            <div class="col-sm-7">
                             <input type="text" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>
                        

                        
                    </div>
                   </div>

                
             </div>
             <div class="col-lg-3 col-xs-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">Service included</h5>
                         <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Requiar Mainanance</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Unll Mainanance</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Repare/spare parts</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Insurance Converage</label>
                            <div class="col-sm-5">
                             <select name="txt_partname" class="form-control">
                                <option value="">YES</option>
                                
                            </select>
                            </div>
                          </div>
                        
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">V. Name of signator</h5>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">1. Name Of Owner</label>
                            <input type="text" class="form-control" name="name_owner" id="" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">2. Name Of Withness</label>
                            <input type="text" class="form-control" name="name_withness" id="" placeholder="">
                          </div>
                           <div class="form-group">
                            <label for="exampleFormControlInput1">3. Name Of Renter</label>
                            <input type="text" class="form-control" name="name_withness" id="" placeholder="">
                          </div>
                        
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <button type="submit" name="btn_add" class="btn " style="width:45%;">Save</button> 
                         <button type="submit" name="btn_cancel" class="btn " style="width:45%;float: right;">Exit</button>
                        
                    </div>
                </div>
             </div>

        </div>
   </div>

</div>

</form>

<style type="text/css">
.table-wrapper-scroll-y {
display: block;
max-height: 200px;
overflow-y: auto;
-ms-overflow-style: -ms-autohiding-scrollbar;
}
</style>

<?php include_once '../layout/footer.php' ?>