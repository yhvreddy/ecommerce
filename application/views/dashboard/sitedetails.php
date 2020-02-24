<?php include 'header.php'; ?>

<div class="page-breadcrumb">
    <div class="d-flex align-items-center">
        <h4 class="page-title text-truncate text-dark font-weight-medium mb-0">SiteDetails</h4>
        <div class="ml-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sitedetails</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-info">
                <div class="card-header bg-info cardFormTitleBox">
                    <h4 class="mb-0 text-white">Site Details : Add / Updata</h4>
                </div>
                <div class="card-body">
                    <form class="row" method="" action="">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash(); ?>" />
                        <div class="col-md-4 form-group">
                            <label>Site Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="site_name" required placeholder="Enter Site Name">
                            <?= form_error("site_name", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Site Url <span class="text-danger">*</span></label>
                            <input type="url" class="form-control" name="site_url" required placeholder="Enter Site Url">
                            <?= form_error("site_url", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Enter Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" maxlenght="10" class="form-control" name="mobile" required placeholder="Enter Mobile Number">
                            <?= form_error("mobile", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Enter Alternate Number </label>
                            <input type="tel" class="form-control" name="alternate_mobile" placeholder="Enter Alternate Number">
                            <?= form_error("alternate_mobile", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Mail id <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="mail_id" required placeholder="Enter Mail id">
                            <?= form_error("mail_id", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Alternate Mail id </label>
                            <input type="email" class="form-control" name="alternate_mail_id" placeholder="Enter Alternate Mail id">
                            <?= form_error("alternate_mail_id", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="country" required placeholder="Enter country name">
                            <?= form_error("country", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="state" required placeholder="Enter state name">
                            <?= form_error("state", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>City / District  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="city" required placeholder="Enter city / district name">
                            <?= form_error("city", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-8 form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" required placeholder="Enter Address">
                            <?= form_error("address", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Pincode <span class="text-danger">*</span></label>
                            <input type="tel" maxlength="6" class="form-control" name="pincode" required placeholder="Enter Area Pincode">
                            <?= form_error("pincode", "<small class='error'>", "</small>"); ?>
                        </div>
                        <div class="col-md-4">
                            <label>Site Logo <span class="text-danger"> .png *</span></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept=".png" class="custom-file-input" id="inputGroupFile04" required name="logo_image">
                                    <label class="custom-file-label" for="inputGroupFile04">Upload logo </label>
                                    <?= form_error("logo_image", "<small class='error'>", "</small>"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Site fav icon </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept=".png,.fav" class="custom-file-input" id="inputGroupFile04" name="fav_icon">
                                    <label class="custom-file-label" for="inputGroupFile04">Upload fav icon </label>
                                    <?= form_error("fav_icon", "<small class='error'>", "</small>"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group mt-4">
                            <button type="submit" class="btn btn-success pull-right">Save SiteDetails</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>