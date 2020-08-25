(function($) {
  "use strict"
  var base = window.location.origin+"/clone/commerce"
  $('.main-search').click(function(){
    window.location.href = base+'/shoplist/1?&search='+$('.main-search-input').val();
  });

  $('.to-details').click(function(){
    var ids = $(this).data('tes')
    var urls = base+'/electros/'+ids
    window.open(urls);
  })

  $('.add-to-cart-btn').click(function(){
    // alert($(this).data('itemid'))
    addToCart($(this).data('itemid'))
  })

  $('#cartdropdownlist').on('click', '.delete-cart-list-btn', function(){
    // alert($(this).data('itemid'))
    deleteCartItem($(this).data('itemid'))
  })

  $('#maincartlist').on('change', '.cart-qty', function(){
    var qty = $(this).val()
    var ids = $(this).data('basketid')
    updateMainCartQty(ids, qty)
  })

  $('#maincartlist').on('click', '.picked-change', function(){
    var ids = $(this).data('basketid')
    var status = $(this).data('status')
    updateMainCartPick(ids, status)
  })

  $('#maincartlist').on('click', '.delete-cart-list-btn', function(){
    deleteMainCartItem($(this).data('itemid'))
  })
  //Add to Cart
  function addToCart(ids) {
    var qty = $('#add-to-cart-qty').val()
    $.ajax({
      url: base+'/Basketnew/addToBasket/'+ids,
      type: "POST",
      dataType: "JSON",
      data: {qty: qty},
      success: function(data) {
        if(data.success){
          alert("Added to Cart")
          $('.cartqty').text(data.carts)
          $('#cartdropdownlist').empty()
          $('#cartdropdownlist').append(data.cartList)
          $('[name="subcartlist"]').text(data.subCartList)
        }
        else {
          alert("Failed to add product")
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("add to cart error")
      }
    })
  }

  function deleteCartItem(ids) {
    $.ajax({
      url: base+'/Basketnew/deleteBasketItem/'+ids,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        if(data.success){
          alert("Product successfully Removed from cart")
          $('.cartqty').text(data.carts)
          $('#cartdropdownlist').empty()
          $('#cartdropdownlist').append(data.cartList)
          $('[name="subcartlist"]').text(data.subCartList)
        }
        else {
          alert("Failed to remove product")
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("delete item error")
      }
    })
  }

  //Modify Main Cart
  function updateMainCartQty(ids, qty) {
    $.ajax({
      url: base+'/Basketnew/updateBasketQty/'+ids,
      type: "POST",
      dataType: "JSON",
      data: {qty: qty},
      success: function(data) {
        if(data.success){
          alert("Quantity updated")
          $('.cartqty').text(data.carts)
          $('#cartdropdownlist').empty()
          $('#cartdropdownlist').append(data.cartList)
          $('[name="subcartlist"]').text(data.subCartList)
          $('#maincartlist').empty()
          $('#maincartlist').append(data.cartMainList)
          $('[name="subMainList"]').text(data.subMainList)
        }
        else {
          alert("Failed to change quantity")
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("Update basket quantity error")
      }
    })
  }

  function updateMainCartPick(ids, status) {
    $.ajax({
      url: base+'/Basketnew/updateBasketPick/'+ids,
      type: "POST",
      dataType: "JSON",
      data: {status: status},
      success: function(data) {
        if(data.success){
          alert("Picked updated")
          $('.cartqty').text(data.carts)
          $('#cartdropdownlist').empty()
          $('#cartdropdownlist').append(data.cartList)
          $('[name="subcartlist"]').text(data.subCartList)
          $('#maincartlist').empty()
          $('#maincartlist').append(data.cartMainList)
          $('[name="subMainList"]').text(data.subMainList)
        }
        else {
          alert("Failed to change pick")
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("Update basket pick error")
      }
    })
  }

  function deleteMainCartItem(ids) {
    $.ajax({
      url: base+'/Basketnew/deleteMainBasketItem/'+ids,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        if(data.success){
          alert("Product successfully Removed from cart")
          $('.cartqty').text(data.carts)
          $('#cartdropdownlist').empty()
          $('#cartdropdownlist').append(data.cartList)
          $('[name="subcartlist"]').text(data.subCartList)
          $('#maincartlist').empty()
          $('#maincartlist').append(data.cartMainList)
          $('[name="subMainList"]').text(data.subMainList)
        }
        else {
          alert("Failed to remove product")
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("delete item error")
      }
    })
  }

})(jQuery);
