// Strict Mode
var timer;

// Window Load Event
$(window).on("load", function() {

    return false;
});

// Document Ready event
$(document).on("ready", function() {

	$(".lx-hero-item").each(function(){
		$(this).css({"background":"url("+$(this).attr("data-bg")+") no-repeat","background-size":"cover","height":($(this).width()*0.7)+"px"});
	});

	if($(".lx-total-costs strong").length){
		var price = 0;
		$(".lx-cart-products-list .lx-price-total strong").each(function(){
			price += parseFloat($(this).text());
		})
		price += parseFloat($(".lx-shipping-costs b").text());
		$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
		$("input[name='totalprice']").val(price.toFixed(0));	
	}	
	
	return false;
});

$(".lx-mobile-menu a").on("click",function(){
	if($(".lx-main-menu").css("left") !== "0px"){
		$(".lx-main-menu").css("left","0px");
	}
	else{
		$(".lx-main-menu").css("left","102%");
	}
});

$(".lx-product-qty .lx-plus").on("click",function(){
	if($(this).prev("input").val() < parseInt($(this).prev("input").attr("data-max"))){
		$(this).prev("input").val(parseInt($(this).prev("input").val()) + 1);
	}
	if($("#qty").length){
		var cartcookie = "ID:" + $("#idproduct").val() + ";" + $("#qty").val();
		if($(".lx-sizes").length){
			cartcookie += ";Taille:" + $(".lx-sizes a.active").text();
		}
		if($(".lx-colors").length){
			cartcookie += ";Couleur:" + $(".lx-colors a.active").text();
		}
		$("#cartcookie").val(cartcookie);		
	}
	else{
		$(this).parent().parent().parent().find(".lx-price-total strong").text(($(this).attr("data-price") * $(this).prev("input").val()).toFixed(0) +  "DH");
		var price = 0;
		$(".lx-price-total strong").each(function(){
			price += parseFloat($(this).text());
		})
		price += parseFloat($(".lx-shipping-costs b").text());
		$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
		$("input[name='totalprice']").val(price.toFixed(0));
	}
});

$(".lx-product-qty .lx-minus").on("click",function(){
	if($(this).next("input").val() > 1){
		$(this).next("input").val(parseInt($(this).next("input").val()) - 1);
	}
	if($("#qty").length){
		var cartcookie = "ID:" + $("#idproduct").val() + ";" + $("#qty").val();
		if($(".lx-sizes").length){
			cartcookie += ";Taille:" + $(".lx-sizes a.active").text();
		}
		if($(".lx-colors").length){
			cartcookie += ";Couleur:" + $(".lx-colors a.active").text();
		}
		$("#cartcookie").val(cartcookie);
	}
	else{
		$(this).parent().parent().parent().find(".lx-price-total strong").text(($(this).attr("data-price") * $(this).next("input").val()).toFixed(0) +  "DH");
		var price = 0;
		$(".lx-cart-products-list .lx-price-total strong").each(function(){
			price += parseFloat($(this).text());
		})
		price += parseFloat($(".lx-shipping-costs b").text());
		$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
		$("input[name='totalprice']").val(price.toFixed(0));
	}
});

$(".lx-sizes a").on("click",function(){
	$(".lx-sizes a").removeClass("active");
	$(this).addClass("active");
	var cartcookie = "ID:" + $("#idproduct").val() + ";" + $("#qty").val();
	if($(".lx-sizes").length){
		cartcookie += ";Taille:" + $(".lx-sizes a.active").text();
	}
	if($(".lx-colors").length){
		cartcookie += ";Couleur:" + $(".lx-colors a.active").text();
	}
	$("#cartcookie").val(cartcookie);
});

$(".lx-colors a").on("click",function(){
	$(".lx-colors a").removeClass("active");
	$(this).addClass("active");
	var cartcookie = "ID:" + $("#idproduct").val() + ";" + $("#qty").val();
	if($(".lx-sizes").length){
		cartcookie += ";Taille:" + $(".lx-sizes a.active").text();
	}
	if($(".lx-colors").length){
		cartcookie += ";Couleur:" + $(".lx-colors a.active").text();
	}
	$("#cartcookie").val(cartcookie);
});

$(".lx-product-images ul li img").on("click",function(){
	$(".lx-product-main-img img").attr("data-nb",$(this).parent().index());
	$(".lx-product-main-img img").attr("src",$(this).attr("src").replace(/cropped/,"large"));
});


