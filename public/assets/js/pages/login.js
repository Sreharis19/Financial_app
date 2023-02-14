        $(".preloader ").fadeOut();
				
        $("#admin_login_btn").click(function() { 
            alert("reached");

            $("form[name='login_form']").validate({    
              rules:{
                'email': {
                  required: true,
                  email:true
                },
                'pwd': {
                  required: true
                }
              },
              messages:{
                'email':{
                  required: "<span style='color:red;'>Email is required!</span>",
                  email: "<span style='color:red;'>Enter valid email id</span>"
                },
                'pwd':{
                  required: "<span style='color:red;'>Password is required!</span>",
                }
              },
              submitHandler:function(form){
                $email = $("#email").val();
                $password = $("#pwd").val();


                $("#loading").css("display", "block");
                $("#admin_login_btn").css("display","none");

                $("#admin_login_btn").attr("disabled",true);
                $.ajax({
                    'url':'http://localhost/Financial_app/public/signInProcess',
                    'type':'POST',
                    'data':{'user_type': $type, 'email': $email, 'password': $password},
                    success:function(result) {
					
						console.log(result);						
                        $result = JSON.parse(result);
                        
                        if($result.status == true) {
						
                            $("#alertmessage").html('<div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="alertmessage">' + $result.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                            setTimeout(function(){
                                window.location.href = "{{ url }}/dashboard";
                            },50); 
                        }
                        else{
                             $("#alertmessage").html('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="alertmessage">' + $result.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                            setTimeout(function(){
                                $("#alertmessage").html("");
                            },1000);
                            $("#admin_login_btn").attr("disabled",false);
                            $("#loading").css("display","none");
                            $("#admin_login_btn").css("display","block");
                        }
                    }
                });
              }
          });
        });