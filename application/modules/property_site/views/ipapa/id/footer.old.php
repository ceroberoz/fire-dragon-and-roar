
  <div id="container-footer"> 
  <div class="footer-ico img-responsive">&nbsp; </div>
        <footer class="footer1">
            <div  class="container-footer">
              <div class="row">
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs first clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/footer_search_ico.png" alt="icon-topsearch">&nbsp; &nbsp;Pencarian Favorit</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" title="Office Space in Jakarta" href="<?php echo base_url();?>search/office_space_in_jakarta">Office Space in Jakarta</a></li>
                                <li><a class="link_footer" title="Office for Lease" href="<?php echo base_url();?>search/office_for_lease">Office for Lease</a></li>
                                <li><a class="link_footer" title="Virtual Office Space" href="<?php echo base_url();?>search/virtual_office_jakarta">Virtual Office Jakarta</a></li>
                                <li><a class="link_footer" title="Available Office Space" href="<?php echo base_url();?>search/available_office_space">Available Office Space</a></li>
                                <li><a class="link_footer" title="Office Space in Sudirman" href="<?php echo base_url();?>search/office_space_in_sudirman">Office Space in Sudirman</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/link_ico.png" alt="icon-link">&nbsp; &nbsp;Halaman Situs</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" href="<?php echo base_url();?>building">Daftar Gedung</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>about">Tentang Kami</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>services">Layanan</a></li>
                                 <li><a class="link_footer" href="<?php echo base_url();?>faqs">Bantuan</a></li>
                                <li><a class="link_footer" data-toggle="modal" data-target="#modal-register" href="#">Bergabung dengan kami</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->
                    
                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs clearfix">
                        <div class="widget clearfix">
                            <div class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/legal_ico.png" alt="icon-legal">&nbsp; &nbsp;Legal</h3></div>
                            <ul class="list">
                                <li><a class="link_footer" href="<?php echo base_url();?>disclaimer">Disclaimer</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>privacy">Privacy Policy</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>terms">Terms of Use</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>copyright">Copyrights</a></li>
                                <li><a class="link_footer" href="<?php echo base_url();?>home/sitemap">Sitemap</a></li>
                            </ul>
                        </div>
                    </div><!-- end col-lg-3 -->

                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 last clearfix">
                      <div style="margin-left:20px;" class="widget clearfix">
                          <div style="margin-left:-35px;" class="title"><h3><img src="<?php echo base_url();?>/assets/ipapa/images/newsletter_ico.png" alt="icon-newsletter">&nbsp; &nbsp;Newsletter</h3></div>
                            
                            Dapatkan update langsung dari kami ke email anda. Daftar disini<br>
                            <div style="padding-top:10px;" >
                            <?php
                              $attr = array(
                                'class' => 'form-inline',
                                );

                              echo form_open('public/subscribe',$attr);?>
                                <div class="form-group col-md-10 col-sm-10 col-xs-9 no-margin newsletter">
                                  <input name="g_subscribe" type="email" id="email" placeholder="Enter your Email" value="" class="form-control " required>
                                </div>
                               
                                <button style="margin-top:0px;" type="submit" class="btn btn-primary">Mendaftar</button>
                             
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
                
              </div>
            </div><!-- container -->
            
<p style="text-align:center">Ipapa anggota dari ZMG Indonesia. Hak cipta &copy; 2014</p>

        </footer></div><!-- footer1 -->


   <!-- <a id="back-to-top" href="#" class="btn btn-info btn-lg back-to-top hidden-xs hidden-sm" role="button" title="Back to Top" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a> -->
    <!-- Bootstrap core and JavaScript's
    ================================================== -->
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery-1.10.2.min.js"></script>
    <!--
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.unveilEffects.js"></script>  
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.parallax.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/retina-1.1.0.js"></script>
    -->
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.fitvids.js"></script>    
    <script src="<?php echo base_url();?>assets/ipapa/js/fhmm.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/application.js"></script>
    