/*$(".lx-add-to-cart").on("click",function(){
	$(".lx-add-to-cart").html('<i class="fas fa-circle-notch fa-spin"></i> Ø§Ù„Ù…Ø±Ø¬Ùˆ Ø§Ù„Ø§Ù†ØªØ¸Ø§Ø±');
	var ajaxurl = $("#websiteurl").val() + "/ajax.php";
	$.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
			cartcookie : $("#cartcookie").val(),
			action : 'savefav'
		},
		success : function(response){
			fbq('track', 'AddToCart');
			window.location.href = $("#websiteurl").val() + "/panier";
			$(".lx-add-to-cart").html('Ø£Ø·Ù„Ø¨ Ø§Ù„Ø¢Ù†');
			$(".lx-order").css("display","flex");
			if($(".lx-header-cart span").length){
				$(".lx-header-cart a span").text(response);
			}
			else{
				$(".lx-header-cart a").append('<span>'+response+'</span>');
			}
			$(".lx-floating-response").remove();
			window.clearTimeout(timer);
			$("body").append('<div class="lx-floating-response"><p class="lx-succes"><i class="material-icons">check</i> ØªÙ…Øª Ø§Ù„Ø¥Ø¶Ø§ÙØ© Ø¥Ù„Ù‰ Ø§Ù„Ø³Ù„Ø©<i class="material-icons">close</i></p></div>');
			$(".lx-floating-response").fadeIn();
			timer = window.setTimeout(function(){
				$(".lx-floating-response").fadeOut();
			},5000);
		}		
	});		
});*/

// Scroll Effect
$(document).scroll(function() {
	if($(".lx-purchase-btns-floating").length){
		if($(this).scrollTop() > ($(".lx-purchase-btns").offset().top + 60)){
			$(".lx-purchase-btns-floating").fadeIn();
		}
		else{
			$(".lx-purchase-btns-floating").fadeOut();
		}				
	}	
	
    return false;
});

$(".lx-continue-shopping").on("click",function(){
	$(".lx-order").css("display","none");
});

/*$(".lx-delete-cookie").on("click",function(){
	var el = $(this);
	var cookie = $(this).attr("data-cookie");
	var ajaxurl = $("#websiteurl").val() + "/ajax.php";
	$.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
			cookie : cookie,
			action : 'deletefav'
		},
		success : function(response){
			el.parent().parent().remove();
			var price = 0;
			$(".lx-cart-products-list .lx-price-total strong").each(function(){
				price += parseFloat($(this).text());
			})
			price += parseFloat($(".lx-shipping-costs b").text());
			$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
			$("input[name='totalprice']").val(price.toFixed(0));
			$(".lx-floating-response").remove();
			window.clearTimeout(timer);
			$("body").append('<div class="lx-floating-response"><p class="lx-succes"><i class="material-icons">error_outline</i> ØªÙ…Øª Ø§Ù„Ø¥Ø²Ø§Ù„Ø© Ù…Ù† Ø§Ù„Ø³Ù„Ø©<i class="material-icons">close</i></p></div>');
			$(".lx-floating-response").fadeIn();
			timer = window.setTimeout(function(){
				$(".lx-floating-response").fadeOut();
			},5000);
		}		
	});	
});*/

$("body").delegate(".lx-floating-response","click",function(){
	$(".lx-floating-response").fadeOut();
});

$(".lx-cart-next-step a").on("click",function(){
	var save = "yes";
	$(".lx-cart-info-address input").removeAttr("style");
	$(".lx-cart-info-address select").removeAttr("style");
	if($("input[name='fullname']").val() === ""){
		$("input[name='fullname']").css("border-color","red");
		save = "no";
	}
	var patt = /^0[0-9]{1}[0-9]{8}$/;
	if(!patt.test($("input[name='phone']").val())){
		$("input[name='phone']").css("border-color","red");
		save = "no";
	}
	if($("select[name='city']").val() === ""){
		$("select[name='city']").css("border-color","red");
		save = "no";
	}
	if($(".lx-product-qty").length == 0){
		save = "noproduct";
	}
	if(save === "yes"){
		var price = ($("#value").val() / 10) / 10;
		fbq('track', 'Purchase', {currency: 'USD', value: price});
		$("#sendcart").submit();
	}
	else if(save === "noproduct"){
		$(".lx-floating-response").remove();
		window.clearTimeout(timer);
		$("body").append('<div class="lx-floating-response"><p class="lx-error"><i class="material-icons">check</i> Ø§Ù„Ø³Ù„Ø© ÙØ§Ø±ØºØ©<i class="material-icons">close</i></p></div>');
		$(".lx-floating-response").fadeIn();
		timer = window.setTimeout(function(){
			$(".lx-floating-response").fadeOut();
		},5000);		
	}
	else{
		$(".lx-floating-response").remove();
		window.clearTimeout(timer);
		$("body").append('<div class="lx-floating-response"><p class="lx-error"><i class="material-icons">error_outline</i> Ø§Ù„Ù…Ø±Ø¬Ùˆ Ù…Ù„Ø£ Ø§Ù„Ø§Ø³ØªÙ…Ø§Ø±Ø© Ø¨Ø§Ù„ÙƒØ§Ù…Ù„<i class="material-icons">close</i></p></div>');
		$(".lx-floating-response").fadeIn();
		timer = window.setTimeout(function(){
			$(".lx-floating-response").fadeOut();
		},5000);		
	}
});

