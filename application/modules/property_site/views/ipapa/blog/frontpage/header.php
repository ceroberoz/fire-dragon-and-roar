<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <!-- <html class="no-js"> <![endif]-->
   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
		<?php
        	if($this->uri->segment(2)=='detail'){
				foreach($title as $pagetitle){echo $pagetitle->title." | ";}
			}elseif($this->uri->segment(2)=='archive'){
				$last_year_month = "";
				foreach($title2 as $arc){
					$arc = get_object_vars($arc);
					  // extract year and month
					  $year_month = substr($arc["t_added"], 0, 7);
					  $date = date("Y-m", strtotime($arc["t_added"]));				
					  // if year and month has changed
					  if($year_month != $last_year_month) {
						 $last_year_month = $year_month;				
						 echo "Archive ".date("F", mktime(0, 0, 0, intval(substr($year_month, 5, 2)) - 0, 1, 1970)) . " " . substr($year_month, 0, -3)." | ";
					  }
				}
			}else{
				echo "";
			}
		?>
        Ipapa Blog
        </title>
        <meta name="description" content="<?php if($posting){foreach($posting as $post){if($post->description){echo strip_tags(substr($post->description,0,200));}}}?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slider/i-slider.css">
        <link href='http://fonts.googleapis.com/css?family=Lato&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

        <script src="<?php echo base_url();?>assets/ipapa/libs/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/ipapa/libs/main.js"></script>

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/ipapa/images/img/ico/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/ipapa/images/img/ico/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/ipapa/images/img/ico/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/ipapa/images/img/ico/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/ipapa/images/img/ico/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/ipapa/images/img/ico/apple-touch-icon-144x144.png"> 
        <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flexslider/flexslider.css" type="text/css">

        
        <script src="<?php echo base_url();?>assets/ipapa/libs/flexslider/jquery.flexslider.js"></script> 
    -->
        
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
		<script type="text/javascript">
            $(function($){
                var addToAll = false;
                var gallery = false;
                var titlePosition = 'inside';
                $(addToAll ? 'img' : 'img.fancybox').each(function(){
                    var $this = $(this);
                    var title = $this.attr('title');
                    var src = $this.attr('data-big') || $this.attr('src');
                    var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
                    $this.wrap(a);
                });
                if (gallery)
                    $('a.fancybox').attr('rel', 'fancyboxgallery');
                $('a.fancybox').fancybox({
                    titlePosition: titlePosition
                });
            });
            $.noConflict();
        </script>
         
        <script>
    	function fbShare(url, title, summary, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[url]=' + url + '&p[title]=' + title + '&p[summary]=' + summary + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
        <script>
    	function twShare(url, text, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.twitter.com/share?s=100&p[url]=' + url + '&p[text]=' + text + '&p[summary]=' + descr + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script> 
        <script>
    	function gogShare(url, text, summary, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://plus.google.com/share?url=' + url + '&p[text]=' + text + '&p[summary]=' + summary + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
        <script>
    	function linkShare(url, title, source, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + url + '&p[title]=' + title + '&p[source]=' + source + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
		</script>
<?php
    function limit_words($content, $words_limit, $end=''){
        $words = explode(' ', $content);
        $limited_words = '';
        if(count($words) >= $words_limit){ // if number of words are greater than limit provided
            for($x=0; $x<$words_limit; $x++){
                if(isset($words[$x]) && $words[$x] != ''){
                    $limited_words .= ($x==($words_limit-1)) ? $words[$x] : $words[$x] . ' ';
                    }
                }
            $limited_words .= ($words_limit != count($words)) ? $end : NULL;
            }
        else{ // if number of words are less than limit provided
            $limited_words = $content;
            }
        return $limited_words;
        }
?>