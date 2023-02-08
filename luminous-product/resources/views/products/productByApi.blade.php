<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{!! asset('assets/js/jquery-3.3.1.min.js') !!}"></script>
    <link href="{!! asset('assets/bootstrap-4.1.3/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <title>Products</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <form id="uidLogin">
                            <div class="form-group">
                              <input type="text" class="form-control mr-3" name="uid" placeholder="Enter UID">
                              <input type="text" class="form-control mr-3" name="ptitle" placeholder="Enter Title">
                            </div>
                            
                            <div class="form-group">
                              <input type="text" class="form-control mr-3" name="brand" placeholder="Enter Brand ID">
                              <input type="text" class="form-control mr-3" name="category_id" placeholder="Enter Category ID">
                            </div>

                              <div class="form-group">
                                <select name="range_by" class="form-control">
                                  <option value="ek_price">Ek Price</option>
                                  <option value="vk_price">Vk Price</option>
                                </select>
                                <input type="text" class="form-control mr-3" name="min" placeholder="Min">
                                <input type="text" class="form-control mr-3" name="max" placeholder="Max">
                              </div>

                              <div class="form-group">
                                <select name="filter_by" class="form-control">
                                    <option value="transfer">Transfared</option>
                                    <option value="not_transfer">Not Transfared</option>
                                  </select>
                            </div>                              
                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div>

        </div>



        <div class="row">
            <table class="table table-bordered mt-3" id="productData">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category ID</th>
                    <th>Brand</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        </div>


    </div>

    <script>
        $(document).ready(function(){
          $('#uidLogin').on('submit', function(e){
            e.preventDefault();
            var uid = $('input[name=uid]').val();
            $.ajax({
              type: 'get',
              url: '/api/productsByUsers/' + uid,
              success: function(data){
                $.each(data, function(index, value){
                $('#productData').append(
                '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.category_id + '</td><td>' + value.brand + '</td></tr>'
                );
            });
              }
            });
          });


          $('#titleForm').on('submit', function(e){
            e.preventDefault();
            var uid = 61;
            var ptitle = $('input[name=ptitle]').val();
            var catid = $('input[name=category_id]').val();
            $.ajax({
              type: 'get',
              url: '/api/productsByUsers/' + uid+'?title='+ptitle +'&category_id='+catid,
              success: function(data){
                $.each(data, function(index, value){
                $('#productData').append(
                '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.category_id + '</td><td>' + value.brand + '</td></tr>'
                );
            });
              }
            });
          });

          $('#catForm').on('submit', function(e){
            e.preventDefault();
            var uid = 61;
            var catid = $('input[name=category_id]').val();
            $.ajax({
              type: 'get',
              url: '/api/productsByUsers/' + uid+'?category_id='+catid,
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
