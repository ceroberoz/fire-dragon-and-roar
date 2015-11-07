
<!-- FOOTER -->

<section class="generalwrapper dm-shadow clearfix"> 
        <footer class="footer1 hidden-sm hidden-xs">
            <div  class="container">
              <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 first clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><i class="fa fa-search"></i> Top Search</h3><hr></div>
                            <ul class="list">
                                <li><a class="link_footer" title="" href="#">Office Space in Jakarta</a></li>
                                <li><a class="link_footer" title="" href="#">Office for Lease</a></li>
                                <li><a class="link_footer" title="" href="#">Virtual Office Jakarta</a></li>
                                <li><a class="link_footer" title="" href="#">Available Office Space</a></li>
                                <li><a class="link_footer" title="" href="#">Office Space in Sudirman</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><i class="fa fa-link"></i> Site Links</h3><hr></div>
                            <ul class="list">
                                <li><a class="link_footer" title="" href="#">Support</a></li>
                                <li><a class="link_footer" title="" href="#">Get in touch</a></li>
                                <li><a class="link_footer" title="" href="#">About us</a></li>
                                <li><a class="link_footer" title="" href="#">Services</a></li>
                                <li><a class="link_footer" title="" href="#">Join us</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->
                    
                    <div class="col-lg-3 col-md-2 col-sm-3 col-xs-6 clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><i class="fa fa-copy"></i> Legal</h3><hr></div>
                            <ul class="list">
                                <li><a class="link_footer" title="" href="#">Disclaimer</a></li>
                                <li><a class="link_footer" title="" href="#">Privacy Policy</a></li>
                                <li><a class="link_footer" title="" href="#">Terms of Use</a></li>
                                <li><a class="link_footer" title="" href="#">Copyrights</a></li>
                                <li><a class="link_footer" title="" href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                  <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 last clearfix">
                      <div class="widget clearfix">
                          <div class="title"><h3><i class="fa fa-envelope-o"></i> Newsletter</h3><hr></div>
                            <p>Latin words, combined with a handful of model sentence structures, to generate.</p>
                              <form class="form-inline" role="form">
                                <div class="form-group">
                      <input type="text" id="email" placeholder="Enter your Email" value="" class="form-control ">
                                </div>
                                <button style="margin-top:0px;" type="submit" class="btn btn-primary">Subcribe</button>
                              </form>
                        </div>
                    </div><!-- end col-lg-4 -->

            </div><!-- container -->
          </div>
        </footer><!-- footer1 -->
        </section>
        <section class="copyright">
            <div class="container">
              <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <p><small>Ipapa Member of ZMG Indonesia. Copyright 2014</small></p>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="social clearfix pull-right">
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="" href="#"><i class="fa fa-twitter"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="#"><i class="fa fa-facebook"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="#"><i class="fa fa-google-plus"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="#"><i class="fa fa-rss"></i></a></span>
                        </div><!-- end social -->
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end copyright -->
        		
   </div> <!-- End Fixed_width -->
    <!-- Bootstrap core and JavaScript's
    ================================================== -->
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/bootstrap.min.js"></script>

    <!-- avatar -->
    <script src="<?php echo base_url();?>assets/ipapa/js/resample.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/avatar.js"></script>
    <!-- avatar end -->
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/fancyBox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- InputMask -->
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/ipapa/dashboard/js/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    

        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
               $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
                $("[data-mask]").inputmask();

                $('#officelist-view').dataTable({
                    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    "iDisplayLength": 5

                });
            });
        </script>  
</body>
</html>