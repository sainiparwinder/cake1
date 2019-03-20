$(document).ready(function(){
    //~ $('#login_id_check').hide();
    //~ $('#login_pass_check').hide(); 
    //~ var loginIdErr = false;
    //~ var loginPassErr=false;      
       //~ $("#email_phone").focusout(function(){
            //~ loginidCheck();
        //~ }); 
        //~ function loginidCheck(){
            //~ var loginidVal=$('#email_phone').val();
            //~ if(loginidVal==''){
                //~ $('#login_id_check').show();
                //~ $('#login_id_check').html("please inter login id");
                //~ $('#login_id_check').focus();
                //~ $('#login_id_check').css("color","red");
                //~ var loginIdErr = true;
                //~ return false;                
            //~ }else{
                //~ $('#login_id_check').hide();
            //~ }
        //~ }
        //~ $('#password').focusout(function(){
            //~ loginPassCheck();
        //~ }); 
        //~ function loginPassCheck(){
            //~ var passVal=$('#password').val();
            //~ if(passVal==''){
               //~ $('#login_pass_check').show();
               //~ $('#login_pass_check').html('please enter password'); 
               //~ $('#login_pass_check').focus(); 
               //~ $('#login_pass_check').css("color","red");
               //~ loginPassErr=true;
               //~ return false;  
            //~ }else{
                //~ $('#login_pass_check').hide();   
            //~ }
        //~ } 
        //~ $('#login ').click(function(){
            //~ loginIdErr = false;
            //~ loginPassErr=false;
            //~ loginidCheck(); 
            //~ loginPassCheck()
            //~ if((loginIdErr==false) && (loginPassErr==false)){
                //~ return true;
            //~ }else{
                //~ return false;
            //~ } 
        //~ }); 
        
        
        $('#loginForm').validate({
			rules:{
				email_phone:{
					required:true,
					email:true,
					maxlength:20
					},
				password:{required:true},
				}
			});
        
}); 
