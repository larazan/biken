<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<body>
  <div class="container">
    <div class="col-md-4">
      <form action="">
        <div class="form-group">
          <label >Asal</label>
          <select name="" id="" class="form-control asal-change">
              <option value="0">Pilih Asal</option>
            <?php foreach ($cities['rajaongkir']['results'] as $dt) { ?>
              <option value="<?= $dt["city_id"]; ?>"><?= $dt["city_name"]; ?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <label >Provinsi</label>
          <select name="" id="" class="form-control province-change">
              <option value="0">Pilih Provinsi</option>
            <?php foreach ($provinces['rajaongkir']['results'] as $dt) { ?>
              <option value="<?= $dt["province_id"]; ?>"><?= $dt["province"]; ?></option>
            <?php }?>
          </select>
        </div>
        <div class="form-group">
          <label >Kota</label>
          <select name="" id="" class="form-control kota-change">
          </select>
        </div>
        <div class="form-group">
          <label >Kurir</label>
          <select name="" id="" class="form-control kurir-change">
            <option value="jne">JNE</option>
            <option value="pos">POS</option>
            <option value="tiki">TIKI</option>
          </select>
        </div>
        <div class="form-group">
          <label>Berat(gram)</label>
          <input type="text" name="berat" id="" class="form-control berat-change">
        </div>
        <div class="form-group">
          <button class="btn btn-primary submit-btn" type="button">Cek Harga</button>
        </div>
      </form>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Hasil</div>
        <div class="panel-body">
          <div class="container">
            <div class="row">
              <div class="txt-hasil"></div>
            </div>
            <div class="row">
              <div class="col-md-8 tbl-hasil">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Layanan</th>
                      <th>ETD</th>
                      <th>Tarif</th>
                    </tr>
                  </thead>
                  <tbody id="tarif-body"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'application/views/layouts/jspack.php' ?>
<script>
  $(function(){
    $('.province-change').change(function(){
      getCity($('.province-change').val());
    });
    $('.submit-btn').click(function(){
      getCost();
    });
  });
  function getCity(ids) {
    $('.kota-change').empty();
    $.ajax({
      type:"GET",
      url:"<?= base_url()?>Homes/getCities/"+ids,
      dataType: "JSON",
      success:function(data){
        console.log(data.list);
        var options = '<option value="">Pilih Kota</option>';
        if(data.list.length > 0) {
          $.each(data.list, function(i, item){
            options += '<option value="'+data.list[i].city_id+'">'+data.list[i].city_name+'</option>'
          });
          $('.kota-change').append(options);
        }
        else {
          $('.kota-change').empty();
          alert('Data tidak ditemukan !!!')
        }
      }
    });
  }
  function getCost() {
    $('#tarif-body').empty();
    var origin = $('.asal-change').val();
    var destination = $('.kota-change').val();
    var weight = $('.berat-change').val();
    var courier = $('.kurir-change').val();
    $.ajax({
      type:"POST",
      url:"<?= base_url()?>Homes/getCost",
      data: {origin: origin, destination: destination, weight: weight, courier: courier},
      dataType: "JSON",
      success:function(data){
        if(data.costList.length > 0) {
          var html = ""
          $.each(data.costList, function(i, item){
            html += '<tr>'
            html += '<td><h4>'+data.costList[i].service+'</h4><span>'+data.costList[i].description+'</span></td>'
            html += '<td>'+data.costList[i].cost[0].etd+' days</td>'
            html += '<td>'+data.costList[i].cost[0].value+'</td></tr>'
          });
          $('#tarif-body').append(html);
        }
        else {
          $('#tarif-body').empty();
          alert('Data tidak ditemukan !!!')
        }
      }
    });
  }
</script>
</body>
</html>
