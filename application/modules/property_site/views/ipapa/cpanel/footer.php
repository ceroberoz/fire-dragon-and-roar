
  <div id="container-footer"> 
  <div class="footer-ico img-responsive">&nbsp; </div>
        <footer class="footer1">
            <div  class="container-footer">
              <div class="row">
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs first clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/footer_search_ico.png">&nbsp; &nbsp;Top Search</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" title="Office Space in Jakarta" href="<?php echo base_url();?>search/office-space-in-jakarta">Office Space in Jakarta</a></li>
                                <li><a class="link_footer" title="Office for Lease" href="<?php echo base_url();?>search/office-for-lease">Office for Lease</a></li>
                                <li><a class="link_footer" title="Virtual Office Space" href="<?php echo base_url();?>search/virtual-office-jakarta">Virtual Office Jakarta</a></li>
                                <li><a class="link_footer" title="Available Office Space" href="<?php echo base_url();?>search/available-office-space">Available Office Space</a></li>
                                <li><a class="link_footer" title="Office Space in Sudirman" href="<?php echo base_url();?>search/office-space-in-sudirman">Office Space in Sudirman</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/link_ico.png">&nbsp; &nbsp;Site Link</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" href="<?php echo base_url();?>building">Building List</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>about">About us</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>services">Services</a></li>
                                 <li><a class="link_footer" href="<?php echo base_url();?>faqs">Faq</a></li>
                                <li><a class="link_footer" data-toggle="modal" data-target="#modal-register" href="#">Join us</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->
                    
                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/legal_ico.png">&nbsp; &nbsp;Legal</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" href="<?php echo base_url();?>disclaimer">Disclaimer</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>privacy">Privacy Policy</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>terms">Terms of Use</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>copyright">Copyrights</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>sitemap">Sitemap</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 last clearfix">
                      <div style="margin-left:20px;" class="widget clearfix">
                          <div style="margin-left:-35px;" class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/newsletter_ico.png">&nbsp; &nbsp;Newsletter</h3></div>
                            Get updates directly to your email. Subcribes to our Newsletter<br>
                            <div style="padding-top:10px;" >
                            <?php
                              $attr = array(
                                'class' => 'form-inline',
                                );

                              echo form_open('public/subscribe',$attr);?>
                              <form class="form-inline" role="form">
                                <div class="form-group col-md-10 col-sm-10 col-xs-9 no-margin newsletter">
                                  <input name="g_subscribe" type="email" id="email" placeholder="Enter your Email" value="" class="form-control " required>
                                </div>
                               
                                <button style="margin-top:0px;" type="submit" class="btn btn-primary">Subcribe</button>
                             
                              <?php echo form_close();?>                      
                            </div>
                        <div class="social clearfix">
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" href="http://twitter.com/ipapa_indonesia" target="_blank"><i class="fa fa-twitter"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="http://www.facebook.com/ipapaofficial" target="_blank"><i class="fa fa-facebook"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="http://plus.google.com/+IpapaCoIdOfficial" target="_blank"><i class="fa fa-google-plus"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="http://www.linkedin.com/company/ipapa" target="_blank"><i class="fa fa-linkedin"></i></a></span>
                           <!-- <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="#"><i class="fa fa-rss"></i></a></span> -->
                        </div><!-- end social -->
                        </div>
                    </div>
                

            </div><!-- container -->
            
<p style="text-align:center;">Ipapa Member of ZMG Indonesia. Copyright &copy; 2014</p>

        </footer></div><!-- footer1 -->


   <!-- <a id="back-to-top" href="#" class="btn btn-info btn-lg back-to-top hidden-xs hidden-sm" role="button" title="Back to Top" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a> -->
    <!-- Bootstrap core and JavaScript's
    ================================================== -->
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/retina-1.1.0.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.fitvids.js"></script>    
    <script src="<?php echo base_url();?>assets/ipapa/js/fhmm.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>/assets/ipapa/admin/js/Ipapa/app.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function() {

                "use strict";

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

                //When unchecking the checkbox
                $("#check-all").on('ifUnchecked', function(event) {
                    //Uncheck all checkboxes
                    $("input[type='checkbox']", ".list-group").iCheck("uncheck");
                });
                //When checking the checkbox
                $("#check-all").on('ifChecked', function(event) {
                    //Check all checkboxes
                    $("input[type='checkbox']", ".list-group").iCheck("check");
                });
                //Handle starring for glyphicon and font awesome
                $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                    e.preventDefault();
                    //detect type
                    var glyph = $(this).hasClass("glyphicon");
                    var fa = $(this).hasClass("fa");

                    //Switch states
                    if (glyph) {
                        $(this).toggleClass("glyphicon-star");
                        $(this).toggleClass("glyphicon-star-empty");
                    }

                    if (fa) {
                        $(this).toggleClass("fa-star");
                        $(this).toggleClass("fa-star-o");
                    }
                });

                //Initialize WYSIHTML5 - text editor
                $("#email_message").wysihtml5();
            });
        </script>
            <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/assets/ipapa/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $('#buildinglist-view').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true 
                });
            });
        </script>


<script src="<?php echo base_url();?>assets/ipapa/js/application.js"></script>
<script src="<?php echo base_url();?>assets/ipapa/js/iCheck/icheck.min.js"></script>
<script type="text/javascript">
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                  $(document).ready(function() {
    $('#CheckAll')
    .on('ifChecked', function() {
      $('.checkfacilities').iCheck('check');
    })
    .on('ifUnchecked', function() {
      $('.checkfacilities').iCheck('uncheck');
    });
    });
  </script>
<!-- End digunakan di halaman building and office, and map -->


<script src="<?php echo base_url();?>assets/ipapa/js/jquery.sidr.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $('#mobile-menu').sidr();
  });
</script>
<script type="text/javascript">
      function DropDown(el) {
        this.dd = el;
        this.initEvents();
      }
      DropDown.prototype = {
        initEvents : function() {
          var obj = this;

          obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            event.stopPropagation();
          }); 
        }
      }

      $(function() {

        var dd = new DropDown( $('#dd') );

        $(document).click(function() {
          // all dropdowns
          $('.wrapper-dropdown-5').removeClass('active');
        });

      });

    </script>
</body>
</html>
