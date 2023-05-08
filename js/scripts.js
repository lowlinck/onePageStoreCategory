
var category_id = $(this).data("category");
var currentUrl = new URL(window.location.href);
var urlParams = new URLSearchParams(currentUrl.search);
var category_id = urlParams.get("category_id");
var sort = urlParams.get("sort");
$("#" + sort).prop("checked", true);
$.ajax({
  url: "/products/main/get",
  type: "GET",
  success: function (data) {  
    let products = JSON.parse(JSON.stringify(data));    
      products = sortProducts(products, sort);       
    var productList = document.getElementById("r_spisok");
    productList.innerHTML = "";
    products.forEach(function (product) {
      var productHTML =
        '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 col_product" data-product="' + product.product_id +'"  data-category="' +
        product.category_id +
        '">' +
        '<div class="product has_attributes">' +
        '<div class="p_description">' +
        '<a class="p_img_href  not-slider" href="#">' +
        '<img src="http://one.loc/' +
        product.image_path +
        '"  alt="' +
        product.product_name +
        '&quot;"' +
        ' title="Buy ' +
        product.product_name +
        '&quot;" height="150" width="150" class="anim"/>' +
        "</a>" +
        '<div class="new_old_price clearfix">' +
        '<p class="price"><span class="new_price">$' +
        product.price +
        "</span></p>" +
        '<span><button class="btn btn-primary add2cart" data-id="501" data-qty="1">Buy</button></span>' +
        "</div>" +
        '<a href="#" class="model_product">' +
        product.product_name +
        "&quot;</a>" +
        "</div>" +
        "</div>" +
        "</div>";
      productList.innerHTML += productHTML;
    });
    let col_products = document.querySelectorAll(".col_product");
      for (let col_product of col_products) {
        if (category_id > 0) {
          
          if (col_product.dataset.category == category_id) {
            col_product.style.display = "block";
          } else {
            col_product.style.display = "none";
          }
        } else {
          col_product.style.display = "block";
        }
      }
  },
  error: console.log,
});

$(document).on("click", "label.radio", function (e) {
  e.preventDefault();
  let checkbox = $(this).prev('input[type="radio"]').attr("id");
  $(this).siblings("label.radio").removeClass("checked");
  $(this).addClass("checked");
  $('input[type="radio"]').prop("checked", false);
  $("#" + checkbox).prop("checked", true);
  var sortParam = $(this).prev('input[type="radio"]').attr("id");
  var currentUrl = new URL(window.location.href);
  var urlParams = new URLSearchParams(currentUrl.search);  
  urlParams.set("sort", checkbox);  
  var newUrl = currentUrl.pathname + "?" + urlParams.toString();  
  window.history.pushState({ path: newUrl }, "", newUrl);  
  $.ajax({
    url: "/products/main/get",
    type: "GET",
    success: function (data) {     
      let products = JSON.parse(JSON.stringify(data));      
      var productList = document.getElementById("r_spisok");
      productList.innerHTML = "";
      products = sortProducts(products, checkbox);
      products.forEach(function (product) {
        var productHTML =
          '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 col_product" data-product="' + product.product_id +'"  data-category="' +
          product.category_id +
          '">' +
          '<div class="product has_attributes">' +
          '<div class="p_description">' +
          '<a class="p_img_href  not-slider" href="#">' +
          '<img src="http://one.loc/' +
          product.image_path +
         
          '" alt="' +
          product.product_name +
          '&quot;"' +
          ' title="Buy ' +
          product.product_name +
          '&quot;" height="150" width="150" class="anim"/>' +
          "</a>" +
          '<div class="new_old_price clearfix">' +
          '<p class="price"><span class="new_price">$' +
          product.price +
          "</span></p>" +
          '<span><button class="btn btn-primary add2cart"  data-id="501" data-qty="1">Buy</button></span>' +
          "</div>" +
          '<a href="#" class="model_product">' +
          product.product_name +
          "&quot;</a>" +
          "</div>" +
          "</div>" +
          "</div>";
        productList.innerHTML += productHTML;
      });
    
      var category_id = document.querySelectorAll("ul#cat_accordion li a");
      for (var i = 0; i < category_id.length; i++) {
        if (category_id[i].getAttribute("id") === "change") {
          var dataCategory = category_id[i].getAttribute("data-category");
          break;
        }
      }     
      let col_products = document.querySelectorAll(".col_product");
      for (let col_product of col_products) {
        if (dataCategory > 0) {
          
          if (col_product.dataset.category == dataCategory) {
            col_product.style.display = "block";
          } else {
            col_product.style.display = "none";
          }
        } else {
          col_product.style.display = "block";
        }
      }
    },

    error: console.log,
  });
});

$(document).on('click', '.add2cart', function(e) {
  e.preventDefault();
  
  $.ajax({
    url: "/products/main/get",
    type: "GET",
    success: function (data) {
     
      let products = JSON.parse(JSON.stringify(data));
      
      $("#modal-body").empty();
      var productList = document.getElementById("modal-body");
      
  
      products.forEach(function (product) {
              if (product.product_id == 2){
                var productHTML =
                '<div class=" col_product" data-product="' + product.product_id +'"  data-category="' + product.category_id +
                '">' +
                '<img src="http://one.loc/' + product.image_path +
                '" alt="' + product.product_name +'"><div"' + product.product_name +'&quot;" height="150" width="150" class="anim"/>' +
                "</a>" +               
                '<p class="price"><span class="new_price">$' +
                product.price +
                "</span></p>" +                
                '<div">' + product.product_name + "&quot;</div>" + "</div>" +
                "</div>" +
                                "</div>";
              productList.innerHTML += productHTML;              
              }       
      });    
    },
    error: console.log,
  });
  $('#exampleModalCenter').modal('show');
});


$(document).on("click", "ul#cat_accordion li a", function (e) {
  e.preventDefault();
  var category_id = $(this).data("category");
  $("ul#cat_accordion li a").each(function () {
    $(this).removeAttr("id");
  });
  $(this).attr("id", "change");
  var currentUrl = new URL(window.location.href);
  var urlParams = new URLSearchParams(currentUrl.search);
  
  urlParams.set("category_id", category_id);
  
  var newUrl = currentUrl.pathname + "?" + urlParams.toString();
  
  window.history.pushState({ path: newUrl }, "", newUrl);

  $.ajax({
    url: "/products/main",
    type: "GET",
    data: {
      category_id: category_id,
    },
    success: function (data) {
      let col_products = document.querySelectorAll(".col_product");
      let products = JSON.parse(JSON.stringify(data));

      for (let col_product of col_products) {
        if (category_id > 0) {
          if (col_product.dataset.category == category_id) {
            col_product.style.display = "block";
          } else {
            col_product.style.display = "none";
          }
        } else {
          col_product.style.display = "block";
        }
      }
    },
    error: console.log,
  });
});

function sortProducts(products, sortParam) {
  switch (sortParam) {
    case "price":
      products.sort((a, b) => a.price - b.price);
      break;
    case "alphabet":
      products.sort((a, b) => a.product_name.localeCompare(b.product_name));
      break;
    case "date":
      products.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
      break;
    default:
      break;
  }
  return products;
}
