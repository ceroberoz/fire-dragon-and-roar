    <div class="topbar clearfix">
          <div class="container">
              <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs">
                        <div class="callus">
                            <p>&nbsp;</p>
                        </div><!-- end callus-->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="marketing">
                            <ul class="topflags pull-right">
                                <li><a data-placement="bottom" data-toggle="tooltip" data-original-title="English" title="" href="<?php echo base_url();?>"><img alt="en" src="<?php echo base_url();?>assets/ipapa/images/flags/en.png"></a></li>
                                <li><a data-placement="bottom" data-toggle="tooltip" data-original-title="Bahasa" title="" href="<?php echo base_url();?>id"><img alt="id" src="<?php echo base_url();?>assets/ipapa/images/flags/id.png"></a></li>
                            </ul>
                            <ul class="topmenu pull-right">
                                <p>
                            <span><i class="fa fa-envelope"></i> info@ipapa.co.id</span>&nbsp; &nbsp; 
                            <span><i class="fa fa-phone-square"></i> +6221 300 66 511</span>
                            </p>
                            </ul><!-- topmenu -->
                        </div><!-- end marketing -->
                    </div><!-- end col-lg-6 -->
              </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end topbar --> 
<!-- <div class="dt_stay"><div class="dt_info">+62 21 300 66 511 &nbsp; &bull; &nbsp;info@ipapa.co.id</div></div> -->
        

<!-- menu for mobile device -->
<div id="sidr" class="hidden-lg hidden-md hidden-sm">
  <ul>
    <li class="active">
        <a href="<?php echo base_url();?>id/home">BERANDA</a>
    </li>
    <li>
        <a href="<?php echo base_url();?>id/building">GEDUNG & KANTOR</a>
    </li>
    <li>
        <a href="<?php echo base_url();?>furniture">FURNITUR</a>
    </li>
    <li>
        <a href="<?php echo base_url();?>fit-out">DEKORASI</a>
    </li>
    <li>
        <a href="<?php echo base_url();?>services">LAYANAN</a>
    </li>
    <li>
      <a href="<?php echo base_url();?>about">TENTANG</a>
    </li>
    <li>
      <a href="<?php echo base_url();?>faqs">BANTUAN</a>
    </li>
  </ul>
</div>
<!--END menu for mobile device -->

<div class="navbar nav-mobile ">
  <div style="padding:8px 0;" class="hidden-lg hidden-md hidden-sm col-xs-4 pull-left"> 
    <a id="mobile-menu" href="#sidr">
    <img src="<?php echo base_url();?>/assets/ipapa/images/icon-mobile-menu.svg" alt="menu">
    </a>
  </div>

  <div style="padding:8px 0;" class="hidden-lg hidden-md hidden-sm col-xs-3 "> 
    <a href="<?php echo base_url();?>"><img class="logo-mobile" src="<?php echo base_url();?>/assets/ipapa/images/logomobile.png" alt="brand"></a>
  </div>
  <div style="padding:8px 0;" class="hidden-lg hidden-md hidden-sm col-xs-4 text-right pull-right"> 
    <a class="linklogin" data-toggle="modal" data-target="#modal-register">
      <img style="vertical-align:middle;" src="<?php echo base_url();?>/assets/ipapa/images/login_ico.png" alt="signup" width="32" height="32">
    </a>
          
  </div>

  <!--END menu for mobile device -->


    <a href="<?php echo base_url();?>" class="col-lg-1 col-md-1 hidden-sm hidden-xs navbar-brand-ipapa"><img src="<?php echo base_url();?>/assets/ipapa/images/ipapa_web_logo.png" alt="ipapa logo"></a>
    <a href="<?php echo base_url();?>" class="hidden-lg hidden-md col-sm-1 hidden-xs navbar-brand-ipapa"><img src="<?php echo base_url();?>/assets/ipapa/images/logo-circle.png" alt="ipapa logo circle"></a>
        <div id="navigasi-ipapa">
          <ol class="nav navbar-nav-ipapa hidden-xs">
          <li class="hidden-sm">
             <a href="<?php echo base_url();?>id/home">BERANDA</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>id/building">GEDUNG & KANTOR</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>furniture">FURNITUR</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>fit-out">DEKORASI</a>
              </li>
              <li>
                  <a href="<?php echo base_url();?>services">LAYANAN</a>
              </li>
              <li>
                <a href="<?php echo base_url();?>about">TENTANG</a>
              </li>
          <!-- <li class="menuakhir">
            <a href="<?php echo base_url();?>faqs">FAQ</a>
          </li> -->
      </ol>
    </div>
    <?php if(!$this->ion_auth->logged_in()){ ;?>
    <div id="usermenu-ipapa" class="hidden-xs">
      <a data-toggle="modal" data-target="#modal-login" class="sign-btn">MASUK | DAFTAR</a>
    </div> 
    <?php } else { ;?>
          <!-- if user login -->

          <?php $user = $this->ion_auth->user()->row();?>
       <div id="userlogin-ipapa">
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akun Saya &nbsp; <i class="fa fa-gear"></i></a>
          <ul class="dropdown-menu">
            <li><a href="<?php
                                $group = array(1, 2);
                            if ($this->ion_auth->in_group($group)){
                                    echo base_url().'management/myprofile';
                                }else{
                                    echo base_url().'members/myprofile';
                                }
                                ;?>"><i class="fa fa-user fa-fw"></i> Profil Saya </a></li>
            <li class="divider"></li>
            <li><a href="<?php
                                $group = array(1, 2);
                            if ($this->ion_auth->in_group($group)){
                                    echo base_url().'management/offices';
                                }else{
                                    echo base_url().'members/myoffice';
                                }
                                ;?>"><i class="fa fa-building-o fa-fw"></i> <?php
                                $group = array(1, 2);
                            if ($this->ion_auth->in_group($group)){
                                    echo "Kantor Saya";
                                }else{
                                    echo "Favorit Saya";
                                }
                                ;?></a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
        </div>
        <?php } ;?>
