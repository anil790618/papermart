<input type="hidden" id="" value="<?= $appproved ?>">

<link rel="stylesheet" href="<?= base_url(); ?>/public/public/vendor/chartist/css/chartist.min.css">

<div class="container-fluid">

    <div class="dash-del-top">
        <div class="row">
            <div class="col-sm-12">
                <div class="price-list">
                    <div class="marquee">
                        <div>
                            <span>This will be slider for market rates</span>
                            <span>This will be slider for market rates</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="del-dashcount gra-1">
                    <div class="icon-dash">
                        <img class="dash-four-icon" id="logo" src="<?= base_url(); ?>\public\public\images\clear_all.png" alt="">
                        <img class="three-dots" id="logo" src="<?= base_url(); ?>\public\public\images\three-dots.png" alt="">
                    </div>
                    <div class="count-txt-dash">
                        <p class="number-dash"><img class="count-ruppey" id="" src="<?= base_url(); ?>\public\public\images\currency_rupee.png" alt=""><?= $sale_listing['tamount'] ?? '0'; ?></p>
                        <p class="dal-number-dash">Sale through Listing</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="del-dashcount gra-2">
                    <div class="icon-dash">
                        <img class="dash-four-icon" id="logo" src="<?= base_url(); ?>\public\public\images\currency_rupee.png" alt="">
                        <img class="three-dots" id="logo" src="<?= base_url(); ?>\public\public\images\three-dots.png" alt="">
                    </div>
                    <div class="count-txt-dash">
                        <p class="number-dash"><img class="count-ruppey" id="" src="<?= base_url(); ?>\public\public\images\currency_rupee.png" alt=""><?= $sale_requirement['tamount'] ?? '0'; ?></p>
                        <p class="dal-number-dash">Sale through Requirment</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="del-dashcount gra-3">
                    <div class="icon-dash">
                        <img class="dash-four-icon" id="logo" src="<?= base_url(); ?>\public\public\images\weight.png" alt="">
                        <img class="three-dots" id="logo" src="<?= base_url(); ?>\public\public\images\three-dots.png" alt="">
                    </div>
                    <div class="count-txt-dash">
                        <p class="number-dash"><?= $sale_qty['tqty'] ?? '0'; ?>Kg</p>
                        <p class="dal-number-dash">Weekly total sale Qnty</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="del-dashcount gra-4">
                    <div class="icon-dash">
                        <img class="dash-four-icon" id="logo" src="<?= base_url(); ?>\public\public\images\currency_rupee.png" alt="">
                        <img class="three-dots" id="logo" src="<?= base_url(); ?>\public\public\images\three-dots.png" alt="">
                    </div>
                    <div class="count-txt-dash">
                        <p class="number-dash"><img class="count-ruppey" id="" src="<?= base_url(); ?>\public\public\images\currency_rupee.png" alt=""><?= $sale_weekly['tamount'] ?? '0'; ?></p>
                        <p class="dal-number-dash">Weekly total sale Price</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dash-status">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="dash-status-div">
                            <div class="negitiveandpos pos">
                                <span>+18.7%</span>
                            </div>
                            <div class="dash-status-count">
                                <span><?= $ncustomer['new_cus'] ?></span>
                            </div>
                            <div class="dash-status-txt">
                                <span>New Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="dash-status-div">
                            <div class="negitiveandpos neg">
                                <span>+10.7%</span>
                            </div>
                            <div class="dash-status-count">
                                <span><?= $tcustomer['tcus'] ?></span>
                            </div>
                            <div class="dash-status-txt">
                                <span>Total Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="dash-status-div">
                            <div class="negitiveandpos three-doys-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M207.858 624Q188 624 174 609.858q-14-14.141-14-34Q160 556 174.142 542q14.141-14 34-14Q228 528 242 542.142q14 14.141 14 34Q256 596 241.858 610q-14.141 14-34 14Zm272 0Q460 624 446 609.858q-14-14.141-14-34Q432 556 446.142 542q14.141-14 34-14Q500 528 514 542.142q14 14.141 14 34Q528 596 513.858 610q-14.141 14-34 14Zm272 0Q732 624 718 609.858q-14-14.141-14-34Q704 556 718.142 542q14.141-14 34-14Q772 528 786 542.142q14 14.141 14 34Q800 596 785.858 610q-14.141 14-34 14Z"></path>
                                </svg>
                            </div>
                            <div class="dash-status-count">
                                <span>1,500Kg</span>
                            </div>
                            <div class="dash-status-txt">
                                <span>Total Supplies</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="dash-status-div">
                            <div class="negitiveandpos three-doys-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 96 960 960" width="48">
                                    <path d="M207.858 624Q188 624 174 609.858q-14-14.141-14-34Q160 556 174.142 542q14.141-14 34-14Q228 528 242 542.142q14 14.141 14 34Q256 596 241.858 610q-14.141 14-34 14Zm272 0Q460 624 446 609.858q-14-14.141-14-34Q432 556 446.142 542q14.141-14 34-14Q500 528 514 542.142q14 14.141 14 34Q528 596 513.858 610q-14.141 14-34 14Zm272 0Q732 624 718 609.858q-14-14.141-14-34Q704 556 718.142 542q14.141-14 34-14Q772 528 786 542.142q14 14.141 14 34Q800 596 785.858 610q-14.141 14-34 14Z"></path>
                                </svg>
                            </div>
                            <div class="dash-status-count">
                                <span>35</span>
                            </div>
                            <div class="dash-status-txt">
                                <span>Purchase Invoice</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
               
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line chart with area</h4>
                        </div>
                        <div class="card-body">
                           <div class="bar-graph">
                               <canvas id="graphCanvas" width="650" height="385"></canvas>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

   
    <div class="dash-table">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card table-div p-0">
                            <div class="table-header-div m-0">
                                <h4 class="tabel-title">Last 2 Sale details</h4>
                            </div>
                            <div class="tabel-body-div mt-0">
                                <div class="table-responsive overflow-hidden">

                                    <div id="table">
                                        <table id="producttype_tbale" class="table table-responsive-md tabledata size-6">
                                            <tbody>
                                                <thead>
                                                    <th>S.No</th>
                                                    <th>#Sale</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                    <th>Sale Date</th>
                                                    <!-- <th>Client Detail</th> -->
                                                    <th>Delivery Date</th>
                                                    <th>Vehicle No</th>
                                                    <th>Driver Name</th>
                                                    <th>Action</th>
                                                </thead>

                                                <?php
                                                if ($salequery) {
                                                    $i = 1;
                                                    foreach ($salequery as $value) {

                                                ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $value['order_number'] ?></td>
                                                            <td><?= $value['qty']; ?></td>
                                                            <td><?= $value['total_price'] ?></td>
                                                            <td><?= $value['order_date'] ?></td>
                                                            <!-- <td><?= $value['order_to_name']  ?> </td> -->
                                                            <td><?= $value['delivery_date'] ?></td>
                                                            <td><?= $value['vno'] ?></td>
                                                            <td><?= $value['driver_name'] ?> , <?= $value['driver_phone_number'] ?></td>
                                                            <td>
                                                                <?php if ($value['order_type'] == 2) { ?> 
                                                                    
                                                                    <a class="paymentRecieveData badge light badge-info badge-text-size view_btn" title="Payment deatils" href="javascript:void(0)" tag="<?= $value['id']; ?>"><i class="fa fa-credit-card"></i></a>

                                                                    <span class="statusdata"> <?php if ($value['vehiclestatus'] >= '4') {  ?> 
                                                                        <a class="badge light badge-secondary badge-text-size  dispatch-outfordelivery"  title="Dispatch deatils" href="javascript:void(0)" tag="<?= $value['id']; ?>"><i class="fa fa-truck"></i></a> 
                                                                        
                                                                        <?php } else { ?> <a class="badge light badge-warning   badge-text-size  viewOrderspecification" href="javascript:void(0)"  title="Order Specification deatils" tag="<?= $value['id']; ?>"><i class="fa fa-info"></i></a> <?php } ?>
                                                                    </span>
                                                                    <span class="vehiclerequest<?= $value['id'] ?>"> <?php if ($value['dtype'] == '0' and $value['vehiclestatus'] == '0') { ?>
                                                                        
                                                                        <a class="sendVehicleRequest badge light badge-warning badge-text-size view_btn"  title="Send Vehicle  Request" href="javascript:void(0)"  tag="<?= $value['id']; ?>" lid="<?= $value['list_id']; ?>"><i class="fa fa-send"></i></a> 

                                                                    <?php } ?></span>

                                                                    <span class="generateVehiclerequest<?= $value['id'] ?>"><?php if ($value['dtype'] == '1' and $value['vehiclestatus'] == '0') {  ?> 
                                                                        <a class="badge light badge-secondary badge-text-size  generateVehicleRequest" title="Generate Vehicle  Request" href="javascript:void(0)" tag="<?= $value['id']; ?>">generate vehicle request</a> 
                                                                        
                                                                    <?php } ?></span>

                                                                    <a class="orderTracking badge light badge-info badge-text-size view_btn" href="javascript:void(0)" tag="<?= $value['id']; ?>" title="Order Tracking"><i class="fa fa-map-marker"></i></a><?php } else if ($value['order_type'] == 1) {
                                                                                                                                                                                                                                                            } ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="4">No Data</td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- this div hide by d-none class -->
    <div class="row d-none">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4><?php if ($dashboard_type == 2) {
                            echo ' Buyer';
                        } else if ($dashboard_type == 1) {
                            echo ' Seller';
                        } else if ($dashboard_type == 0) {
                            echo ' Main';
                        } ?> Dashboard </h4>


                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row p-4">
                            <div class="col-4">
                                <div id="profileImage"></div>

                            </div>
                            <div class="col-8 p-3">
                                <span id="fullName">
                                    <h3><?= $userdata['user_name'] ?></h3>
                                </span>
                                <?= $userdata['company_name'] ?><br>

                                <?= $userdata['phone_number'] ?> <br>
                                <?= $userdata['email'] ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title m-2">Location</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table shadow-hover">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-black mb-1 font-w600">Address</p>
                                        </td>
                                        <td>
                                            <span class="fs-14"><?= $userdata['address'] ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="text-black mb-1 font-w600">State</p>
                                        </td>
                                        <td>
                                            <span class="fs-14"><?= $userdata['state'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-black mb-1 font-w600">City</p>
                                        </td>
                                        <td>
                                            <span class="fs-14"><?= $userdata['city'] ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-black mb-1 font-w600">Pin Code</p>
                                        </td>
                                        <td>
                                            <span class="fs-14"><?= $userdata['pin_code'] ?></span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

    <script>

        var data = <?php echo json_encode($graphdata); ?>;
        // Data for the horizontal bar graph
        // var data = [
        //     { product_category: 'Delivery Date', listing: 10 },
        //     { product_category: 'Category B', listing: 5 },
        //     { product_category: 'Category C', listing: 8 },
        //     { product_category: 'Category D', listing: 3 },
        //     { product_category: 'Category C', listing: 8 },
        //     { product_category: 'Category D', listing: 3 },
        //     { product_category: 'Category E', listing: 6 }
        // ];
        // alert(obj);
        // alert(data);
        // Find the maximum value in the data
        var maxValue = 0;
        for (var i = 0; i < data.length; i++) {
            if (data[i].listing > maxValue) {
                maxValue = data[i].listing;
            }
        }

        var canvas = document.getElementById('graphCanvas');
        var ctx = canvas.getContext('2d');

        // Define the dimensions of the graph
        var padding = 40;
        var canvasWidth = canvas.width - 2 * padding;
        var canvasHeight = canvas.height ;
        
        var graphWidth = canvasWidth - 2 * padding;
        var graphHeight = canvasHeight - 2 * padding;

        // Calculate the width of each bar
        var barWidth = graphWidth / maxValue;

        // Draw the grid lines
        // ctx.font = '14px ';
         ctx.font = '14px poppins';
        // ctx.fontFamily = 'Inter';
        ctx.beginPath();
        for (var i = 0; i <= maxValue; i++) {
            var x = padding*5 + 10  + i * barWidth;
            var y = padding   ;
            if(i % 2 == 0){ 
             ctx.moveTo(x, padding);
            ctx.lineTo(x, canvasHeight - padding);
            ctx.fillText(i, x, y );
        }
           
        }
        ctx.strokeStyle = '#ccc';
        ctx.stroke();
       
        // Draw the bars
        for (var i = 0; i < data.length; i++) {
            var barHeight = graphHeight / data.length;
            var x = padding*5 +10;
            var y = padding + i * barHeight + 10;
            var barWidth1 = data[i].listing * barWidth;
            ctx.fillStyle = '#266FDD';
            ctx.fillRect(x, y, barWidth1, barHeight - 20);
        }

        // Draw the labels
        ctx.fillStyle = 'black';
        ctx.font = '14px poppins';
        // ctx.fontFamily = 'Inter';
        for (var i = 0; i < data.length; i++) {
            var x = data[i].listing * barWidth + padding +10 ;
            var x1 = 10 ;
            var y = padding + i * (graphHeight / data.length) + 25;
            ctx.fillText(data[i].product_category, x1, y);
            // ctx.fillText(data[i].value, x, y);
        }
    </script>