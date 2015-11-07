<div style="min-height:500px; padding-top:25px;" class="col-lg-10 col-md-10 col-sm-12 col-xs-12 clearfix">
<div class="container">
    <hr />
    <div class="row">
       <!--  <div class="col-sm-3 col-md-2">
            <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
            <hr />
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right">42</span> Inbox </a>
                </li>
                <li><a href="">Sent Mail</a></li>
                <li><a href=""><span class="badge pull-right">3</span>Drafts</a></li>
            </ul>
        </div> -->
        <div class="col-sm-9 col-md-12">
            
            <label style="margin-left:15px; margin-right: 10px;">
                  <input type="checkbox" id="check-all"/>
            </label>
            <!-- Action button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Mark as read</a></li>
                    <li><a href="#">Mark as unread</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </div>


              <button type="button" class="btn btn-sm btn-flat" data-toggle="tooltip" title="Refresh">
                   <i class="fa fa-refresh"></i>   </button>
            
    
        

                <div style="padding-top:10px;" class="tab-pane fade in active" id="home">


<!-- loop start -->
<?php foreach ($messages as $message): ;?>
<div class="list-group">
<a href="#" data-toggle="modal" data-target="#baca-pesan" class="list-group-item">
<div class="checkbox">
<label><input type="checkbox"></label>
</div>

<span class="name" style="min-width: 120px;display: inline-block;"><?php echo $message->fk_();?></span>
<span class=""><?php echo $message->s_subject;?></span>
<!-- <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span>  -->
<span class="badge"><?php echo $message->t_sent;?></span> 
<span class="pull-right">
<span class="glyphicon glyphicon-paperclip"> </span>
</span>
</a>

<!-- modal start -->

<div class="modal" id="baca-pesan" tabindex="-1" role="dialog" aria-hidden="true" >
<div class="container-inbox">
<div class="row">
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading">
<i class="fa fa-envelope"></i> Your Messages
<div class="btn-group pull-right">
<a data-dismiss="modal" class="close">X</a>
</div>
</div>
<div class="panel-body">
<ul class="chat">

<li class="right clearfix"><span class="chat-img pull-right">
<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
</span>
<div class="chat-body clearfix">
<div class="header">
<small class=" text-muted"><i class="fa fa-clock-o"></i> 15 mins ago</small>
<strong class="pull-right primary-font">Bhaumik Patel</strong>
</div>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
dolor, quis ullamcorper ligula sodales.
</p>
</div>
</li>

</ul>
</div>
<div class="panel-footer">
<div class="input-group">
<textarea class="form-control" rows="2" placeholder="Type your message here..."></textarea> 
<span class="input-group-btn">
<button class="btn btn-flat btn-primary" id="btn-flat">
Reply</button>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- modal end -->

</div>
<?php endforeach;?>
<!-- loop end -->
                    <div class="box-footer clearfix">
                                    <div class="pull-right">
                                        <small>Showing 1-12/1,240</small>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
                                    </div>
                                </div><!-- box-footer -->
                </div>



        </div>
    </div>
</div>


</div>
			
</section>
