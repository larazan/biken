<!DOCTYPE html>
<html lang="en">
<?php include 'application/views/layouts/head.php' ?>
<body>
  <div class="col-md-6">
		<div class="header-search">
	    <form>
			  <input class="input" placeholder="Cari disini">
				<button class="search-btn">Cari disini</button>
			</form>
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