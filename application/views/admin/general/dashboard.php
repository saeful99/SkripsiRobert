<?php $this->load->view('admin/includes/head'); ?>
<div class="wrapper fullheight-side">
<?php $this->load->view('admin/includes/header');
$this->load->view('admin/includes/sidebar'); 
$this->load->view('admin/includes/navbar'); ?>

<!-- Page Content -->

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?php echo esc($page_title) ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?php anchor_to(GENERAL_CONTROLLER . '/dashboard') ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <?php $this->load->view('admin/includes/alert'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-image text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Booking Harian</p>
                                                <h4 class="card-title font-weight-bold text-primary">+<?php echo number_format($page_data['weekly_bookings']) ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="far fa-image text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Booking</p>
                                                <h4 class="card-title font-weight-bold text-primary"><?php echo number_format($page_data['total_bookings']) ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-user-plus text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Pengguna</p>
                                                <h4 class="card-title font-weight-bold text-primary">+<?php echo number_format($page_data['weekly_users']) ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="far fa-user text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Pengguna</p>
                                                <h4 class="card-title font-weight-bold text-primary"><?php echo number_format($page_data['total_users']) ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title float-left">Total Booking</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Layanan</th>
                                                    <th scope="col">Staff</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">Qty</th>
                                                    <!-- <th scope="col">Anak-anak</th> -->
                                                    <th scope="col">Nama Pelanggan</th>
                                                    <th scope="col">Total Pembayaran</th>
                                                    <th scope="col">Status Layanan</th>
                                                    <th scope="col">Status Pembayaran</th>
                                                    <th scope="col" class="text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!$page_data['recent_bookings']){?>
                                                    <tr>
                                                        <td colspan="10" class="text-center"><h4 class="text-muted">Layanan Tidak Ditemukan</h4></td>
                                                    </tr>
                                                <?php } else{?>
                                                <?php foreach($page_data['recent_bookings'] as $i => $booking) {?>
                                                    <tr>
                                                        <td><?php echo esc($booking['title'], true) ?></td>
                                                        <td><?php if($booking['agents_id']==0 ||$booking['agents_id']==''){echo 'Any Agent';}else{echo esc($booking['agentName'], true);} ?></td>
                                                        <td><?php echo esc($booking['date'], true) ?></td>
                                                        <td><?php echo esc($booking['timing'], true) ?></td>
                                                        <td><?php echo esc($booking['adults'], true) ?></td>
                                                        <td><?php echo esc($booking['childrens'], true) ?></td>
                                                        <td><?php echo esc($booking['fullName'], true) ?></td>
                                                        <td><?php echo '$'.($booking['adults'] + $booking['childrens'])*$booking['price'] ?></td>
                                                        <td><?php if($booking['serviceStatus'] == '' || $booking['serviceStatus'] == '0'){ echo '<span class="badge badge-warning">Pending</span>'; } else if($booking['serviceStatus'] == '1') { echo '<span class="badge badge-success">Confirmed</span>'; } else if($booking['serviceStatus'] == '2') { echo '<span class="badge badge-secondary">Cancelled</span>'; } ?></td>
                                                        <td><?php if(!$booking['paymentStatus']){ echo '<span class="badge badge-danger">Due</span>'; } else { echo '<span class="badge badge-success">paid</span>'; } ?></td>
                                                        <td class="text-right">
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <?php if($booking['serviceStatus'] != '2' && !$booking['paymentStatus']) { ?>
                                                                    <a href="<?php anchor_to(BOOKINGS_CONTROLLER . '/bookingPay/' . esc($booking['id'], true). '/true') ?>" class="btn btn-link btn-primary dropdown-item">Bayar</a>
                                                                    <?php } ?>
                                                                    <?php if($booking['serviceStatus'] != '2' && !$booking['serviceStatus']) { ?>
                                                                    <a href="<?php anchor_to(BOOKINGS_CONTROLLER . '/bookingConfirm/' . esc($booking['id'], true). '/true') ?>" class="btn btn-link btn-primary dropdown-item">Konfirmasi</a>
                                                                    <?php } ?>
                                                                    <?php if($booking['serviceStatus'] != '2' && !$booking['serviceStatus']) { ?>
                                                                    <a href="<?php anchor_to(BOOKINGS_CONTROLLER . '/bookingCancel/' . esc($booking['id'], true). '/true') ?>" class="btn btn-link btn-primary dropdown-item">Batal</a>
                                                                    <?php } ?>
                                                                    <a href="<?php anchor_to(BOOKINGS_CONTROLLER . '/deleteBookings/' . esc($booking['id'], true). '/true') ?>" class="btn btn-link btn-danger dropdown-item">Hapus</a>
                                                                </div>
                                                            </div>   
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title float-left">Pengguna Terdaftar</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mt-3">
                                            <thead>
                                                <tr>
                                                    <th>Nama </th>
                                                    <th>Email</th>
                                                    <th>Telepon</th>
                                                    <th class="text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!$page_data['clients']){?>
                                                    <tr>
                                                        <td colspan="4" class="text-center"><h4 class="text-muted">Pengguna Tidak Ditemukan</h4></td>
                                                    </tr>
                                                <?php } else{?>
                                                <?php foreach($page_data['clients'] as $i => $client) { ?>
                                                    <tr>
                                                        <td><?php echo esc($client['fullName'], true) ?></td>
                                                        <td><?php echo esc($client['email'], true) ?></td>
                                                        <td><?php echo esc($client['phone'], true) ?></td>
                                                        <td class="text-right">
                                                            <a href="<?php anchor_to(CLIENTS_CONTROLLER . '/editclients/' . $client['id']) ?>" data-toggle="tooltip" data-placement="top" title="Edit Clients" class="btn btn-link btn-primary btn-lg">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="<?php anchor_to(CLIENTS_CONTROLLER . '/deleteclient/' . $client['id']. '/true') ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-link btn-danger">
                                                                <i class="fa fa-times"></i>
                                                            </a>   
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
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
</div>

<!-- End Page Content -->

</div>
<?php $this->load->view('admin/includes/foot'); ?>