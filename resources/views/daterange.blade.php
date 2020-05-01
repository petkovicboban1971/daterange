
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opseg traženog datuma sa pretragom na serverskoj strani</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="/js/dataTablesMin.js"></script>
  <script src="/js/dataTablesBootstrapMin.js"></script>  
  <link rel="stylesheet" href="/css/dataTablesBootstrapMin.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/css/bootstrap-datepicker.css" />
        <script src="/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container">    
    <br />
    <h3 align="center">Opseg traženog datuma sa pretragom na serverskoj strani</h3>
    <br />
    <br />
      <div class="row input-daterange">
        <div class="col-md-3">
          <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Od datuma" readonly />
        </div>
        <div class="col-md-3">
          <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Do datuma" readonly />
        </div>
        <div class="col-md-4">
          <button type="button" name="filter" id="filter" class="btn btn-primary">Pretraži</button>
          <button type="button" name="refresh" id="refresh" class="btn btn-default">Poništi</button>
        </div>
      </div>
    <br />
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="order_table">
        <thead>
          <tr>
            <th>ID narudžbine</th>
            <th>Naziv korisnika</th>
            <th>Artikal</th>
            <th>Vrednost</th>
            <th>Datum</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });

 load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("daterange.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
     data:'order_id',
     name:'order_id'
    },
    {
     data:'order_customer_name',
     name:'order_customer_name'
    },
    {
     data:'order_item',
     name:'order_item'
    },
    {
     data:'order_value',
     name:'order_value'
    },
    {
     data:'order_date',
     name:'order_date'
    }
   ]
  });
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Unesite oba datuma!');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

});
</script>