<script type="text/javascript">
        $("#country_id").change(function(){
                var selectValues = $("#country_id").val();
                if (selectValues == 0){
                    var msg = "<select id=\"province_id\" class=\"selectpicker form-control\" data-style=\"btn-default\" name=\"province_id\" disabled><option value=\"Select Sub-District\">Select City First</option></select>";
                    $('#province').html(msg);
                }else{
                    var country_id = {country_id:$("#country_id").val()};
                    $('#province_id').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('index.php/home/select_kecamatan')?>",
                            data: country_id,
                            success: function(msg){
                                $('#province').html(msg);
                            }
                    });
                }
        });
            $('body').delegate("#province_id","change", function() {
                var selectValues = $("#province_id").val();
                if (selectValues == 0){
                    var msg = "<select id=\"city_id\" class=\"selectpicker form-control\" data-style=\"btn-default\" name=\"city_id\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Propinsi Dahulu</option></select>";
                    $('#city').html(msg);
                }else{
                    var province_id = {province_id:$("#province_id").val()};
                    $('#city_id').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('index.php/home/select_kelurahan')?>",
                            data: province_id,
                            success: function(msg){
                                $('#city').html(msg);
                            }
                    });
                }
        });
       </script>

    <!--building detail only-->
    <script src="<?php echo base_url();?>assets/ipapa/fancyBox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      $(".officegallery").fancybox({
        prevEffect      : 'none',
        nextEffect      : 'none',
        openEffect      : 'fade' ,   
        padding     : 0,
        margin      : [20, 60, 20, 60] 
        });
      });
    </script> 
    <script src="<?php echo base_url();?>assets/ipapa/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.slimscroll.js"></script>
    <script type="text/javascript">
        $(function(){
          $('#scroll').slimScroll({
              size: '5px',
              height: '600px',
          });

        });
        
    </script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
      
    (function() {
    window.onload = function() {
    var map;
      //Parameter Google maps
      var options = {
        zoom: 15, //level zoom
      //posisi tengah peta
        center: new google.maps.LatLng(-6.2283761,106.8291335),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
    
     // Buat peta di 
      var map = new google.maps.Map(document.getElementById('map'), options);
     // Tambahkan Marker 
       var locations = [
        ['Bellagio Boutique Mall', -6.227664, 106.825497],
        ['Menara Prima', -6.230523, 106.829874],
        ['The East', -6.228432, 106.825304],
        ['Menara Anugrah', -6.231205, 106.828951],
        ['Plaza Mutiara', -6.227629, 106.827805],
        ['Menara Rajawali', -6.226978, 106.826550],
        ['Menara Dea', -6.228642, 106.823481],
        ['Berita Satu Plaza', -6.234516, 106.825912],
        ['Patra Jasa', -6.233705, 106.824035],
        ['Menara Kadin', -6.232276, 106.831856],     
      
      ];
          var infowindow = new google.maps.InfoWindow();

          var marker, i;
           /* kode untuk menampilkan banyak marker */
          for (i = 0; i < locations.length; i++) {  
            marker = new google.maps.Marker({
              position: new google.maps.LatLng(locations[i][1], locations[i][2]),
              map: map,
           icon: '<?php echo base_url();?>/assets/ipapa/images/marker.png'
            });
          
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
              }
            })(marker, i));
          }
        
        };
      })();
    </script>
  <script src="<?php echo base_url();?>assets/ipapa/js/jquery.flexslider.js"></script>
  <script>
        $(window).load(function() {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: true,
                directionNav: false,
                animationLoop: true,
                slideshow: true,
                itemWidth: 114,
                itemMargin: 0,
                asNavFor: '#slider'
            });
       
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel"
            });
            
            $('#property-slider .flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 6000,
                animationSpeed: 1300,
                directionNav: false,
                controlNav: false,
                keyboardNav: true
            });
        });
    </script>
