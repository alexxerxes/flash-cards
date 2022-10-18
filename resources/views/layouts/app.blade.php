<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        #panel, #flip {
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
        }

        #panel {
            padding: 50px;
            display: none;
        }


        /* code */
        pre {
    background-color: #28323f;
    color: #fff;
	display: block;
    line-height: 1.4;
    padding: 14px;
	border-radius: 4px
	}
/* للعلامات رمادي  */
.pun{color:#f8f9fa;}

/* للكود برتقالي */
.atn{color:#eda912;}

/* للقيم اخضر */
.atv{color:#34a853;}

/*   لتاج ازرق */
.tag{color:#24c1e0}

/* لون وردي  */
.kwd{    color: #f538a0;}

/* ارزق  */
.typ{color: #24c1e0;}

/* لقيم المتغيرات */
.pln{color: #f8f9fa;}

/* */
.lit{color: #4285f4;}

        /* end code */
    </style>


</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">CS Flash Cards</a>

            <ul class="nav navbar-nav navbar-right">

                    <li><a href="/cards">cards</a></li>
                    <li><a href="/tags">tags</a></li>
                    <li><a href="/show">show</a></li>
                    <li><a href="/list_db">list database</a></li>
                    <li><a href="/create_db">create database</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="/logout">log out</a></li>

            </ul>
        </div>
    </nav>



    @yield('content')


</div>
</div>

</div>
{{-- end cointer --}}

<script>

    </script>






    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
    });

    $(document).ready(function () {
    $('#example1').DataTable();
    });

    $(document).ready(function(){
        $(".CardSlideDown").click(function(){
            $("#panel").slideDown("slow");
        });
    });
    </script>

</body>
</html>
