<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php $userdata= $this->request->session()->read('Auth.User') ?>  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
        <li><?= $this->Form->control('search', ['class'=>'form-control']); ?></li>
        <li><?= $this->Form->button(__('search'),['class'=>'btn btn-success','id'=>'searchbtn']) ?></li>
        <li><?= $this->Form->button(__('friend'),['class'=>'btn btn-success','id'=>'frbtn']) ?></li>
        <li></li>
        <li><?= $this->Form->create(null, ['url' => ['action' => 'profilePhoto'],'type' => 'file']); ?><?= $this->Form->control('file', ['type'=>'file','class'=>'form-control']); ?><?= $this->Form->button(__('Submit')); ?><?= $this->Form->end() ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?= $this->Html->link(__('Log out'), ['controller' => 'Users','action' => 'logout']) ?></li>
        <li><?= $this->Html->link(__($userdata['name']), ['controller' => 'Users','action' => 'edit', $userdata['id']]) ?></li>
      </ul>

    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src='<?= $url.$imgName  ?>' class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="well">
        <p><a href="#">Interests</a></p>
        <p>
          <span class="label label-default">News</span>
          <span class="label label-primary">W3Schools</span>
          <span class="label label-success">Labels</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Ey!</strong></p>
        People are looking at your profile. Find out who.
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">Status: Feeling Blue</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>     
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>John</p>
           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Bo</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Jane</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Anja</p>
           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>     
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>Paris</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="wellaa">
        
      </div>
      <div class="wella">
        
      </div>
      <div class="frindlist">
        
      </div>      
    </div>
  </div>
