<!DOCTYPE html>
<html>
<head>
    <title>RCP</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
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
   
    
    <style>
        .retour{
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: #3e403f;
            margin-bottom: 30px;
        }
        .retour:hover{
            text-decoration: underline;
            color: #3e403f;
        }
    </style>
    
</head>
<body>
	<img class="wave" src="/img/wave2.png">
	<div class="container">
		<div class="img">
			<img src="/img/CHU.png">
        </div>
        <div style="display: flex; flex-direction: column; justify-content: center;">
            <div class="login-content">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <img src="/img/lock.png">
                    <h2 style="font-size: 30px; text-transform: none;"> La Réinitialisation Du Mot De Passe</h2>
                    <div class="input-div one">
                    <div class="i">
                            
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                            <h5>Email</h5>
                            <input type="email" id="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required   autocomplete="email">
                    </div>
                    </div>
                    
                    <input type="submit" class="btn" value="Envoyer le mot de passe">
                        <a href="{{ route('login') }}" class="retour">
                            <img src="/img/back.png" class="mr-2" style="width: 28px; height: 28px">
                            Retour
                        </a>

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

                        @if (session('status'))
                        <div class="flag note note--success">
                            <div class="flag__image note__icon">
                              <i class="fa fa-check"></i>
                            </div>
                            <div class="flag__body note__text">
                                {{ __('le lien de récupération a été envoyé avec succès') }}
                            </div>
                            <a href="#" class="note__close">
                              <i class="fa fa-times"></i>
                            </a>
                        </div>
                        @endif
                        
                </form>
            </div>
            <div>
                    
            </div>
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
    <script>
        $(document).ready(function() {
        $('body').bootstrapMaterialDesign();
    });
    </script>
</body>
</html>
