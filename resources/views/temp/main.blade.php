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
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
          <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
          <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </header>
  @include('temp.sidebar')
  <main class="app-content">
    
    @yield('container')
    {{-- <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>Pegawai</h4>
            <p><b>5</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-list fa-3x"></i>
          <div class="info">
            <h4>Kategori</h4>
            <p><b>25</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
          <div class="info">
            <h4>Barang</h4>
            <p><b>10</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-exchange fa-3x"></i>
          <div class="info">
            <h4>Transaksi</h4>
            <p><b>500</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <a href="" class="btn btn-primary"><i class="icon fa fa-plus"></i> Tambah</a><br><br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Pegawai</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Pangkat</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>PG0000001</td>
                    <td>jafar</td>
                    <td>manager</td>
                    <td>?</td>
                    <td>
                      <a href="" class="btn btn-warning"><i class="icon fa fa-edit"></i> Edit</a>
                      <a href="" class="btn btn-danger"><i class="icon fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="">
          <div class="tile">
            <h3 class="tile-title">Tambah / Edit Pegawai</h3>
            <div class="tile-body">
              <div class="form-group">
                <label class="control-label">Nama</label>
                <input class="form-control" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email">
              </div>
              <div class="form-group">
                <label class="control-label">Jabatan</label>
                <input class="form-control" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Address</label>
                <textarea class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Level</label>
                <select class="form-control" id="demoSelect" multiple="">
                  <optgroup label="Select Cities">
                    <option>admin</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>user</option>
                    <option>admin</option>
                    <option>user</option>
                  </optgroup>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Tanggal</label>
                <input class="form-control" id="demoDate" type="text" placeholder="Select Date">
              </div>
              <div class="form-group">
                <label class="control-label">Jenis Kelamin</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" checked>Laki laki
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender">Perempuan
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">File Foto</label>
                <input class="form-control" type="file">
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="button"><i
                  class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <form method="post" action="">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="tile-title">Transaksi Pemasukkan</h3>
                  <div class="tile-body">
                    <div class="form-group">
                      <label class="control-label">Kode Transaksi</label>
                      <input class="form-control input_custom" type="text" readonly value="KT00000001">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Tanggal</label>
                      <input class="form-control input_custom" type="text" id="date_trx" readonly>
                    </div>
                  </div>

                </div>
                <div class="col-lg-6">
                  <h3 class="tile-title">Pegawai</h3>
                  <div class="tile-body">
                    <div class="form-group">
                      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pegawai</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive">
                                <table class="table table-hover table-bordered tblnum" id="sampleTable2">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kode Pegawai</th>
                                      <th>Id Pegawai</th>
                                      <th>Nama</th>
                                      <th>Jabatan</th>
                                      <th>Option</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td></td>
                                      <td>KP0000001</td>
                                      <td>ID2018073</td>
                                      <td>Jody</td>
                                      <td>Inventory Manager</td>
                                      <td>
                                        <button id="btn-tambah-form_KP0000001"
                                          onclick="funcPilihPeg('KP0000001','Jody')" data-dismiss="modal"
                                          class="btn btn-primary">Pilih</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td>KP0000002</td>
                                      <td>ID2018074</td>
                                      <td>Aliyah</td>
                                      <td>Inventory Employe</td>
                                      <td>
                                        <button onclick="funcPilihPeg('KP0000002','Aliyah')" data-dismiss="modal"
                                          class="btn btn-primary">Pilih</button>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <label class="control-label">Kode Pegawai</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="kd_pg" placeholder="Kode" readonly>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-toggle="modal"
                            data-target="#exampleModal1">Pilih
                            Pegawai</button>
                        </div>
                      </div>

                    </div>
                    <div class="form-group">
                      <label class="control-label">Nama</label>
                      <input class="form-control  input_custom" id="nm_pg" type="text" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Pilih Barang
              </button>
              <br><br>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Barang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <!-- <div class="form-group">
                          <label class="control-label" id="itemCode">Kode Barang : </label><br>
                          <label class="control-label" id="itemName">Nama Barang : </label><br>
                          <label class="control-label" id="itemPrice">Harga Barang : </label><br>
                          <label class="control-label" id="itemStock">Stok : </label><br>
                          <label class="control-label" >Jumlah : </label>
                          <input class="form-control" id="quantity" type="number" value="1">
                        </div> -->
                        <!-- <div class="form-group">
                          <label class="control-label" id="remainingStock">Sisa stok : </label>
                        </div> -->
                        <table class="table table-hover table-bordered tblnum" id="sampleTable3 ">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Stok</th>
                              <th>Harga</th>
                              <th>Option</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td>KB0000001</td>
                              <td>barang A</td>
                              <td>10</td>
                              <td>10000</td>
                              <td>
                                <a id="btn-tambah-form_KB0000001"
                                  onclick="selectItem('KB0000001', 'barang A', '10', '10000')"
                                  class="btn btn-primary btn-sm ">Pilih</a>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>KB0000002</td>
                              <td>barang B</td>
                              <td>15</td>
                              <td>15000</td>
                              <td>
                                <a id="btn-tambah-form_KB0000002"
                                  onclick="selectItem('KB0000002', 'barang A', '15', '15000')"
                                  class="btn btn-primary btn-sm">Pilih</a>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>KB0000003</td>
                              <td>barang C</td>
                              <td>20</td>
                              <td>20000</td>
                              <td>
                                <a id="btn-tambah-form_KB0000003"
                                  onclick="selectItem('KB0000003', 'barang A', '20', '20000')"
                                  class="btn btn-primary btn-sm">Pilih</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover table-bordered tblnum" id="total">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Stok</th>
                      <th>Jumlah Transaksi</th>
                      <th>Sisa Stok</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody id="insert-form">
                    <!-- <tr>
                    <td>1</td>
                    <td><input class="form-control" type="text" name="" id="" value="KB0000001" readonly></td>
                    <td><input class="form-control" type="text" name="" id="" value="10" readonly></td>
                    <td><input class="form-control" type="text" name="" id="" value="3"></td>
                    <td><input class="form-control" type="text" name="" id="" value="13" readonly></td>
                    <td>barang A</td>
                    <td>
                      <a href="" class="btn btn-danger"><i class="icon fa fa-trash"></i></a>
                    </td>
                  </tr> -->
                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="5">Total </td>
                      <td><input class="form-control" type="text" name="total" id="valtotal"></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <input type="hidden" id="jumlah-form" value="1">
              </div>

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Proses Checkout</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> --}}
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