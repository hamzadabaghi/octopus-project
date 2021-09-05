<!DOCTYPE html>
<html>
<head>
	<title>RCP</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
        $(".note__close").click(function() {
          $(this).parent()
          .animate({ opacity: 0 }, 250, function() {
            $(this)
            .animate({ marginBottom: 0 }, 250)
            .children()
            .animate({ padding: 0 }, 250)
            .wrapInner("<div />")
            .children()
            .slideUp(250, function() {
              $(this).closest(".note").remove();
            });
          });
        });
        });
    </script>
</head>
<body>
	<img class="wave" src="/img/wave2.png">
	<div class="container">
		<div class="img">
			<img src="/img/CHU.png">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('password.update') }}">
        @csrf
				<img src="/img/lock.png">
				<h2 style="font-size: 30px; text-transform: none;"> La Réinitialisation Du Mot De Passe</h2>
              <input type="hidden" name="token" value="{{ $token }}">
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" id="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  required autocomplete="email">
                        
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      
            	   </div>
            	</div>

              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Confirm Password</h5>
                    <input type="password" id="password-confirm" class="input" name="password_confirmation" autofocus required autocomplete="new-password">
                 </div>
              </div>
            	
             
                <input type="submit" class="btn" value="réinitialiser le mot de passe">
                
                @error('email')
                    <div class="flag note note--error">
                        <div class="flag__image note__icon">
                        <i class="fa fa-times"></i>
                        </div>
                        <div class="flag__body note__text">
                            {{ $message }}
                        </div>
                        <a href="#" class="note__close">
                        <i class="fa fa-times"></i>
                        </a>
                    </div>
                @enderror

                @error('password')
                    <div class="flag note note--error">
                        <div class="flag__image note__icon">
                        <i class="fa fa-times"></i>
                        </div>
                        <div class="flag__body note__text">
                            {{ $message }}
                        </div>
                        <a href="#" class="note__close">
                        <i class="fa fa-times"></i>
                        </a>
                    </div>
                @enderror
            </form>
        </div>
    </div>
    <script type="text/javascript">
        const inputs = document.querySelectorAll(".input");
            function addcl(){
                let parent = this.parentNode.parentNode;
                parent.classList.add("focus");
            }

            function remcl(){
                let parent = this.parentNode.parentNode;
                if(this.value == ""){
                    parent.classList.remove("focus");
                }
            }
            inputs.forEach(input => {
                input.addEventListener("focus", addcl);
                input.addEventListener("blur", remcl);
            });
    </script>
</body>
</html>
