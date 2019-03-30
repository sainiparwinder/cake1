<?php $userdata= $this->request->session()->read('Auth.User') ?>  
<div class="users index large-9 medium-8 columns content">
   
   
    <table cellpadding="0" cellspacing="0">
        <thead>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
  

                <td><?= h($user->name) ?></td>
                <td><?= h($user->surname) ?></td>
               

                <td class="actions">
                  
                    <?= $this->Form->control('budy', ['type' => 'hidden', 'value'=>$user->id]); ?>
                    
                    <?= $this->Form->button(__('Add Friend'),['class'=>'btn btn-default','id'=>'add_friend']); ?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
</div>
<script>
    $('document').ready(function(){
        $('#add_friend').click(function(){
            var id=$('#budy').val();
         
      
        addFriend(id);
     
    });
    
        function addFriend(id){
        var data=id;
        $.ajax({
            method:'get',
            url: "<?php echo $this->Url->build(['controller'=>'Friends','action' => 'addFriend']); ?>",
            data: {keyword: data},
            success: function(response){
                $('.wella').html(response);
                console.log(response); 
            }
        });
    };
});
</script>

