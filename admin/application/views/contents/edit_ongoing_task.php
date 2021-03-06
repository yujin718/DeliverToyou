<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong> Edit Ongoing </strong> Tasks </h3>
    </div>

    <?php $group_order_id = $this->input->get('group_order_id');?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong> Tasks </strong></h3>
                    <a href="<?php echo site_url('admin/ongoing_tasks'); ?>" class="btn btn-default m-r-10" style="float: right;margin-top: -7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Order No.</th>
                                        <th>Vendor Name</th>
                                        <th>Vendor Contact</th>
                                        <th>Customer Name</th>
                                        <th> Customer Contact </th>
                                        <th>Drop Off Location</th>
                                        <th>Details</th>
                                        <th>Pick Up Time</th>
                                        <th>Instructions</th>
                                        <th>Cancel Order</th>
                                        <th>Reassign Order</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($ongoingorderlistsindividual as $ongoingorderlists) { 

                                        $this->db->select('*');
                                        $this->db->from('order');                                      
                                        $this->db->where('order_id',$ongoingorderlists->order_id);
                                        $this->db->join('users', 'users.user_id = order.vendor_id');
                                        $vendorid = $this->db->get()->row();

                                        
                                        ?>

                                        <?php if ($ongoingorderlists->order_status_id == 3) {  ?>
                                            <tr style="background-color: #993333;">
                                        <?php } else if ($ongoingorderlists->order_status_id == 4) { ?> 
                                            <tr style="background-color: #FCDD11;">
                                        <?php } else { ?>
                                            <tr>
                                        <?php } ?>

                                            <td> <?php if (!empty($ongoingorderlists->order_id)) echo $ongoingorderlists->order_id; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->order_no)) echo $ongoingorderlists->order_no; ?> </td>
                                            <td> <?php if (!empty($vendorid->username)) echo $vendorid->username; ?> </td>
                                            <td> <?php if (!empty($vendorid->mobile)) echo $vendorid->mobile; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->customer_name)) echo $ongoingorderlists->customer_name; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->customer_contact)) echo $ongoingorderlists->customer_contact; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->dropoff_address_line_1)) echo $ongoingorderlists->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->detail)) echo $ongoingorderlists->detail; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->pickup_time)) echo $ongoingorderlists->pickup_time; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlists->instruction)) echo $ongoingorderlists->instruction; ?> </td>

                                            <?php if ($ongoingorderlists->order_status_id == 3 || $ongoingorderlists->order_status_id == 4 ) {  ?>
                                                <td><a href="#" class="btn btn-danger disabled">
                                                    <i class="fa fa-times" aria-hidden="true"></i></a>
                                                </td>
                                                 <td><a href="#" class="btn btn-primary disabled">
                                                    <i class="fa fa-user" aria-hidden="true"></i></a>
                                                </td>
                                            <?php } else { ?>

                                                <td><a href="<?php echo base_url(); ?>index.php/admin/cancelongoingtaskorder?order_id=<?php echo $ongoingorderlists->order_id ?>&group_order_id=<?php echo $group_order_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Cancel this Order?');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                <td><a href="<?php echo base_url(); ?>index.php/admin/reassignorder?order_id=<?php echo $ongoingorderlists->order_id ?>&group_order_id=<?php echo $group_order_id ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to Reassign this Order?');"><i class="fa fa-user" aria-hidden="true"></i></a></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