/*$(".lx-applycoupon").on("click",function(){
	if($(".lx-applycoupon").attr("data-activated") !== "yes"){
		var ids = "";
		$(".lx-cart-products-list-img").each(function(){
			ids += "," + $(this).attr("data-id");
		})
		ids = ids.substring(1);
		var coupon = $("input[name='coupon']").val();
		var ajaxurl = $("#websiteurl").val() + "/ajax.php";
		$.ajax({
			url : ajaxurl,
			type : 'post',
			data : {
				coupon : coupon,
				ids : ids,
				action : 'applycoupon'
			},
			success : function(response){
				var pattdh = /DH/;
				var pattper = /%/;
				var price = parseFloat($(".lx-total-costs strong").text());
				if(pattdh.test(response)){
					$(".lx-total-costs strong").text((price - parseFloat(response)).toFixed(0) + "DH");
					$("input[name='totalprice']").val((price - parseFloat(response)).toFixed(0));
					$(".lx-applycoupon").attr("data-activated","yes").html('<i class="material-icons">close</i>');
					$("input[name='coupon']").prop("readonly",true).css("background","#F8F8F8");
				}
				else if(pattper.test(response)){
					$(".lx-total-costs strong").text((price - ((parseFloat(response) * price) / 100)).toFixed(0) + "DH");
					$("input[name='totalprice']").val((price - ((parseFloat(response) * price) / 100)).toFixed(0));
					$(".lx-applycoupon").attr("data-activated","yes").html('<i class="material-icons">close</i>');
					$("input[name='coupon']").prop("readonly",true);
					$("input[name='coupon']").prop("readonly",true).css("background","#F8F8F8");
				}
				else{
					$(".lx-coupon-warning").html('<span style="color:#FF0000;">ÙƒÙˆØ¯ Ø§Ù„ØªØ®ÙÙŠØ¶ ØºÙŠØ± Ù…ÙˆØ¬ÙˆØ¯ Ø£Ùˆ Ù‚Ø¯ Ø§Ù†ØªÙ‡Øª ØµÙ„Ø§Ø­ÙŠØªÙ‡</span>')
				}
			}		
		});	
	}
	else{
		$(".lx-applycoupon").attr("data-activated","no").html('ØªÙØ¹ÙŠÙ„');
		$("input[name='coupon']").prop("readonly",false).css("background","#FFFFFF").val("");	
		var price = 0;
		$(".lx-cart-products-list .lx-price-total strong").each(function(){
			price += parseFloat($(this).text());
		})
		price += parseFloat($(".lx-shipping-costs b").text());
		$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
		$("input[name='totalprice']").val(price.toFixed(0));		
	}
});*/

$('.popup').on("click",function() {
	var NWin = window.open($(this).attr('href'), '', 'scrollbars=1,height=300,width=600');
	if (window.focus){
		NWin.focus();
	}
	return false;
});
/*
function addVisit(category,id){
	var ajaxurl = $("#websiteurl").val() + "/ajax.php";
	$.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
			id : id,
			category : category,
			action : 'addvisit'
		},
		success : function(response){
			
		}		
	});	
}

$(".lx-cart-info-address select[name='city']").on("change",function(){
	if($(".lx-shipping-costs b").text() !== "0DH"){
		if($(this).val() === "Casablanca"){
			$(".lx-shipping-costs b").text("25DH");
		}
		else{
			$(".lx-shipping-costs b").text("45DH");
		}		
	}
	var price = 0;
	$(".lx-cart-products-list .lx-price-total strong").each(function(){
		price += parseFloat($(this).text());
	})
	price += parseFloat($(".lx-shipping-costs b").text());
	$(".lx-total-costs strong").text(price.toFixed(0) + "DH");
	$("input[name='totalprice']").val(price.toFixed(0));
});*/

$(".lx-contact-us > a").on("click",function(){
	if($(".lx-contact-us-content").css("display") !== "block"){
		$(".lx-contact-us-content").css("display","block");
		$(this).find("i").attr("class","fa fa-times");
	}
	else{
		$(".lx-contact-us-content").css("display","none");
		$(this).find("i").attr("class","fa fa-phone");
	}
});

$(".lx-float-numbers").on("keypress",function(event){
	return ((event.charCode >= 44 && event.charCode <= 57) && event.charCode !== 47 && event.charCode !== 45) || event.charCode === 0;
});