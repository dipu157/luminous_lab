<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{!! asset('assets/js/jquery-3.3.1.min.js') !!}"></script>
     <!-- Bootstrap CSS-->
     <link href="{!! asset('assets/bootstrap-4.1.3/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
     <!-- Font Awesome CSS-->
     <link href="{!! asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
    <title>Luminous Product</title>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="card mx-auto m-5 d-flex justify-content-center text-center">
                <div class="card-header">
                    <h3>Login With ID</h3>
                </div>

                <div class="card-body">
                    <form method="post" id="uidLogin">
                        <input type="text" class="form-control mb-4" name="uid" placeholder="User ID" />
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
          $('#uidLogin').on('submit', function(e){
            e.preventDefault();
            var uid = $('input[name=uid]').val();
            $.ajax({
              type: 'get',
              url: '/api/authUser/' + uid,
              success: function(data){
                $.each(data, function(index, value){
                $('#productData').append(
                '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.category_id + '</td><td>' + value.brand + '</td></tr>'
                );
            });
              }
            });
          });
        });
      </script>


    <script type="text/javascript" src="{!! asset('assets/bootstrap-4.1.3/js/bootstrap.min.js') !!}"></script>
</body>
</html>