</div>
<script>
$('document').ready(function(e){
  $('#searchbtn').click(function(){
    var search=$('#search').val();
    if(search!=''){
      searchFriend(search);
    }
    $('.wellaa').on('click','.add-as-friend', function () {
      addFriend($(this).attr('id'));
    });
    $('.wellaa').on('click','.accept-request', function () {
      updateRequest($(this).attr('id'),"accept");
    });
    $('.wellaa').on('click','.delete-request', function () {
    updateRequest($(this).attr('id'),"delete");
    });
  });
  function searchFriend(search){
    var data=search;
    $.ajax({
      method:'get',
      url: "<?php echo $this->Url->build(['controller'=>'Users','action' => 'searchFriend',]); ?>",
      data: {keyword:data},
      dataType:"JSON",
      success: function(response){
        console.log(response);
        var addFriendTemplate = '<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><img src="<?= $url."{img}"?>" alt="Avatar" style="width:60%"> </div></div> <button class="btn btn-success btn-sm add-as-friend" id="{id}"> <i class="fa fa-plus"></i> Add {name} as Friend</button><br /><br />';
        var acceptTemplate = '<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url."{img}"?>" alt="Avatar" style="width:80%"><h5>John Doe</h5> <button class="w3-button w3-green accept-request" id="{id}">Accept</button> <button class="w3-button w3-red delete-request" id="{delete}">Delete</button></div></div> ';
        var unfriendTemplate='<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url."{img}"?>" alt="Avatar" style="width:60%"> <button class="w3-button w3-red delete-request" id="{delete}">Unfriend</button></div></div> ';
        var cencelTemplate='<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url."{img}"?>" alt="Avatar" style="width:60%"> <button class="w3-button w3-red delete-request" id="{delete}">Cencel Request</button></div></div> ';
        var userTemplate='<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url."{img}"?>" alt="Avatar" style="width:60%"> </div></div> ';
        if(response.suggestions.length > 0){
          $.each(response.suggestions, function (index, list) {
            var x = true;
            if(list.id==<?= $userdata['id'] ?>){
              var btn = userTemplate.replace("{name}", list.name);
              btn = btn.replace("{id}", list.id);
              btn = btn.replace("{delete}", list.id);
               bbtn = btn.replace("{img}", list.profile_image);
              $('.wellaa').append(btn);
              x= false;
            }else{ 
              if(response.suggestions1.length > 0){
                $.each(response.suggestions1, function (index, list1) {
                  console.log(response);
                  if(list1.user_id == list.id ||list1.budy_id == list.id){
                    if(list1.status=="accept"){
                    var   btn3 = unfriendTemplate.replace("{name}", list.name);
                    btn3 = btn3.replace("{id}", list1.id);
                    btn3 = btn3.replace("{delete}", list1.id);
                    btn3 = btn3.replace("{img}", list.profile_image);
                    $('.wellaa').append(btn3);
                    x= false;
                  }
                }
                if(list1.user_id==list.id){
                  if(list1.status!="accept"){
                    var   btn1 = acceptTemplate.replace("{name}", list.name);
                    btn1 = btn1.replace("{id}", list1.id);
                    btn1 = btn1.replace("{delete}", list1.id);
                     btn1 = btn1.replace("{img}", list.profile_image);
                    $('.wellaa').append(btn1);
                    x= false;
                  }
                }
                if(list1.budy_id==list.id){
                  if(list1.status!="accept"){
                    var   btn2 = cencelTemplate.replace("{name}", list.name);
                    btn2 = btn2.replace("{id}", list1.id);
                    btn2 = btn2.replace("{delete}", list1.id);
                     btn2 = btn2.replace("{img}", list.profile_image);
                    $('.wellaa').append(btn2);
                    x= false;
                  }
                }
              })
              };
            }
            if(x){
              var btn4 = addFriendTemplate.replace("{name}", list.name);
              btn4 = btn4.replace("{id}", list.id);
              btn4 = btn4.replace("{delete}", list.id);
              btn4 = btn4.replace("{img}", list.profile_image);
              $('.wellaa').append(btn4);
            }
          });
        }
      }
    });
  };
  function addFriend(id) {
    var data = id;
    $.ajax({
      method: 'get',
      url: "<?php echo $this->Url->build(['controller' => 'Friends', 'action' => 'addFriend']); ?>",
      data: {keyword: data},
      success: function (response) {
        $('.wella').html(response);
        console.log(response);
      }
    });
  };
  function request(){
    var data= "ram";
        $.ajax({
          method:'get',
          url: "<?php echo $this->Url->build(['controller'=>'Friends','action' => 'friendRequest',]); ?>",
          data: {keyword:data},
          dataType:"JSON",
          success: function(response){
            var acceptTemplate = '<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url.$imgName  ?>" alt="Avatar" style="width:80%"><h5>John Doe</h5> <button class="w3-button w3-green accept-request" id="{id}">Accept</button> <button class="w3-button w3-red delete-request" id="{delete}">Delete</button></div></div> ';
            var unfriendTemplate='<div class="w3-card-4 w3-dark-grey"><div class="w3-container w3-center"><h3>{name}</h3><img src="<?= $url."{img}"?>" alt="Avatar" style="width:60%"> <button class="w3-button w3-red delete-request" id="{delete}">Unfriend</button></div></div> ';
            if(response.req.length > 0){
              $.each(response.req, function (index, fr) {
                if(fr.user_id==<?= $userdata['id'] ?>){
                  if(fr.status=="accept"){
                    var   btn3 = unfriendTemplate.replace("{name}", fr.budy.name);
                    btn3 = btn3.replace("{id}", fr.id);
                    btn3 = btn3.replace("{delete}", fr.id);
                    btn3 = btn3.replace("{img}", fr.budy.profile_image);
                    $('.frindlist').append(btn3);
                  }
                }
                else{ console.log(response);
                  var   btn3 = unfriendTemplate.replace("{name}", fr.user.name);
                  btn3 = btn3.replace("{id}", fr.id);
                  btn3 = btn3.replace("{delete}", fr.id);
                  btn3 = btn3.replace("{img}", fr.user.profile_image);
                  $('.frindlist').append(btn3);
                }
              });
            }
          }
        });
      };
      $('#frbtn').click(function(){
        request();
        $('.wellaa').on('click','.accept-request', function () {
          updateRequest($(this).attr('id'),"accept");
        });
        $('.wellaa').on('click','.delete-request', function () {
          updateRequest($(this).attr('id'),"delete");
        });
      });
      function updateRequest(id,x) {
        var id = id;
        var status=x;
        $.ajax({
          method: 'get',
          url: "<?php echo $this->Url->build(['controller' => 'Friends', 'action' => 'updateRequest']); ?>",
          data: {id: id,status:status},
          success: function (response) {
            console.log(response);
          }
        });
      };
    });
</script>

 
