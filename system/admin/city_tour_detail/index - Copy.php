<?php 
    require_once("header.php");
?>

    <!-- finished header fixed -->
    <!-- below header fixed -->
    <!-- image slide show container -->
    <br>
    <div class="container">
        <!-- Car tav view container -->
        <div class="row">
            <div class="col-sm-3" style=" text-align: left; margin: 0px; margin-left: -5px; margin-right: 10px;">
                <ul>
                    <button class="" 
                        style="float: left; margin-left: 5px; 
                        margin-right: -10px;
                        font-size: 12px; font-weight: bold;
                        background-color: #a4509f; color: white;
                        margin-bottom: 10px;
                        border: none; width: 105%; padding: 10px;" 
                    >&nbsp; &nbsp; 
                        <i class="fa fa-book" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; BOOKING SERVICES
                    </button>
                    <br>
                    <button class="tablinkss tabcolor" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'Cars')">&nbsp; &nbsp; 
                        <i class="fa fa-car" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; CARS
                    </button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'CityTours')">&nbsp; &nbsp; 
                        <i class="fa fa-building" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; CITY TOURS
                    </button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'Hotel')">&nbsp; &nbsp;  
                        <i class="fa fa-hotel" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; HOTEL & GUESTHOUSE</button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'PickUp')">&nbsp; &nbsp;  
                        <i class="fa fa-location-arrow" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; PICKUP & DROP-OFF</button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'Airport')">&nbsp; &nbsp;  
                        <i class="fa fa-plane" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; AIRPORT TRANSFER</button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'Tour')">&nbsp; &nbsp;  
                        <i class="fa fa-user-circle" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; TOUR GUIDE</button>
                    <button class="tablinkss" 
                        style="float: left; margin-left: 5px; margin-right: 5px; font-size: 12px; font-weight: bold;" 
                        onclick="openCity(event,'Driver')">&nbsp; &nbsp;  
                        <i class="fa fa-user" style="font-size: 14px; padding-right: 10px;"></i>&nbsp; DRIVER</button>
                </ul>
            </div>
            <div class="col-sm-9" style=" margin-left: -15px; margin-right: 0px;">
                <div id="Cars" class="tabcolor city" style=" background-color: #A4509F; color: white; padding-left: 15px; padding-right: 15px;">
                    <h4 style="margin-top: -15px;background-color: #A4509F; color: white;">
                        Search for Cheap Rental Cars for Self-drive, Tour Guide, Driver and Accessories Rental
                    </h4>
                    <form style="margin-top: 0px; margin-bottom: -10px;" action="#">
                        <div class="form-group">
                            <div class="row" style="text-transform: capitalize;">
                                <div class="col-md-6" style="text-transform: capitalize;">
                                    <label for="pickup" style="background-color: #A4509F; 
                                    text-transform: capitalize; color: white;">Pickup Location</label>
                                    <select class="form-control input-sm" id="pickupfrom" onchange="PickProvinceLocation()">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place  ORDER BY province";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option> -->
                                        <!-- <option value="">&hearts; BANTEAY MEANCHEY</option>
                                        <option value="">&hearts; BATTAMBANG</option>
                                        <option value="">&hearts; KAMPONG CHAM</option>
                                        <option value="">&hearts; KAMPONG CHHNANG</option>
                                        <option value="">&hearts; KAMPONG SPEU</option>
                                        <option value="">&hearts; KAMPONG THOM</option>
                                        <option value="">&hearts; KAMPOT</option>
                                        <option value="">&hearts; KANDAL</option>
                                        <option value="">&hearts; KEP</option>
                                        <option value="">&hearts; KOH KONG</option>
                                        <option value="">&hearts; KRATIE</option>
                                        <option value="">&hearts; MONDULKIRI</option>
                                        <option value="">&hearts; ODDAR MEANCHEY</option>
                                        <option value="">&hearts; PAILIN</option>
                                        <option value="">&hearts; PREAH VIHEAR</option>
                                        <option value="">&hearts; PREY VENG</option>
                                        <option value="">&hearts; PURSAT</option>
                                        <option value="">&hearts; RATANAKIRI</option>
                                        <option value="">&hearts; SIEM REAP</option>
                                        <option value="">&hearts; SIHANOUK VILLE</option>
                                        <option value="">&hearts; STEUNG TRENG</option>
                                        <option value="">&hearts; SVAY RIENG</option>
                                        <option value="">&hearts; TAKEO</option>
                                        <option value="">&hearts; TBOUNG KMUM</option> -->
                                    </select>
                                    <!-- hide pick up province location block -->
                                    <div id="pickupprovincelocation" style="display: none;">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Name and Address of Pickup Place</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Name and Address of Pick up place">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Contact Person Name</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Contact Person Name">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Contact Person Phone Number</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Contact Person Phone Number">
                                    </div>
                                    <!-- script for option select province pick up from -->
                                    <script>
                                        function PickProvinceLocation(){
                                            var pickUp = document.getElementById("pickupfrom");
                                            var index = pickUp.selectedIndex;
                                            var x = document.getElementById("pickupprovincelocation");
                                            if(index != 0){
                                                // alert(pickUp.options[index].text);
                                                // code to display form province specific location
                                                x.style.display = "block";
                                                
                                            }else{
                                                x.style.display = "none";
                                                // code to hide form province specific location
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="col-md-6">
                                    <label for="dropof" style="text-transform: capitalize;background-color: #A4509F; color: white;">Return Location</label>
                                    <select class="form-control input-sm" id="dropoffto" onchange="DropProvinceLocation()">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option>
                                        <option value="">&hearts; BANTEAY MEANCHEY</option>
                                        <option value="">&hearts; BATTAMBANG</option>
                                        <option value="">&hearts; KAMPONG CHAM</option>
                                        <option value="">&hearts; KAMPONG CHHNANG</option>
                                        <option value="">&hearts; KAMPONG SPEU</option>
                                        <option value="">&hearts; KAMPONG THOM</option>
                                        <option value="">&hearts; KAMPOT</option>
                                        <option value="">&hearts; KANDAL</option>
                                        <option value="">&hearts; KEP</option>
                                        <option value="">&hearts; KOH KONG</option>
                                        <option value="">&hearts; KRATIE</option>
                                        <option value="">&hearts; MONDULKIRI</option>
                                        <option value="">&hearts; ODDAR MEANCHEY</option>
                                        <option value="">&hearts; PAILIN</option>
                                        <option value="">&hearts; PREAH VIHEAR</option>
                                        <option value="">&hearts; PREY VENG</option>
                                        <option value="">&hearts; PURSAT</option>
                                        <option value="">&hearts; RATANAKIRI</option>
                                        <option value="">&hearts; SIEM REAP</option>
                                        <option value="">&hearts; SIHANOUK VILLE</option>
                                        <option value="">&hearts; STEUNG TRENG</option>
                                        <option value="">&hearts; SVAY RIENG</option>
                                        <option value="">&hearts; TAKEO</option>
                                        <option value="">&hearts; TBOUNG KMUM</option> -->
                                    </select>
                                    <!-- hide drop off province location block -->
                                    <div id="dropoffprovince" style="display: none;">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Name and Address of Return Place</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Where are you return in?">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Contact Person Name</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Contact Person Name">
                                        <label for="pickupaddress" style="text-transform: capitalize;background-color: #A4509F; color: white;">* Contact Person Phone Number</label>
                                        <input class="form-control input-sm" type="email" name="pickupaddress" id="" placeholder="Contact Person Phone Number">
                                    </div>
                                    <!-- script for option select province drop off to -->
                                    <script>
                                        function DropProvinceLocation(){
                                            var dropTo = document.getElementById("dropoffto");
                                            var index = dropTo.selectedIndex;
                                            var x = document.getElementById("dropoffprovince");
                                            if(index != 0){
                                                // alert(dropTo.options[index].text);
                                                // code to display form province specific location
                                                x.style.display = "block";
                                            }else{
                                                // alert(dropTo.options[index].text);
                                                // code to hide form province specific location
                                                x.style.display = "none";
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="pickupdate" style="text-transform: capitalize;background-color: #A4509F; color: white;">Pickup Date</label>
                                    <input type="date" class="form-control input-sm emptys"  id="datepicker" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="pickupdate" style="text-transform: capitalize;background-color: #A4509F; color: white;">Pickup Time</label>
                                    <input type="time" class="form-control input-sm emptys"  id="dropoffdate" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="pickupdate" style="text-transform: capitalize;background-color: #A4509F; color: white;">Return Date</label>
                                    <input type="date" class="form-control input-sm emptys" id="dropoffdate" placeholder="">
                                </div>
                                <div class="col-md-3">
                                    <label for="pickupdate" style="text-transform: capitalize;background-color: #A4509F; color: white;">Return Time</label>
                                    <input type="time" class="form-control input-sm emptys" id="dropofftime" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                <br>
                                    <label for="servicestourguide" style="color: white; margin-left: 20px;">SELECT ONE OR MORE OF THESE SERVICES</label><br>
                                    <input type="checkbox" name="services_tourguide"><b style="font-size: 12px; margin: 5px;">TOUR GUIDE</b></input>
                                    <input type="checkbox" name="services_tourguide"><b style="font-size: 12px;margin: 5px;" >DRIVER</b></input>
                                    <input type="checkbox" name="services_tourguide"><b style="font-size: 12px;margin: 5px;">ACCESSORIES</b></input>
                                    <input type="checkbox" name="services_tourguide"><b style="font-size: 12px;margin: 5px;">SELF-DRIVE</b></input>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Search for Cars</button>
                                </div>
                                <div class="col-sm-6">
                                    <label for="detailcars" style="text-transform: capitalize;color: white; font-size: 11px;">
                                        Return (Besides Pickup Location) – Provide Location Details
                                    </label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- finished car tab view container -->
                <!-- start city tours container  -->
                <div id="CityTours" class="w3-container tabcolor city" style="display:none; color: white;">
                    <h3 style="color: white; text-transform: capitalize;">City Tour (Countrywide)</h3>
                    <!-- form for tour guide searching -->
                    <form action="#" style="margin-top: -15px;">
                        <div class="form-group">
                            <!-- row number one -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="color: white;text-transform: capitalize;" for="tourlocation">Select Province /City</label>
                                    <select class="form-control input-sm" id="pickupfrom" onchange="TourLocation()">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option>
                                        <option value="">&hearts; BANTEAY MEANCHEY</option>
                                        <option value="">&hearts; BATTAMBANG</option>
                                        <option value="">&hearts; KAMPONG CHAM</option>
                                        <option value="">&hearts; KAMPONG CHHNANG</option>
                                        <option value="">&hearts; KAMPONG SPEU</option>
                                        <option value="">&hearts; KAMPONG THOM</option>
                                        <option value="">&hearts; KAMPOT</option>
                                        <option value="">&hearts; KANDAL</option>
                                        <option value="">&hearts; KEP</option>
                                        <option value="">&hearts; KOH KONG</option>
                                        <option value="">&hearts; KRATIE</option>
                                        <option value="">&hearts; MONDULKIRI</option>
                                        <option value="">&hearts; ODDAR MEANCHEY</option>
                                        <option value="">&hearts; PAILIN</option>
                                        <option value="">&hearts; PREAH VIHEAR</option>
                                        <option value="">&hearts; PREY VENG</option>
                                        <option value="">&hearts; PURSAT</option>
                                        <option value="">&hearts; RATANAKIRI</option>
                                        <option value="">&hearts; SIEM REAP</option>
                                        <option value="">&hearts; SIHANOUK VILLE</option>
                                        <option value="">&hearts; STEUNG TRENG</option>
                                        <option value="">&hearts; SVAY RIENG</option>
                                        <option value="">&hearts; TAKEO</option>
                                        <option value="">&hearts; TBOUNG KMUM</option> -->
                                    </select>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label style="color: white;text-transform: capitalize;" for="touredeparturedate">Departure Date</label>
                                            <input type="date" class="form-control input-sm" name="tourdeparturedate" id="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label style="color: white;text-transform: capitalize;" for="tourdeparturetime">Departure Time</label>
                                            <input type="time" class="form-control input-sm" name="tourdeparturetime" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <label style="color: white;text-transform: capitalize;" for="tourlocation">Pickup Location</label>
                                    <input type="text" class="form-control input-sm" name="tourlocation" placeholder="Home | Hotel | School | Restaurant etc..." id="">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label style="color: white;text-transform: capitalize;" for="touredeparturedate">Return Date</label>
                                            <input type="date" class="form-control input-sm" name="tourdeparturedate" id="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label style="color: white;text-transform: capitalize;" for="tourdeparturetime">Return Time</label>
                                            <input type="time" class="form-control input-sm" name="tourdeparturetime" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- row number two -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: white; text-transform: capitalize;" for="tourreturnlocation">Return Location</label>
                                    <input type="text" class="form-control input-sm" placeholder="Home | Hotel | School | Restaurant etc...">
                                
                                    <!-- <div class="col-md-6">
                                        <label style="color: white; text-transform: capitalize;" for="tourpricerange">Price From</label>
                                        <input type="number" class="form-control input-sm" placeholder="Minimum Price ($)">
                                    </div>
                                    <div class="col-md-6">
                                        <label style="color: white; text-transform: capitalize;" for="maximumprice">Price To</label>
                                        <input type="number" class="form-control input-sm" placeholder="Maximum Price ($)">
                                    </div> -->
                                </div>
                                <div class="col-sm-6 text-right">
                                    <br>
                                    <label for="" style="color: #a4509f">&nbsp; hlk</label>
                                    <button class="btn btn-primary" type="submit">Search Tour</button>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
                <!-- finished city tours Container -->
                
                <!-- Start hotel and Guess house container -->
                <div id="Hotel" class="w3-container tabcolor city" style="display:none">
                    <br>
                    <h3 style="color: white; margin-top: -10px; text-transform: capitalize;">Hotel & Guesthouse</h3>
                    <form action="#">
                        <div class="form-group">
                            <!-- row number one -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" for="tourlocation">Name of Province</label>
                                    <select class="form-control input-sm" id="hotel_name_of_the_province" onchange="TourLocation()">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option>
                                        <option value="">&hearts; BANTEAY MEANCHEY</option>
                                        <option value="">&hearts; BATTAMBANG</option>
                                        <option value="">&hearts; KAMPONG CHAM</option>
                                        <option value="">&hearts; KAMPONG CHHNANG</option>
                                        <option value="">&hearts; KAMPONG SPEU</option>
                                        <option value="">&hearts; KAMPONG THOM</option>
                                        <option value="">&hearts; KAMPOT</option>
                                        <option value="">&hearts; KANDAL</option>
                                        <option value="">&hearts; KEP</option>
                                        <option value="">&hearts; KOH KONG</option>
                                        <option value="">&hearts; KRATIE</option>
                                        <option value="">&hearts; MONDULKIRI</option>
                                        <option value="">&hearts; ODDAR MEANCHEY</option>
                                        <option value="">&hearts; PAILIN</option>
                                        <option value="">&hearts; PREAH VIHEAR</option>
                                        <option value="">&hearts; PREY VENG</option>
                                        <option value="">&hearts; PURSAT</option>
                                        <option value="">&hearts; RATANAKIRI</option>
                                        <option value="">&hearts; SIEM REAP</option>
                                        <option value="">&hearts; SIHANOUK VILLE</option>
                                        <option value="">&hearts; STEUNG TRENG</option>
                                        <option value="">&hearts; SVAY RIENG</option>
                                        <option value="">&hearts; TAKEO</option>
                                        <option value="">&hearts; TBOUNG KMUM</option> -->
                                    </select>  
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate">
                                        <i class="fa fa-calendar-check-o"></i>&nbsp;Check In Date/Time</label> 
                                    <div>
                                        <input style="width: 55%; float: left;" type="date" class="form-control input-sm" name="check_in_date_hotel" id="">
                                        <input style="width: 45%; float: left;" type="time" class="form-control input-sm" name="check_in_time_hotel" id=""> 
                                    </div>
                                </div>
                                <div class="col-md-4 margin-top-20">  
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-calendar-check-o"></i> Check Out Date/Time</label>
                                    <div>
                                        <input style="width: 55%; float: left;" type="date" class="form-control input-sm" name="check_our_date_hotel" id="">
                                        <input style="width: 45%; float: left;" type="time" class="form-control input-sm" name="name_of_the_hotel" id=""> 
                                    </div>
                                </div>
                            </div>
                            <!-- row number two -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate">Name of Hotel & Guesthouse</label>
                                    <input type="text" class="form-control input-sm" name="name_of_the_hotel" id="" placeholder="Name of the Hotel & Guesthouse.">
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-bed"></i> No. of Standard Room<span style="text-transform: lowercase;">(s)</span></label>    
                                    <input type="number" class="form-control input-sm" name="name_of_the_hotel" id="" 
                                    placeholder="How many room you want to book">          
                                </div>
                                <div class="col-md-4">        
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate">
                                    <i class="fa fa-bed"></i> No. of VIP Room<span style="text-transform: lowercase;">(s)</span></label>    
                                    <input type="number" class="form-control input-sm" name="name_of_the_hotel" id="" 
                                    placeholder="How many room you want to book">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 15px;">
                                    <label style="color: white; text-transform: capitalize;" for="taxonomy">Room Facilities</label>  
                                </div>
                                <div class="col-md-8">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-bed"></i> No. of Family Room<span style="text-transform: lowercase;">(s)</span></label>    
                                    <input type="number" class="form-control input-sm" name="name_of_the_hotel" id="" 
                                    placeholder="How many room you want to book">      
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-4"> 
                                    <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                    <input class="form-group" style="color: white; text-transform: capitalize;" 
                                        type="checkbox" value="">Cool & Hot Water
                                    </label>
                                    <br>
                                    <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                    <input class="form-group" style="color: white; text-transform: capitalize;" 
                                        type="checkbox" value="">Air Conditioner
                                    </label> 
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate">
                                    <i class="fa fa-user"></i>&nbsp;No. of Adult<span style="text-transform: lowercase;">(s)</span></label>
                                    <input type="number" class="form-control input-sm" name="name_of_the_hotel" id="" 
                                    placeholder="Number of adult">      
                                </div>
                                <div class="col-md-4">
                                    <label style="color: white;text-transform: capitalize;" 
                                    for="touredeparturedate"><i class="fa fa-user"></i> No. of Enfant<span style="text-transform: lowercase;">(s)</span> </label>
                                    <input type="number" class="form-control input-sm" name="name_of_the_hotel" id="" 
                                    placeholder="Number of enfant (s)">      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                                <input class="form-group" style="color: #a4509f; text-transform: capitalize;" 
                                                type="checkbox" value="">Fride
                                            </label>   
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                                <input class="form-group" style="color: #a4509f; text-transform: capitalize;" 
                                                type="checkbox" value="">WiFi
                                            </label>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                                <input class="form-group" style="color: #a4509f; text-transform: capitalize;" 
                                                type="checkbox" value="">Fan
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline" style="color: white; text-transform: capitalize;">
                                                <input class="form-group" style="color: #a4509f; text-transform: capitalize;" 
                                                type="checkbox" value="">TV
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <button class="btn btn-primary" type="submit">Search for Hotel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- finished guess house container -->
                <!-- start pick up tab view -->
                <div id="PickUp" class="w3-container tabcolor city" style="display:none">
                <br>
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked> 
                                    <span  style="color: white;text-transform: capitalize;"> One-Way</span>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">
                                    <span  style="color: white;text-transform: capitalize;"> Rounded-Trip</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4 margin-top-10">        
                                <label style="color: white; text-transform: capitalize;" 
                                for="touredeparturedate"> <i class="fa fa-location-arrow"></i>
                                Select Name of Province/City</label>
                                <select class="form-control input-sm" id="pickupanddropofflocation">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                    <!-- <option value="">&hearts; PHNOM PENH</option>
                                    <option value="">&hearts; BANTEAY MEANCHEY</option>
                                    <option value="">&hearts; BATTAMBANG</option>
                                    <option value="">&hearts; KAMPONG CHAM</option>
                                    <option value="">&hearts; KAMPONG CHHNANG</option>
                                    <option value="">&hearts; KAMPONG SPEU</option>
                                    <option value="">&hearts; KAMPONG THOM</option>
                                    <option value="">&hearts; KAMPOT</option>
                                    <option value="">&hearts; KANDAL</option>
                                    <option value="">&hearts; KEP</option>
                                    <option value="">&hearts; KOH KONG</option>
                                    <option value="">&hearts; KRATIE</option>
                                    <option value="">&hearts; MONDULKIRI</option>
                                    <option value="">&hearts; ODDAR MEANCHEY</option>
                                    <option value="">&hearts; PAILIN</option>
                                    <option value="">&hearts; PREAH VIHEAR</option>
                                    <option value="">&hearts; PREY VENG</option>
                                    <option value="">&hearts; PURSAT</option>
                                    <option value="">&hearts; RATANAKIRI</option>
                                    <option value="">&hearts; SIEM REAP</option>
                                    <option value="">&hearts; SIHANOUK VILLE</option>
                                    <option value="">&hearts; STEUNG TRENG</option>
                                    <option value="">&hearts; SVAY RIENG</option>
                                    <option value="">&hearts; TAKEO</option>
                                    <option value="">&hearts; TBOUNG KMUM</option> -->
                                </select>  
                            </div>
                            <div class="col-sm-4 margin-top-10">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Pickup Location</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                            </div>
                            <div class="col-sm-4 margin-top-10">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Drop-Off Location (Address)</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Airport">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Select Vehicle type</label>    
                                <select class="form-control" name="" id="">
                                    <option value="">Vehicle One</option>
                                    <option value="">Vehicle Two</option>
                                    <option value="">Vehicle Three</option>
                                </select>   
                            </div>
                            <div class="col-sm-4 margin-top-10">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Departure Date</label>    
                                <input type="date" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Hotel Location">   
                            </div>
                            <div class="col-sm-4 margin-top-10">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Departure Time</label>    
                                <input type="time" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Airport">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-4 text-right">
                                <br>
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="submit" class="btn btn-primary" name="btn_search_pickupdropoff" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- finished pick up tab view -->
                <!-- start airport up tab view -->
                <div id="Airport" class="w3-container tabcolor city" style="display:none">
                    <form>
                        <div class="form-group">
                            <br>
                            <div class="row">
                                <div class="col-sm-6">        
                                    <label style="color: white; text-transform: capitalize;" 
                                    for="touredeparturedate"> <i class="fa fa-location-arrow"></i>
                                    Select Name of Province/City</label>
                                    <select class="form-control input-sm" id="pickupanddropofflocation">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                                }
                                            }
                                        ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option>
                                        <option value="">&hearts; BANTEAY MEANCHEY</option>
                                        <option value="">&hearts; BATTAMBANG</option>
                                        <option value="">&hearts; KAMPONG CHAM</option>
                                        <option value="">&hearts; KAMPONG CHHNANG</option>
                                        <option value="">&hearts; KAMPONG SPEU</option>
                                        <option value="">&hearts; KAMPONG THOM</option>
                                        <option value="">&hearts; KAMPOT</option>
                                        <option value="">&hearts; KANDAL</option>
                                        <option value="">&hearts; KEP</option>
                                        <option value="">&hearts; KOH KONG</option>
                                        <option value="">&hearts; KRATIE</option>
                                        <option value="">&hearts; MONDULKIRI</option>
                                        <option value="">&hearts; ODDAR MEANCHEY</option>
                                        <option value="">&hearts; PAILIN</option>
                                        <option value="">&hearts; PREAH VIHEAR</option>
                                        <option value="">&hearts; PREY VENG</option>
                                        <option value="">&hearts; PURSAT</option>
                                        <option value="">&hearts; RATANAKIRI</option>
                                        <option value="">&hearts; SIEM REAP</option>
                                        <option value="">&hearts; SIHANOUK VILLE</option>
                                        <option value="">&hearts; STEUNG TRENG</option>
                                        <option value="">&hearts; SVAY RIENG</option>
                                        <option value="">&hearts; TAKEO</option>
                                        <option value="">&hearts; TBOUNG KMUM</option> -->
                                    </select>  
                                </div>

                                <div class="col-sm-6 text-center">
                                                                    <br>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" checked> 
                                        <span  style="color: white;text-transform: capitalize;"> One-Way</span>
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio">
                                        <span  style="color: white;text-transform: capitalize;"> Rounded-Trip</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Pickup Location</label>    
                                    <input type="text" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i>&nbsp;Drop-Off Location (Address)</label>    
                                    <input type="text" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Location">   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Return Location</label>    
                                    <input type="text" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Home | Hotel | School | Restaurant etc... ">   
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Drop-Off (Address)</label>    
                                    <input type="text" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Home Address">   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                            <i class="fa fa-plane"></i> Departure Date</label>    
                                            <input type="date" class="form-control input-sm" name="" id="" 
                                            placeholder="&#9992; Pickup From Location">   
                                        </div>
                                        <div class="col-sm-5">
                                            <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                            <i class="fa fa-plane"></i> Departure Time</label>    
                                            <input type="time" class="form-control input-sm" name="" id="" 
                                            placeholder="&#9992; Location"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i>&nbsp;Select Vehicle Type</label>   
                                    <select name="" id="" class="form-control input-sm">
                                        <option value="">Vehicle One</option>
                                        <option value="">Vehicle Two</option>
                                        <option value="">Vehicle Three</option>
                                        <option value="">Vehicle Four</option>
                                        <option value="">Vehicle Five</option>
                                        <option value="">Vehicle Six</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6 text-right">
                                    <br>
                                    <label for="Search" style="color: #a4509f;">Search</label>
                                    <input type="submit" value="Search For Flights" 
                                    class="btn btn-sm btn-primary">                           
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- finished airport tab view -->
                <!-- start Tour tab view -->
                <div id="Tour" class="w3-container tabcolor city" style="display:none">
                    <br><form action="">
                        <div class="row">
                            <div class="col-sm-6 margin-top-20">
                            <label for="pickup" 
                            style="background-color: #A4509F; text-transform: capitalize; color: white;">
                            Select Name of Province/City</label>
                            <select class="form-control input-sm" id="pickupfrom" onchange="PickProvinceLocation()">
                                <?php 
                                    $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                        }
                                    }
                                ?>
                                        <!-- <option value="">&hearts; PHNOM PENH</option>
                                <option value="">&hearts; BANTEAY MEANCHEY</option>
                                <option value="">&hearts; BATTAMBANG</option>
                                <option value="">&hearts; KAMPONG CHAM</option>
                                <option value="">&hearts; KAMPONG CHHNANG</option>
                                <option value="">&hearts; KAMPONG SPEU</option>
                                <option value="">&hearts; KAMPONG THOM</option>
                                <option value="">&hearts; KAMPOT</option>
                                <option value="">&hearts; KANDAL</option>
                                <option value="">&hearts; KEP</option>
                                <option value="">&hearts; KOH KONG</option>
                                <option value="">&hearts; KRATIE</option>
                                <option value="">&hearts; MONDULKIRI</option>
                                <option value="">&hearts; ODDAR MEANCHEY</option>
                                <option value="">&hearts; PAILIN</option>
                                <option value="">&hearts; PREAH VIHEAR</option>
                                <option value="">&hearts; PREY VENG</option>
                                <option value="">&hearts; PURSAT</option>
                                <option value="">&hearts; RATANAKIRI</option>
                                <option value="">&hearts; SIEM REAP</option>
                                <option value="">&hearts; SIHANOUK VILLE</option>
                                <option value="">&hearts; STEUNG TRENG</option>
                                <option value="">&hearts; SVAY RIENG</option>
                                <option value="">&hearts; TAKEO</option>
                                <option value="">&hearts; TBOUNG KMUM</option> -->
                            </select>  
                            </div>
                            <div class="col-sm-6 margin-top-20">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-language"></i> Select Language</label>    
                                <select class="form-control input-sm" id="pickupfrom" onchange="PickProvinceLocation()">
                                    <option value="">&hearts; KHMER</option>
                                    <option value="">&hearts; ENGLISH</option>
                                    <option value="">&hearts; JAPANESE</option>
                                    <option value="">&hearts; OTHER LANGUAGES</option>
                                    
                                </select>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Pickup Location</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                            </div>
                            <div class="col-sm-6">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Return Location</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="row">
                                    <div class="col-sm-7">
                                        <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                        <i class="fa fa-plane"></i> Departure Date</label>    
                                        <input type="date" class="form-control input-sm" name="" id="" 
                                        placeholder="&#9992; Pickup From Location">
                                    </div>   
                                    <div class="col-sm-5">
                                        <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                        <i class="fa fa-plane"></i> Departure Time</label>    
                                        <input type="time" class="form-control input-sm" name="" id="" 
                                        placeholder="&#9992; Location">   
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="row">
                                <div class="col-sm-7">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Return Date</label>    
                                    <input type="date" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Return date">   
                                </div>
                                <div class="col-sm-5">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Return Time</label>    
                                    <input type="time" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Return time">   
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            
                            </div>
                            <div class="col-sm-6 text-right">
                                <br>
                                <label for="search">&nbsp;</label>
                                <input type="submit" class="btn btn-primary" 
                                name="btn-search-tourguide" value="Search Tour Guide">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- finished Driver tab view -->
                <!-- start Tour tab view -->
                <div id="Driver" class="w3-container tabcolor city" style="display:none">
                    <br><form action="">
                        <div class="row">
                            <div class="col-sm-6 margin-top-20">
                            <label for="pickup" 
                            style="background-color: #A4509F; text-transform: capitalize; color: white;">
                            Select Name of Province/City</label>
                            <select class="form-control input-sm" id="pickupfrom" onchange="PickProvinceLocation()">
                                <?php 
                                    $v_sql = "SELECT * FROM tbl_interesting_place ORDER BY province ";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo "<option style='text-transform: uppercase;' value=''>&hearts; ".strtoupper($row["province"])."</option>";
                                        }
                                    }
                                ?>
                                <!-- <option value="">&hearts; PHNOM PENH</option>
                                <option value="">&hearts; BANTEAY MEANCHEY</option>
                                <option value="">&hearts; BATTAMBANG</option>
                                <option value="">&hearts; KAMPONG CHAM</option>
                                <option value="">&hearts; KAMPONG CHHNANG</option>
                                <option value="">&hearts; KAMPONG SPEU</option>
                                <option value="">&hearts; KAMPONG THOM</option>
                                <option value="">&hearts; KAMPOT</option>
                                <option value="">&hearts; KANDAL</option>
                                <option value="">&hearts; KEP</option>
                                <option value="">&hearts; KOH KONG</option>
                                <option value="">&hearts; KRATIE</option>
                                <option value="">&hearts; MONDULKIRI</option>
                                <option value="">&hearts; ODDAR MEANCHEY</option>
                                <option value="">&hearts; PAILIN</option>
                                <option value="">&hearts; PREAH VIHEAR</option>
                                <option value="">&hearts; PREY VENG</option>
                                <option value="">&hearts; PURSAT</option>
                                <option value="">&hearts; RATANAKIRI</option>
                                <option value="">&hearts; SIEM REAP</option>
                                <option value="">&hearts; SIHANOUK VILLE</option>
                                <option value="">&hearts; STEUNG TRENG</option>
                                <option value="">&hearts; SVAY RIENG</option>
                                <option value="">&hearts; TAKEO</option>
                                <option value="">&hearts; TBOUNG KMUM</option> -->
                            </select>  
                            </div>
                            <div class="col-sm-6 margin-top-20">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-language"></i> Select Language</label>    
                                <select class="form-control input-sm" id="pickupfrom" onchange="PickProvinceLocation()">
                                    <option value="">&hearts; KHMER</option>
                                    <option value="">&hearts; ENGLISH</option>
                                    <option value="">&hearts; JAPANESE</option>
                                    <option value="">&hearts; OTHER LANGUAGES</option>
                                    
                                </select>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Pickup Location</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                            </div>
                            <div class="col-sm-6">
                                <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                <i class="fa fa-plane"></i> Return Location</label>    
                                <input type="text" class="form-control input-sm" name="" id="" 
                                placeholder="&#9992; Home | Hotel | School | Restaurant etc...">   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="row">
                                    <div class="col-sm-7">
                                        <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                        <i class="fa fa-plane"></i> Departure Date</label>    
                                        <input type="date" class="form-control input-sm" name="" id="" 
                                        placeholder="&#9992; Pickup From Location">
                                    </div>   
                                    <div class="col-sm-5">
                                        <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                        <i class="fa fa-plane"></i> Departure Time</label>    
                                        <input type="time" class="form-control input-sm" name="" id="" 
                                        placeholder="&#9992; Location">   
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-6"> 
                                <div class="row">
                                <div class="col-sm-7">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Return Date</label>    
                                    <input type="date" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Return date">   
                                </div>
                                <div class="col-sm-5">
                                    <label style="color: white;text-transform: capitalize;" for="touredeparturedate"> 
                                    <i class="fa fa-plane"></i> Return Time</label>    
                                    <input type="time" class="form-control input-sm" name="" id="" 
                                    placeholder="&#9992; Return time">   
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            
                            </div>
                            <div class="col-sm-6 text-right">
                                <br>
                                <label for="search">&nbsp;</label>
                                <input type="submit" class="btn btn-primary" 
                                name="btn-search-tourguide" value="Search Driver">
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                <!-- finished Driver tab view -->
            </div>
                <!-- finished tap view container -->
        </div>
    </div>
    <br>
    <!-- javascript for tab view container -->
    <script>
    function openCity(evt, tapName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
            x[i].style.backgroundColor= "#A4509F";
            x[i].style.color = "white";
        }
        tablinks = document.getElementsByClassName("tablinkss");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" tabcolor", "");
            tablinks[i].style.borderRadius = "5px 5px 5px 5px";
            tablinks[i].style.fontSize = "12px";
            tablinks[i].style.fontWeight = "bold";
        }
        document.getElementById(tapName).style.display = "block";''
        evt.currentTarget.className += " tabcolor";
    }
    </script>
          <!-- finished tap view -->
          <!-- footer container -->
    <div class="container">
    <!-- <div style="height: 210px; width: 100%">
    </div> -->
        <div>    
            <img class="mySlides w3-animate-fading" src="./images/image-slide-01.jpg" style="width:120%">
            <img class="mySlides w3-animate-fading" src="./images/image-slide-02.jpg" style="width:120%">
            <img class="mySlides w3-animate-fading" src="./images/image-slide-03.jpg" style="width:120%">
            <img class="mySlides w3-animate-fading" src="./images/image-slide-04.jpg" style="width:120%">
        </div>
    </div>  
    <script>
        var myIndex = 0;
        carousel();
        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 5000);    
        }
    </script>
        <!-- finished slideshow image -->
        <!-- start tap view  -->
        <br>
          <!-- pre information section container -->
          <div class="container">
            <h5 style="color: white; padding-top: 5px; text-transform: uppercase; background-color: #A4509F"><marquee>This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee</marquee></h5>
            <div>
                <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                PRE-INFORMATION</h4>
            </div>
            <?php  
                        $v_sql = "SELECT * FROM tbl_pre_info";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                echo "<a id='pre' href='pre_info_detail.php?id=".$row["pre_id"]."'><div class='silde-horizontal' style='height:300px;'>";
                                echo "<div ><img src='system/admin/image/pre_info/".$row["pre_image"]."' style='margin: 30px;' width='100px;' height='100px;' alt=''></div>";
                                echo "<div style=' height:70px;'><p class='text-center'>".$row["pre_title"]."</p></div>";
                                echo "<div class='text-center'>";
                                echo "<a  href='pre_info_detail.php?id=".$row["pre_id"]."' class='btn btn-sm button-detail' style='margin-bottom: 5px; background-color: #a4509f;color: white;' type='buttom'>Detail</a>";
                                echo "</div></div></a>";
                            }
                        }
                        else {
                        }
                    ?>
              <!-- <div class="silde-horizontal">
                  <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div>
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div> -->
              <!-- <div class="silde-horizontal">
                    <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div>
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div>
              <div class="silde-horizontal">
                    <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div>
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div>
              <div class="silde-horizontal">
                  <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div >
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div>
              <div class="silde-horizontal">
                    <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div>
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div>
              <div class="silde-horizontal">
                <div>
                      <img src="./images/handshake.png" style="margin: 30px;" width="100px;" height="100px;" alt="">
                  </div>
                  <div>
                      <p class="text-center"><a href="#">Why choose us?</a></p>
                  </div>
                  <div class="text-center">
                      <button class="btn btn-sm button-detail" style=" margin-bottom: 5px; background-color: #a4509f;color: white;" type="buttom">Detail</button>
                  </div>
              </div> -->
              
          </div>
            <br>
              <!-- testing -->
              <!-- finished free information section -->

            <!-- // Carousel  -->
            <div class="container">
                    <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                        VEHICLE RENTAL
                    </h4>
            </div>
            <div class="container" style="margin-bottom: -20px;">
                <div class="owl-carousel">
                    <!-- <div class="items-container"> 
                        <div>
                            <a href="#">
                                <img src="cars/1.-2AR-9813-PHP-002-800x600.jpg" alt="">
                            </a>
                        </div>
                        <div>
                            <p><small>Ref. No: 2AR-9813-PHP-002-800x600 <br> 
                            <del>$60,00</del>&nbsp;<i class="fas fa-long-arrow-alt-right"></i>&nbsp;$48,00</small></p>
                        </div>
                    </div> -->
                    <?php  
                        $v_sql = "SELECT * FROM tbl_vehicle_rantal";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                echo "<div style='border:2px solid black;padding:0px;border-radius:3px;' class='items-container'><div style='background-color:#932d8e;height:30px;' class='container-fluid'><font size='4   px' color='black' ><b><i class='fa fa-car'></i> ".$row["ve_title"]."</b></font></div><div><a href='vehical_rental_detail.php?id=".$row['ve_id']."'><img id='img' src='system/admin/image/vehicle_rental/".$row["ve_image"]."' alt=''></a></div>";
                                echo "<div class='container-fluid' style='height:230px;text-align:center;'><b><font color='blue' >&emsp;Ref. No :</font><font color='red'>".$row["ve_ref_no"]."</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Day(1-7):<font color='#244a87'>$".$row["ve_days(1-7)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ve_extra_days(1-7)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Day(15-26):<font color='#244a87'>$".$row["ve_day(15-26)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ve_extra_day(15-26)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Monthly:<font color='#244a87'>$".$row["ve_monthly"]."</font>/Month</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ve_monthy_extra_days"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Yearly:<font color='#244a87'>$".$row["ve_yearly"]."</font>/Year</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ve_yearly_extra_days"]."</font>/Day</font></b></div>";
                                echo "<div class='container-fluid' style='text-align:center;'><a href='vehical_rental_detail.php?id=".$row["ve_id"]."' class='btn btn-sm button-detail' style='margin-bottom: 5px; background-color: #a4509f;color: white;' type='buttom'>Detail</a></div></div>";
                            }
                        }
                        else {
                        }
                    ?>
                    <!-- <div class="items-container"> 
                        <div>
                            <a href="#">
                                <img src="cars/1.-2Y-4368-PHP-001-800x600.jpg" alt="">
                            </a>
                        </div>
                        <div>
                            <p>Ref. No: 2AR-9813-PHP-002-800x600 <br> <del>$60,00</del>&nbsp;<i class="fas fa-long-arrow-alt-right"></i>&nbsp;$48,00</p>
                        </div>
                    </div>
                    <div class="items-container"> 
                        <div>
                            <a href="#">
                                <img src="cars/7.-2Y-4368-PHP-001-800x600.jpg" alt="">
                            </a>
                        </div>
                        <div>
                            <p>Ref. No: 2AR-9813-PHP-002-800x600 <br> <del>$60,00</del>&nbsp;<i class="fas fa-long-arrow-alt-right"></i>&nbsp;$48,00</p>
                        </div>
                    </div>
                    <div class="items-container"> 
                        <div>
                            <a href="#">
                                <img src="cars/1.-2Y-4368-PHP-001-800x600.jpg" alt="">
                            </a>
                        </div>
                        <div>
                            <p>Ref. No: 2AR-9813-PHP-002-800x600 <br> <del>$60,00</del>&nbsp;<i class="fas fa-long-arrow-alt-right"></i>&nbsp;$48,00</p>
                        </div>
                    </div>
                    <div class="items-container"> 
                        <div>
                            <a href="#">
                                <img src="cars/7.-2Y-4368-PHP-001-800x600.jpg" alt="">
                            </a>
                        </div>
                        <div>
                            <p>Ref. No: 2AR-9813-PHP-002-800x600 <br> <del>$60,00</del>&nbsp; <i class="fa fa-arrow-right" style="color: #a4509f;"></i>&nbsp;$48,00</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- accessories rental section -->
            <br><br>
            <div class="container">
                    <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                    ACCESSORIES RENTAL</h4>

            </div>
            <div class="container" style="margin-bottom: -20px;">
                <div class="owl-carousel">
                    <?php  
                        $v_sql = "SELECT * FROM tbl_accessories_rental";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                echo "<div style='border:2px solid black;padding:0px;margin-left:2px;width:94%;border-radius:3px;text-align:center;' class='items'><div style='background-color:#932d8e;height:30px;' class='container-fluid'><font color='black' ><b>".$row["ac_title"]."</b></font></div><div><img id='img' src='system/admin/image/accessories rental/".$row["ac_image"]."' alt=''></div>";
                                echo "<div class='container-fluid' style='height:220px;'><b><font color='blue' >&emsp;Ref. No :</font><font color='red'>".$row["ac_ref_no"]."</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Day(1-7):<font color='#244a87'>$".$row["ac_days(1-7)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ac_extradays(1-7)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Day(15-26):<font color='#244a87'>$".$row["ac_days(15-26)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ac_extradays(15-26)"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Monthly:<font color='#244a87'>$".$row["ac_monthly"]."</font>/Month</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ac_extramonthly"]."</font>/Day</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Yearly:<font color='#244a87'>$".$row["ac_yearly"]."</font>/Year</font></b>";
                                echo "<b><br>&emsp;<font color='#963393'>Extra Days:<font color='#244a87'>$".$row["ac_extrayearly"]."</font>/Day</font></b>";
                                echo "</div>";
                                echo "<div class='container-fluid' style='text-align:center;'><a href='#' class='btn btn-sm button-detail' style='margin-bottom: 5px; background-color: #a4509f;color: white;' type='buttom'>Book Now</a></div></div>";
                            }
                        }
                        else {
                        }
                    ?>
                </div>
            </div><br><br>
            <!-- finished accessoried rental -->
            
            <!-- city tours contrywide -->
            <div class="container">
                    <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                        CITY TOURS (COUNTRYWIDE)
                    </h4>
                    <div id="customers-container">
                    <div class="owl-carousel owl-theme">
                        <!-- <div style="margin: 10px; display: flex; justify-content: space-between;"> 
                            <div style="margin: 2px;"><a href="#"><img src="images/customer/2-1.png" alt=""></a></div>
                            <div style="margin: 2px;><a href="#"><img src="images/customer/2-1.png" alt=""></a></div>
                        </div> -->
                        <?php  
                            $v_sql = "SELECT * FROM tbl_province";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo "<div style='margin: 10px;text-align:center;border:2px solid black;'><font size='4px' style='text-transform:uppercase;'  color='#244a87'>".$row["pv_title"]."</font><a href='city_tour_detail.php?id=".$row["pv_id"]."'><img style='height:160px;' src='system/admin/image/province/".$row["pv_image"]."'></a>";
                                    echo "<a href='city_tour_detail.php?id=".$row["pv_id"]."' class='btn btn-sm button-detail' style='margin-bottom:5px;margin-top:5px;padding:10px; background-color: #a4509f;color: white;' >VIEW Nº OF PLACE</a></div>";
                                }
                            }
                            else {
                            }
                        ?>
                    </div>
                </div>
            </div>
            </div>
            <!-- finished city tours -->
            
            <!-- start hotel section -->
            <div class="container">
                    <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                        HOTELS
                    </h4>
            </div>
            <!-- finished hotel section -->

            <!-- Our Services Section Container -->
            <div class="container">
                <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                OUR SERVICES
                </h4>
                <div class="serivces-container row" style="padding-left: 18px;">
                <?php  
                    $v_sql = "SELECT * FROM tbl_our_service";
                    $result = $connect->query($v_sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            //echo "<div class='items-container'><div><a href='#'><img src='system/admin/image/vehicle_rental/".$row["ve_image"]."' alt=''></a></div>";
                            //echo $row["ve_detail"]."</div>";

                            echo " <div id='ourserverice-container col-sm-3'><div id='ourservices'><a href='our_service_detail.php?id=".$row["se_id"]."'><p id='ourservices-title' class='text-center'>".$row["se_title"]."</p><img src='system/admin/image/our_service/".$row["se_image"]."' alt=''></a>";
                            echo "</div><a href='our_service_detail.php?id=".$row["se_id"]."'><p class='text-center'></p></a></div>";
                        }
                    }
                    else {
                    }
                ?>
                <!-- <div class="serivces-container row" style="padding-left: 18px;">
                    <div id="ourserverice-container col-sm-3">    
                        <div id="ourservices">
                            <a href="">
                                <p id="ourservices-title" class="text-center">Car Selling Cansultant</p>
                                <img src="images/Unbounce-250px.png" alt="">
                            </a>
                        </div>
                        <a href=""><p class="text-center">Car Breakdown Assistance</p> </a>                   
                    </div>
                    <div id="ourserverice-container col-sm-3">    
                        <div id="ourservices">
                            <a href="">
                                <p id="ourservices-title" class="text-center">Car Selling Cansultant</p>
                                <img src="images/services.png" alt="">
                            </a>
                        </div>
                        <a href=""><p class="text-center">Car Breakdown Assistance</p> </a>                   
                    </div>
                    <div id="ourserverice-container col-sm-3">    
                        <div id="ourservices">
                            <a href="">
                                <p id="ourservices-title" class="text-center">Car Selling Cansultant</p>
                                <img src="images/Unbounce-250px.png" alt="">
                            </a>
                        </div>
                        <a href=""><p class="text-center">Car Breakdown Assistance</p> </a>                   
                    </div>
                    <div id="ourserverice-container col-sm-3">    
                        <div id="ourservices">
                            <a href="">
                                <p id="ourservices-title" class="text-center">Car Selling Cansultant</p>
                                <img src="images/services.png" alt="">
                            </a>
                        </div>
                        <a href=""><p class="text-center">Car Breakdown Assistance</p> </a>                   
                    </div> -->
                </div>
            </div>
            <!-- Our Services Section Container -->
            <!-- Our Customer Section Container -->
            <br>
            <div class="container text-center">
                <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                OUR CUSTOMERS
                </h4>
                <div id="customers-container">
                    <div class="owl-carousel owl-theme">
                        <!-- <div style="margin: 10px; display: flex; justify-content: space-between;"> 
                            <div style="margin: 2px;"><a href="#"><img src="images/customer/2-1.png" alt=""></a></div>
                            <div style="margin: 2px;><a href="#"><img src="images/customer/2-1.png" alt=""></a></div>
                        </div> -->
                        <?php  
                            $v_sql = "SELECT * FROM tbl_our_customer";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo "<div style='margin: 10px;'> <a href='our_customer_detail.php?id=".$row["ou_id"]."'><img src='system/admin/image/our_customer/".$row["ou_image"]."'></a></div>";
                                }
                            }
                            else {
                            }
                        ?>
                        <!-- <div style="margin: 10px;"> <a href="#"><img src="images/customer/2-1.png" alt=""></a></div> -->
                        <!-- <div style="margin: 10px;"> <a href="#"><img src="images/customer/20.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/21.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/22.png" alt=""></a></div>                        <div style="margin: 10px;"> <img src="images/customer/10.png" alt=""></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/230.150.1-1.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/3-2.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/4.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/5.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/6.png" alt=""></a></div>                        <div style="margin: 10px;"> <img src="images/customer/10.png" alt=""></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/7.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/8-1.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/9.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/AAPTIP_LOGO_NONE_FONT_CMYK_Highres-1024x677-2.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/10.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/11.png" alt=""></a></div>                        <div style="margin: 10px;"> <img src="images/customer/10.png" alt=""></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/12.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/13.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/14.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/15.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/16.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/17.png" alt=""></a></div>                        <div style="margin: 10px;"> <img src="images/customer/10.png" alt=""></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/18.png" alt=""></a></div>
                        <div style="margin: 10px;"> <a href="#"><img src="images/customer/19.png" alt=""></a></div>              -->
                    </div>
                </div>
            </div>
            <!-- finished Our Customer Section Container -->
        </div>
        <!-- script for carousel -->
        <script src="owl.carousel/jquery.min.js"></script>
        <script src="owl.carousel/owl.carousel.min.js"></script>
        <script src="owl.carousel/jquery.js"></script>
        <!-- finished Carousel -->
        </div>
          <!-- finished pre information section -->
        <!-- include footer file  -->
<?php require_once("footer.php"); ?>

