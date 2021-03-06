 <div class="aside-content-wrapper">

                    <div class="aside-content bg-primary-700 text-auto">

                        <div class="aside-toolbar">

                            <div class="logo">
                                <span class="logo-icon">F</span>
                                <span class="logo-text"><?= $this->session->userdata('company_name'); ?></span>
                            </div>

                            <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                                <i class="icon icon-backburger"></i>
                            </button>

                        </div>

<ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

    <li class="subheader">
        <span>&nbsp;</span>
    </li>

    <li class="nav-item" role="tab" id="heading-dashboards">

        <a class="nav-link ripple "  href="<?php echo base_url().'dashboard'; ?>" data-url="index.html">

            <i class="icon s-4 icon-tile-four"></i>

            <span>Dashboards</span>
        </a>
        
    </li>


    <li class="nav-item" role="tab" id="heading-ecommerce">
        <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-ecommerce" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">

        <i class="icon-document"></i>

        <span>Master</span>
        </a>
        <?php if($this->uri->segment(1) == 'master' ){ ?>
            <ul id="collapse-ecommerce" class='collapse show' role="tabpanel" aria-labelledby="heading-ecommerce" data-children=".nav-item">
        <?php }else{ ?>
            <ul id="collapse-ecommerce" class='collapse' role="tabpanel" aria-labelledby="heading-ecommerce" data-children=".nav-item">
        <?php } ?>
            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'group_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/group_master' ?>">
                <span>Group</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple" href="<?= base_url().'master/group_master' ?>">
                <span>Group</span>
                </a>
                <?php } ?>
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'index' ){ ?>
                <a class="nav-link ripple active " href="<?= base_url().'master/index'; ?>">
                <span>Bank Details</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/index'; ?>">
                <span>Bank Details</span>
                </a>
                <?php } ?>                
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'party_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/party_master'; ?>">
                <span>Party</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/party_master'; ?>">
                <span>Party</span>
                </a>
                <?php } ?>                   
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'product_services' ){ ?>
                <a class="nav-link ripple active"  href="<?= base_url().'master/product_services' ?>">
                <span>Products</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple "  href="<?= base_url().'master/product_services' ?>">
                <span>Products</span>
                </a>
                <?php } ?>                   
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'route_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/route_master'; ?>">
                <span>Route</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/route_master'; ?>">
                <span>Route</span>
                </a>
                <?php } ?>                   
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'tex_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/tex_master'; ?>">
                <span>Taxes</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/tex_master'; ?>">
                <span>Taxes</span>
                </a>
                <?php } ?>                   

            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'unit_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/unit_master'; ?>">
                <span>Unit</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/unit_master'; ?>">
                <span>Unit</span>
                </a>
                <?php } ?>                   
            </li>

            <li class="nav-item">
                <?php if($this->uri->segment(2) == 'user_master' ){ ?>
                <a class="nav-link ripple active" href="<?= base_url().'master/user_master' ?>">
                <span>User</span>
                </a>
                <?php }else{ ?>
                <a class="nav-link ripple " href="<?= base_url().'master/user_master' ?>">
                <span>User</span>
                </a>
                <?php } ?>                   
            </li>
        </ul>
    </li>
    <?php if($this->session->userdata('userRole') == '0'){ ?>
        <li class="nav-item" role="tab" id="heading-ecommerce1">

            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-ecommerce1" href="#" aria-expanded="false" aria-controls="collapse-ecommerce1">

                <i class="icon-account-box"></i>

                <span>Company</span>
            </a>
            <ul id="collapse-ecommerce1" class='collapse ' role="tabpanel" aria-labelledby="heading-ecommerce1" data-children=".nav-item">

                <li class="nav-item">
                    <a class="nav-link ripple " href="<?php echo base_url().'company/createCompany'; ?>" data-url="index.html">
                        <span>Company</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link ripple " href="<?php echo base_url().'company/company_list'; ?>" data-url="index.html">

                        <span>View Company</span>
                    </a>
                </li>

            </ul>
        </li>
    <?php } ?>
    <li class="nav-item" role="tab" id="heading-dashboards">

        <a class="nav-link ripple "  href="<?php echo base_url().'Sales'; ?>" data-url="index.html">

            <i class="icon-document"></i>

            <span>Sales </span>
        </a>
        
    </li>

    <li class="nav-item" role="tab" id="heading-dashboards">

        <a class="nav-link ripple "  href="<?php echo base_url().'incomplete'; ?>" data-url="index.html">

           <i class="icon-document"></i>

            <span>Purchase </span>
        </a>
        
    </li>

</ul>
                    </div>
                </div>