</div>

<!-- Modal login -->
<div class="modal" id="modal-login" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">
    <div id="section1" class="section">

    <div class="login-form">
      <a data-dismiss="modal" class="boxclose" id="boxclose"></a>
    <h3 class="judul">Masuk</h3>
    <p><img src="<?php echo base_url();?>/assets/ipapa/bm_login/img/icon-fru.jpg" alt="icon-fru"></p>
    <div>
      <form id="login-form" class="form-wrapper-01" accept-charset="utf-8" method="post" action="<?php echo base_url();?>auth/login" >               

      <!-- <form class="form-wrapper-01"> -->
        <div id="errors"></div>
        <input type="text" placeholder="Email id" class="inputbox email" name="identity">
        <input type="password" placeholder="Password" class="inputbox password" name="password">
        <p><button class="button" type="submit">Masuk</button></p>
      </form><br>
      Lupa password? <a class="scroll" href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-forgot">Perbaiki Disini</a>
      <p>Belum terdaftar? <a class="scroll" href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-register">Daftar Disini!</a></p>
    </div>
      <hr>
    </div>
    </div>

  </div>
</div>
<!-- End Modal login -->

<!-- Start Modal Register -->
<div class="modal" id="modal-register" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="section" id="section2">
      <div class="login-form">
        <a data-dismiss="modal" class="boxclose"></a>
        <h3 class="judul">Mendaftar itu mudah!</h3>
        <p>Mendaftar dengan alamat email anda.</p>
        <div>
          <?php
          $attribute = array(
                'class' => 'form-wrapper-01',
                'id' => 'register-form'
              );

          echo form_open("public/user/register",$attribute);?>
          <!-- <form class="form-wrapper-01"> -->
            <input name="identity" class="inputbox email" type="text" placeholder="Your Email" />
            <input class="inputbox password" name="password" type="password" placeholder="Password" />
            <p><button type="submit" class="button">Buat Akun Saya</button></p>
          <?php echo form_close();?>
        </div>
    <hr/>
    <p>Sudah terdaftar? <a class="scroll" href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">Masuk Disini!</a></p>
<!--
<p>Or you can Sign up with one of the following</p>
<a class="facebookBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="twitterBtn smGlobalBtn" href="social-media-profile-url" ></a>
<a class="googleplusBtn smGlobalBtn" href="social-media-profile-url" ></a>
-->

      </div>
    </div>
  </div>
</div>
<!--END: Modal Register -->

<!-- Start Modal Forgot -->
<div class="modal" id="modal-forgot" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="section">
      <div class="login-form">
        <a data-dismiss="modal" class="boxclose"></a>
    <h3 class="judul">Lupa Password?</h3>
    <p>Dapatkan password baru disini.</p>
    <div>
        <?php
          $attribute = array(
            'class' => 'form-wrapper-01',
            'id' => 'forgot-form'
          );

         echo form_open("auth/forgot_password",$attribute);?>
        <input name="email" class="inputbox email" type="text" placeholder="Your Email" />
        <p><button type="submit" class="button">Kirim</button></p>
      <?php echo form_close();?>
    </div>
    <hr />
    <p>Ingat Password? </p>
    <p><a class="scroll" href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal-login"> Masuk Disini!</a></p>
  </div>
    </div>
  </div>
</div>
<!--END: Modal Forgot Password -->
