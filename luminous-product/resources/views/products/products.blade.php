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
          
            {{-- <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <form id="uidLogin">
                            <div class="form-group d-flex">
                              <input type="text" class="form-control mr-3" name="uid" placeholder="Enter UID">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div> --}}

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <form id="searchForm">
                            <div class="form-group">
                              <input type="text" class="form-control mt-3" name="uid" placeholder="UID">
                              <input type="text" class="form-control mt-3" name="ptitle" placeholder="Enter Title">
                              <input type="text" class="form-control mt-3" name="category_id" placeholder="Enter Category ID">
                              <input type="text" class="form-control mt-3" name="brand" placeholder="Enter Brand ID">
                              
                              <div class="form-group">
                                <select name="range_by" id="range_by" class="form-control mt-3">
                                  <option></option>
                                  <option value="ek_price">Ek Price</option>
                                  <option value="vk_price">Vk Price</option>
                                </select>
                                <input type="text" class="form-control mt-3" name="min" placeholder="Min">
                                <input type="text" class="form-control mt-3" name="max" placeholder="Max">
                              </div>
                              
                              <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div>

            <div class="col-md-6">
              <div class="card text-center">
                  <div class="card-body">
                      <div class="form-group d-flex">
                          <select name="filter_by" id="filter_by" class="form-control">
                              <option>Select Trans status</option>
                              <option value="1">Transfared</option>
                              <option value="0">Not Transfared</option>
                            </select>
                      </div>
                  </div>
                </div>
          </div>

            {{-- <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <form id="catForm">
                            <div class="form-group d-flex">
                              <input type="text" class="form-control mr-3" name="category_id" placeholder="Enter Category ID">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div> --}}

        </div>

        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <form>
                            <div class="form-group d-flex">
                              <input type="text" class="form-control mr-3" name="brand" placeholder="Enter Brand ID">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div> --}}

            {{-- <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <form>
                            <div class="form-group d-flex">
                              <select name="range_by" class="form-control">
                                <option value="ek_price">Ek Price</option>
                                <option value="vk_price">Vk Price</option>
                              </select>
                              <input type="text" class="form-control mr-3" name="min" placeholder="Min">
                              <input type="text" class="form-control mr-3" name="max" placeholder="Max">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                    </div>
                  </div>
            </div> --}}

            {{-- <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <form>
                            <div class="form-group d-flex">
                                <select name="filter_by" class="form-control">
                                    <option value="transfer">Select Trans status</option>
                                    <option value="transfer">Transfared</option>
                                    <option value="not_transfer">Not Transfared</option>
                                  </select>
                            </div>
                          </form>
                    </div>
                  </div>
            </div> --}}

        </div>

        <div class="row">
            <table class="table table-bordered mt-3" id="productData">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category ID</th>
                    <th>Brand</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            </table>


            <div id="pagination">
              <button id="prev">Prev</button>
              <button id="next">Next</button>
          </div>
        </div>


    </div>

    <script>
      var page = 1;
        $(document).ready(function(){

          loadData();
    
          $('#prev').on('click', function() {
              page--;
              loadData();
          });
          
          $('#next').on('click', function() {
              page++;
              loadData();
          });

          function loadData(){
            $('#searchForm').on('submit', function(e){
            e.preventDefault();
            var uid = $('input[name=uid]').val();
            var ptitle = $('input[name=ptitle]').val();
            var catid = $('input[name=category_id]').val();
            var brand = $('input[name=brand]').val();
            var range = $('#range_by').find(":selected").val();
            var min = $('input[name=min]').val();
            var max = $('input[name=max]').val();
            console.log(uid+ptitle+catid+brand+range+min+max);
            $.ajax({
              type: 'get',
              url: '/api/productsByUsers/' + uid+'?title='+ptitle +'&category_id='+catid+'&brand='+brand
              +'&range_by='+range+'&min='+min+'&max='+max+'&page='+page,
              success: function(data){
                $.each(data, function(index, value){
                $('#productData').append(
                '<tr><td>' + value.id + '</td><td>'
                  + value.name + '</td><td>' 
                  + value.category_id + '</td><td>' 
                  + value.brand + '</td><td>'
                  + value.ek_price + '</td></tr>'
                );
                });
              }
            });
          });
          }


          $('#filter_by').on('change', function() {
            var uid = 61;
            var filter_by = $(this).val();
          $.ajax({
              url: '/api/productsByUsers/'+uid+'?transferStatus=' + filter_by,
              type: 'GET',
              success: function(data) {
                $.each(data, function(index, value){
                $('#productData').append(
                '<tr><td>' + value.id + '</td><td>'
                  + value.name + '</td><td>' 
                  + value.category_id + '</td><td>' 
                  + value.brand + '</td><td>'
                  + value.ek_price + '</td></tr>'
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
