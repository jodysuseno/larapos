<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- Twitter meta-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:site" content="@pratikborsadiya">
  <meta property="twitter:creator" content="@pratikborsadiya">
  <!-- Open Graph Meta-->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Vali Admin">
  <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
  <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
  <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
  <meta property="og:description"
    content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <title>Larapos - {{ $title }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/css/custom.css')}}">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('valiadmin/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .input_custom {
      border: 0px;
      background-color: transparent;
      border: transparent;
    }

    .input_custom:disabled,
    .input_custom[readonly] {
      /* border: 0px; */
      background-color: transparent;
      /* border: transparent; */
    }

    .tblnum tbody {
      counter-reset: row-num;
    }

    .tblnum tbody tr {
      counter-increment: row-num;
    }

    .tblnum tbody tr td:first-child::before {
      content: counter(row-num);
    }
  </style>
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="index.html">LaraPos</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
            class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  @include('temp.sidebar')
  <main class="app-content">
    @yield('container')
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="{{ asset('valiadmin/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/popper.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('valiadmin/js/main.js')}}"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="{{ asset('valiadmin/js/plugins/pace.min.js')}}"></script>
  <!-- Page specific javascripts-->
  <!-- <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/chart.js')}}"></script> -->
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->

  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
  <script type="text/javascript">$('#sampleTable1').DataTable();</script>
  <script type="text/javascript">$('#sampleTable2').DataTable();</script>
  <script type="text/javascript">$('#sampleTable3').DataTable();</script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/bootstrap-datepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('valiadmin/js/plugins/dropzone.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



  <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
  </script>

  <script type="text/javascript">
    $('#sl').on('click', function () {
      $('#tl').loadingBtn();
      $('#tb').loadingBtn({ text: "Signing In" });
    });

    $('#el').on('click', function () {
      $('#tl').loadingBtnComplete();
      $('#tb').loadingBtnComplete({ html: "Sign In" });
    });

    $('#demoDate').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      todayHighlight: true
    });

    $(document).ready(function() {
      $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var unit_name = $(this).data('unit_name');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#name').val(name);
        $('#unit_name').val(unit_name);
        $('#stock').val(stock);
        $('#exampleModal').modal('hide');
      });
    });

    function totProd(a){
      var qty = $('#qty_crt'+a).val();
      var prc = $('#prc_crt'+a).text();
      var total = parseInt(qty) * parseInt(prc);
      if (isNaN(total)) total = 1 * parseInt(prc);
      if (total == 0) total = 1 * parseInt(prc);
      // console.log(total);
      $('#tot_crt'+a).text(total);
      $('#total_item'+a).val(total);

      // var qty_slc = $('#qty_slc'+a).data('over');
      // var qty = $('#qty_crt'+a).val();
      // // var qty_slc = $('#qty_slc'+a).text();
      // over = parseInt(qty_slc) - parseInt(qty);
      // // $('#qty_crt_over'+a).val(over);
      // $('#qty_slc'+a).text(over);
      // $('#qty_slc'+a).attr('data-over', over);
      // $('#select-trx'+a).attr('data-stock', over);
      // console.log(qty);
      // console.log(qty_slc);

    }
    
    $(document).ready(function() {
      $(document).on('click', '.select-trx', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var product_item = $(this).data('product_item');
        var price = $(this).data('price');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#product_item').val(product_item);
        $('#price').val(price);
        $('#stock').val(stock);
        // var stk = $('#stock').val('stock');
        $('#add_item').removeAttr("disabled");
        $('#qty').removeAttr("disabled");
        $('#qty').attr({ "max" : stock });
        $('#qty').val("1");
        // $('#exampleModal').modal('hide');
      });
    });

    var nextform = 0;
    var items = [];

    function add_item(){
      var stock = $('#stock').val();
      if ($('#qty').val() == "") {
        alert('Quantity cannot be empty!');
      } else {
        var item_id = $('#item_id').val();
        var barcode = $('#barcode').val();
        var product_item = $('#product_item').val();
        var price = $('#price').val();
        var stock = $('#stock').val();
        var qty = $('#qty').val();

        var fin = items.find(e => e == item_id)

        var per_qty = $('#qty_crt'+fin).val();

        $('#qty_crt'+fin).attr({ "max" : qty });

        if(fin == item_id){
          per_qty = parseInt(per_qty) + parseInt(qty);
          prc_qty = $('#prc_crt'+fin).text();
          $('#qty_crt'+fin).val(per_qty);
          var total = parseInt(per_qty) * parseInt(prc_qty);
          $('#tot_crt'+fin).text(total);
        } else {
          nextform++;
          var total = parseInt(price) * parseInt(qty);
          $('#tot_crt'+fin).text(total);
          var markup = "<tr id='row" + item_id + "'>"+
            "<td class='align-middle' ></td>"+
            "<td class='align-middle' align='left'>"+barcode+"</td>"+
            "<td class='align-middle'>"+product_item+"</td>"+
            "<td class='align-middle' align='right'><span id='prc_crt"+item_id+"'>"+price+"</span></td>"+
            "<td class='align-middle' align='right'>"+
            "<input class='qty' name='qty[]' min=1 max='' style='display: block; width: 100%; ' class='d-block' type='number' id='qty_crt"+item_id+"' onchange='totProd("+item_id+");total()' onkeyup='totProd("+item_id+");total()' onkeypress='return event.charCode >= 48 && event.charCode <= 57' value='"+qty+"'>"+
            "<input name='item_id[]' type='hidden' value='"+item_id+"'>"+
            "<input name='price_item[]' type='hidden' id='total_item"+item_id+"' value='"+total+"'>"+
            "</td>"+
            "<td class='align-middle tot_crt' align='right' id='tot_crt"+item_id+"'>"+total+"</td>"+
            "<td class='align-middle'>"+
            "<button align='center' class='btn btn-danger btn-xs' id='" + item_id + "' onclick='total()'><i class='icon fa fa-trash'></i> Delete</button>"+
            "</td>"+
          "</tr>";
          $("#add_row").append(markup);
        }
        $('#qty_crt'+item_id).attr({ "max" : stock });
        items.push(item_id);  
        // cash();
        
        $('#item_id').val('');
        $('#barcode').val('');
        $('#product_item').val('');
        $('#price').val('');
        $('#stock').val('');
        $('#qty').attr({ "max" : 0 });
        $('#qty').val(1);
        $('#add_item').attr({ "disabled" : "disabled" });
        $('#qty').attr({ "disabled" : "disabled" });
        $('#exampleModal').modal('hide');
        $("#add_row").val(nextform);

        var total_all = $('#total_all').val();
        var cash = $('#cash').val();

        change  = cash - total_all;

        $('#change').val(change);
      } 

    }

    function cash(){
      var total_all = $('#total_all').val();
      var cash = $('#cash').val();

      change  = cash - total_all;

      $('#change').val(change);
    }

    $(document).ready(function() {
      $(document).on('keyup', '#cash', function() {
        var total_all = $('#total_all').val();
        var cash = $('#cash').val();

        change  = cash - total_all;

        $('#change').val(change);
      });
      $(document).on('change', '#cash', function() {
        var total_all = $('#total_all').val();
        var cash = $('#cash').val();

        change  = cash - total_all;

        $('#change').val(change);
      });
      $(document).on('change', '.qty', function() {
        var total_all = $('#total_all').val();
        var cash = $('#cash').val();

        change  = cash - total_all;

        $('#change').val(change);
      });
      
      $(document).on('click', '#btn-reset', function() {
        $("#add_row").html("");
        items.splice(0, items.length);
        total();
        $('#cash').val('');
        $('#note').val('');
        $('#change').val('0');
        $('#grand_total').text('0');
      });
      $(document).on('click', '.btn-danger', function () {
        var button_id = $(this).attr("id");
        var amount = $('#tot_crt'+button_id).text();
        var total_all = $('#total_all').val();
        var grand_total = $('#grand_total').text();
        total_all = total_all - amount;
        grand_total = grand_total - amount;
        $('#total_all').val(total_all);
        $('#grand_total').text(grand_total);
        $('#row' + button_id + '').remove();

        items.splice(items.indexOf(button_id), 1);
        console.log(items);

        var total_all = $('#total_all').val();
        var cash = $('#cash').val();

        change  = cash - total_all;

        $('#change').val(change);

      });
    });


    function total() {
      var sum = 0;
      $('#tb_sale > tbody  > tr').each(function () {
        var amount = $(this).find('.tot_crt').text();
        sum += parseInt(amount);
        $(this).find('.amount').text('' + amount);
      });
      $('#total_all').val(sum);
      $('#grand_total').text(sum);
    }

    $(document).ready(function() {
      $(document).on('click', '#detail', function() {
        var barcode = $(this).data('barcode');
        var item_name = $(this).data('item_name');
        var detail_b = $(this).data('detail_b');
        var supplier = $(this).data('supplier');
        var qty = $(this).data('qty');
        var date = $(this).data('date');

        $('#barcode').text(barcode);
        $('#item_name').text(item_name);
        $('#detail_b').text(detail_b);
        $('#supplier').text(supplier);
        $('#qty').text(qty);
        $('#date').text(date);
      });
    });
    

    $('#demoSelect1').select2();
    $('#demoSelect2').select2();
  </script>
  <!-- Google analytics script-->
  <script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
          m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>

  
</body>

</html>