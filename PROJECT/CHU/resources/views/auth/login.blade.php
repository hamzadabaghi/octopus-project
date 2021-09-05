<!DOCTYPE html>
<html>
<head>
	<title>RCP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<img class="wave" src="img/wave2.png">
	<div class="container">
		<div class="img">
			<img src="img/CHU.png">
		</div>
		<div class="login-content">
			<form method="POST" action="{{ route('login') }}">
        @csrf
				<img src="img/medecin.png">
				<h2 class="title">Bienvenue</h2>
           		<div class="input-div one">
           		   <div class="i">
                    <i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" id="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email">

           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mot de Passe</h5>
           		    	<input type="password" id="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            	   </div>
            	</div>

              @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">
                      {{ __('Mot de Passe oublié ?') }}
                  </a>
              @endif
              <div style="margin-top: 5px;">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('se souvenir de moi') }}
                </label>
              </div>
                <input type="submit" class="btn" value="Se connecter">

                @error('email')
                    <div class="flag note note--error">
                        <div class="flag__image note__icon">
                        <i class="fa fa-times"></i>
                        </div>
                        <div class="flag__body note__text">
                            {{ __('Email ou Mot De Passe Incorrect !!') }}
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
                            {{ __('Email ou Mot De Passe Incorrect !!') }}
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
