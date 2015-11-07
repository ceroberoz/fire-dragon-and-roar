<div id="col-map">
    <div id="map"></div>
    <div class="building-map">
      <!--<h1 class="near-building">Total Results: <?php if($this->uri->segment(1) == "search" || $this->uri->segment(1) == "building"  ){
          echo $this->db->count_all('building');
        }else{
          echo $result;
        } ?> Buildings</h1>-->
        <h1 class="near-building">+62 21 300 66 511 &nbsp; &bull; &nbsp;info@ipapa.co.id</h1>
      <div id="scroll">
      <?php foreach($result as $list):?>
      <div class="near-building-box">
        <div class="img-building">
        <a href="<?php echo base_url();?>building/detail/<?php $name = $list->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $list->pk_building_id;?>" ><img class="img-responsive" src="<?php
                    if($list->s_picture){
                      $img_src = 'uploads/building/image/'.$list->s_picture;
                      $width = 350;
                      $height = 263;
                      echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));
                    }else{
                      echo base_url().'/assets/ipapa/images/350x263.png';

                    }
                    ?>" alt="<?php echo $list->s_building_name;?>"></a> 
        </div>

        <div class="info-near-building">
          <div class="info-left">
            <h1 class="building-name">
              <a class="building-name" href="<?php echo base_url();?>building/detail/<?php $name = $list->s_building_name;
                            $lowcaps = strtolower($name);
                            $underscr = str_replace(' ', '-', $lowcaps);
                            echo $underscr;?>-<?php echo $list->pk_building_id;?>"><?php echo $list->s_building_name;?>
              </a>
            </h1>

            <h3 class="building-location"><i class="fa fa-map-marker"></i>  <?php echo $list->s_location;?> </h3>
          </div>
          <div class="info-right">
            <h3 class="building-price"><?php echo $list->e_br_currency;?> <?php echo number_format($list->f_br_typical);?></h3>
          </div>
        </div>

      </div>
      <?php endforeach;?>
    </div>
  </div>

</div>

    <div class="footer-map hidden-md hidden-sm hidden-xs"> 
      <div class="footer-left">
      <a href="<?php echo base_url();?>about">About</a>
      <a href="<?php echo base_url();?>services">Services</a>
      <a href="<?php echo base_url();?>terms">Term of use</a>
      <a href="<?php echo base_url();?>privacy">Privacy police</a>
      <a href="<?php echo base_url();?>sitemap">Sitemap</a>
    </div>
    <div class="footer-right">
      <a href="">&nbsp; </a>
    </div>
    </div>

 
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/fhmm.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.fitvids.js"></script>  
    <script src="<?php echo base_url();?>assets/ipapa/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/fancyBox/jquery.mousewheel-3.0.6.pack.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/application.js"></script>
    <script src="<?php echo base_url();?>assets/ipapa/js/jquery.slimscroll.js"></script>
      <script type="text/javascript">
          $(function(){
            $('#scroll').slimScroll({
                position:'left',
                size: '8px',
                height: 'auto',
                size: '10px',
                //color: '#0e7db3',
                //railOpacity: 0.5,
                wheelStep: 10,
                railVisible: false,
                alwaysVisible: false
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
      zoom: 12, //level zoom
    //posisi tengah peta
      center: new google.maps.LatLng(-6.2143828,106.8432097),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
  
   // Buat peta di 
    var map = new google.maps.Map(document.getElementById('map'), options);
   // Tambahkan Marker 
     var locations = [
    <?php foreach ($result as $building):
      $alamat = json_encode($building->s_location);
      $currency = json_encode($building->e_br_currency);
      $price = json_encode(number_format($building->f_br_typical));
    ?>
    ['<div class="infowindow-onmap"><div class="img-onmap"><img src="<?php if($building->s_picture){
                      $img_src = 'uploads/building/image/'.$building->s_picture;
                      $width = 100;
                      $height = 75;
                      echo base_url('/uploads/building/image/'. thumb($img_src, $width, $height));
                    }else{
                      echo base_url().'/assets/ipapa/images/100x75.png';

                    } ?>" width="100" height="75"></div><div class="detail-onmap"><a href="<?php echo base_url();?>building/detail/<?php $name = $building->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $building->pk_building_id;?>" ><h1 class="building-name-onmap"><?php echo $building->s_building_name;?></h1></a><h3 class="building-location-onmap"><i class="fa fa-map-marker"></i><?php echo str_replace('"',' ',addslashes($alamat));?></h3><div class="price-onmap"><?php echo str_replace('"',' ',addslashes($currency))." ".str_replace('"',' ',addslashes($price)); ?></div><div class="viewdetail-onmap"><a class="link-viewdetail" href="<?php echo base_url();?>building/detail/<?php $name = $building->s_building_name;
                 $lowcaps = strtolower($name);
                 $underscr = str_replace(' ', '-', $lowcaps);
                  echo $underscr;?>-<?php echo $building->pk_building_id;?>">Detail</a></div></div>', <?php echo $building->s_lat;?>, <?php echo $building->s_lng;?>], 
    <?php endforeach;?> 
    ];
        var infowindow = new google.maps.InfoWindow();

        var marker, i;
         /* kode untuk menampilkan banyak marker */
        for (i = 0; i < locations.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
         icon: '<?php echo base_url();?>/assets/ipapa/images/mapc.png'
          });
         /* menambahkan event clik untuk menampikan infowindows dengan isi sesuai dengan marker yang di klik */
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

      </script>

        <script type="text/javascript">
          $("#province_id").change(function(){
          var selectValues = $("#province_id").val();
          if (selectValues == 0){
          var msg = "Kota / Kabupaten :<br><select name=\"city_id\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Kota Dahulu</option></select>";
          $('#city').html(msg);
          }else{
          var province_id = {province_id:$("#province_id").val()};
          $('#city_id').attr("disabled",true);
          $.ajax({
          type: "POST",
          url : "<?php echo site_url('search/select_city')?>",
          data: province_id,
          success: function(msg){
          $('#city').html(msg);
          }
          });
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
                $('input[type="checkbox"].minimal-green, input[type="radio"].minimal-green').iCheck({
                    checkboxClass: 'icheckbox_minimal-green',
                    radioClass: 'iradio_minimal-green'
                });</script>
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
    <script src="<?php echo base_url();?>assets/ipapa/js/furniture/grid.js"></script>
    <script type="text/javascript">
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
       
<script type="text/javascript">
function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
    cbs[i].checked = bx.checked;
   }
 }
}
</script>

</body>
</html>
                         
                        