<!-- end building detail only -->

    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.validate.min.js"></script>
    <script type="text/javascript" >
      $(document).ready(function() {
      $.validator.addMethod("email", function(value, element)
      {
      return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
      }, "Please enter a valid email address.");

      $.validator.addMethod("password",function(value,element)
      {
      return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{6,16}$/i.test(value);
      },"Passwords are 6-16 characters");

      // Validate signup form
      $("#register-form").validate({
      rules: {
      identity: "required email",
      password: "required password",
      },
       highlight: function(element) {
      $(element).closest('.control-group').removeClass('success').addClass('error');
      },
      success: function(element) {
      element
      .text('OK!').addClass('valid')
      .closest('.control-group').removeClass('error').addClass('success');
      }
      });
      });
  </script>
    <script type="text/javascript" >
      $(document).ready(function() {
      $.validator.addMethod("email", function(value, element)
      {
      return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
      }, "Please enter a valid email address.");

      $.validator.addMethod("password",function(value,element)
      {
      return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{6,16}$/i.test(value);
      },"Passwords are 6-16 characters");

      // Validate signup form
      $("#login-form").validate({
      rules: {
      identity: "required email",
      password: "required password",
      },
       highlight: function(element) {
      $(element).closest('.control-group').removeClass('success').addClass('error');
      },

      });
      });
  </script>
 <script type="text/javascript">
    (function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#forgot-form").validate({
               //set this to false if you don't what to set focus on the first invalid input
                    focusInvalid: true,
                    //by default validation will run on input keyup and focusout
                    //set this to false to validate on submit only
                    onkeyup: false,
                    onfocusout: false,
                    //by default the error elements is a <label>
                    errorElement: "div",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        error.appendTo("div#errors");
                    },
                rules: {
                    email: {
                        required: true,
                        email: true
                    },

                },
                messages: {
                    email: "<small><font color='red'>*Please enter a valid email address</font></small>",
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
})(jQuery, window, document);
</script>

  
    <!-- search box auto complete -->
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery-ui.js"></script>
      <script>
      var availableTags = [
      <?php foreach ($buildings as $building):?>
        "<?php echo $building->s_building_name;?>",
      <?php endforeach;?>
      ];
      $( "#autocomplete" ).autocomplete({
        source: availableTags
      });

      $( "#menu" ).menu();
      // Hover states on the static widgets
      $( "#dialog-link, #icons li" ).hover(
        function() {
          $( this ).addClass( "ui-state-hover" );
        },
        function() {
          $( this ).removeClass( "ui-state-hover" );
        }
      );
      $(document).ready(function() {
          var panels = $('.vote-results');
          var panelsButton = $('.dropdown-results');
          panels.hide();

          //Click dropdown
          panelsButton.click(function() {
              //get data-for attribute
              var dataFor = $(this).attr('data-for');
              var idFor = $(dataFor);

              //current button
              var currentButton = $(this);
              idFor.slideToggle(400, function() {
                  //Completed slidetoggle
                  if(idFor.is(':visible'))
                  {
                      currentButton.html('Hide Results');
                  }
                  else
                  {
                      currentButton.html('View Results');
                  }
              })
          });
      });

      $(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');

});
        
       </script>

<script src="<?php echo base_url();?>assets/ipapa/js/furniture/grid.js"></script>
    <script>
      $(function() {
        Grid.init();
      });
   

        $('.showfacilities').click(function(){
        $('.contentfacilities').slideToggle('slow');
            $(this).removeClass('showfacilities').addClass('hidefacilities'); 
        });

        $( ".muter" ).click(function() {
            if (  $( this ).css( "transform" ) == 'none' ){
                $(this).css("transform","rotate(180deg)");
            } else {
                $(this).css("transform","" );
            }
        });

</script>
<script src="<?php echo base_url();?>assets/ipapa/js/iCheck/icheck.min.js"></script>
<script type="text/javascript">
//iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });</script>
<!--
<script src="<?php echo base_url();?>assets/ipapa/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $("#price-range").ionRangeSlider({
            min: 0,
            max: 500000,
            from: 100000,
            to: 400000,
            type: 'double',
            step: 10000,
            prefix: "IDR",
            prettify: true,
            hasGrid: false
        });

    });
</script>
-->
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
