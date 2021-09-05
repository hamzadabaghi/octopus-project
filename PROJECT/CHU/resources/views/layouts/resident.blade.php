<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>OCTOPUS</title>
  <!-- Bootstrap CSS CDN -->
  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
  crossorigin="anonymous"
/>
<!-- Our Custom CSS -->
<link rel="stylesheet" href="/css/dashboard.css" />

<!-- Font Awesome JS -->
<script
  defer
  src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
  integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
  crossorigin="anonymous"
></script>
<script
  defer
  src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
  integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
  crossorigin="anonymous"
></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"
></script>
<!-- Popper.JS -->
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
crossorigin="anonymous"
></script>
<!-- Bootstrap JS -->
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
crossorigin="anonymous"
></script>
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
    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
        <div class="sidebar-header">

            <h3 style="text-align: center;">
                <i
                class="fas fa-user-md"
                style="width: 40px; height: 40px;"
                ></i><br>
                <small style="font-size: 18px;">"resident"</small>
            </h3>
            <strong>
                <i
                    class="fas fa-user-md"
                    style="width: 40px; height: 40px;"
                ></i>
            </strong>
        </div>
        <ul class="list-unstyled components">
            <li @yield('accueil')>
                <a href="{{ Route('accueilR') }}">
                    <i
                        style="margin-right:5px;"
                        class="fas fa fa-home"
                    ></i>
                    Accueil
                </a>
            </li>

            <li @yield('patients')>
                <a href="{{ Route('patientsR') }}">
                    <i
                        style="margin-right:5px;"
                        class="fas fa-address-book"
                    ></i>
                    Liste des Patients
                </a>
            </li>

            <li @yield('report')>
                <a href="{{ Route('reportR') }}">
                    <svg
                        class="bi bi-cone-striped"
                        style="margin-right:3px;"
                        width="1em"
                        height="1em"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.879 11.015a.5.5 0 01.242 0l6 1.5a.5.5 0 01.037.96l-6 2a.499.499 0 01-.316 0l-6-2a.5.5 0 01.037-.96l6-1.5z"
                            clip-rule="evenodd"
                        />
                        <path
                            d="M11.885 12.538l-.72-2.877C10.303 9.873 9.201 10 8 10s-2.303-.127-3.165-.339l-.72 2.877c-.073.292-.002.6.256.756C4.86 13.589 5.916 14 8 14s3.14-.411 3.63-.706c.257-.155.328-.464.255-.756zM9.97 4.88l.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.159-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098z"
                        />
                    </svg>
                    Reclamation
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i
                        style="margin-right:2px;"
                        class="fas fa-sign-out-alt"
                    ></i>
                    Se deconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <br /><br /><br /><br /><br />
        </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button
                        type="button"
                        id="sidebarCollapse"
                        class="btn btn-info"
                        style="background-color: #2e7ad1; border: none;"
                    >
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" style="margin-bottom:15px;"></div>
                            <div class="col-md-4">

                            <h5 class="py-3 font-weight-bold"><span class="date-text"></span> | <span class="badge badge-info p-2" id="ct"></span>
                              </h5></div>
                        </div>
                    </div>
                    <img src="/img/CHU.png" style="width: 120px;" />
                </div>
            </nav>
            <!--content pages -->







            @yield('content')













            <!--end content pages -->

            <!--button top-->
            <button
                id="myBtn"
                title="Go to top"
                class="bbt">Top</button>


        <script>
            //Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction();
            };

            function scrollFunction() {
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            $(document).ready(function(){

                $('#myBtn').click(function(){
                    $('html, body').animate({scrollTop: 0}, 300);
                    return false;
                });

            });

        </script>


          <!-- end -->





    </div>
    </div>



    <script type="text/javascript">
      $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
          $("#sidebar").toggleClass("active");
          $("#imggg").toggleClass("active");
        });
      });
    </script>
</body>
</html>

<!--pour la date -->
<script>
    function display_c() {
      var refresh = 1000; // Refresh rate in milli seconds
      mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
      var timex = new Date();
      var time = timex.getHours() + ":" + timex.getMinutes() + ":" + timex.getSeconds();
      document.getElementById('ct').innerHTML = time;
      display_c();
    }


    var today = new Date();
    var month = new Array();
    month[0] = "Janvier"; month[1] = "Février"; month[2] = "Mars"; month[3] = "Avril"; month[4] = "Mai"; month[5] = "Juin";
    month[6] = "Juillet"; month[7] = "Août"; month[8] = "Septembre"; month[9] = "Octobre"; month[10] = "Novembre "; month[11] = "Décembre";
    var date = today.getDate() + ' ' + (month[today.getMonth()]) + ' , ' + today.getFullYear();
    jQuery(document).ready(function () { display_ct(); jQuery(".date-text").text(date); });
</script>
