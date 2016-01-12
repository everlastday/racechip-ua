(function ($) {

	$(document).ready(function () {
		jQuery('.select-item ul').perfectScrollbar();
		jQuery(document).on("mouseover",'.select-item ul',function(){$('.select-item ul').perfectScrollbar("update");})
		jQuery('#mark').selectric({onOpen:function(){jQuery('.selectricItems').perfectScrollbar("update");}});
		jQuery('#model').selectric({onOpen:function(){jQuery('.selectricItems').perfectScrollbar("update");}});
		jQuery('#modification').selectric({onOpen:function(){jQuery('.selectricItems').perfectScrollbar("update");}});
		jQuery('.selectricItems').perfectScrollbar();
		jQuery('.selectricItems').scroll(function(){jQuery(this).perfectScrollbar("update");});
		//jQuery(document).on("mouseover",'.select-item ul',function(){$('.select-item ul').perfectScrollbar("update");})


		//jQuery('#mark').selectric({onchange:function(){
		//	id = jQuery(this).val();
		//
		//
		//	//jQuery('.selectricItems').perfectScrollbar("update");
		//}});

		$('#mark').on('change', function () {
			$('#model').prop('disabled', true).empty().append('<option value="0">Выберите модель...</option>').selectric('refresh');
			$('#modification').prop('disabled', true).empty().append('<option value="0">Выберите модификацию...</option>').selectric('refresh');
			val = $(this).val();
			//$selectValue.text($(this).val());
			//alert(id);



			if (val != 0) {


				//$('.select-main-box .butt').prop('disabled', false);

				var data = {
					action: 'rc_get_type',
					brand_id: val
				};


				//if(jQuery('#modelvalue').length > 0 && jQuery('#typevalue').length > 0) {
				//	jQuery('#modelvalue').attr('id', 'modelvalue_pedalbox');
				//	jQuery('#typevalue').attr('id', 'typevalue_pedalbox');
				//}

				$.post(myajax.url, data, function (response) {
					//alert('Got this from the server: ' + response);
					$('#model').empty().append(response).prop('disabled', false).selectric('refresh');
					//$('.selectricItems').perfectScrollbar("update");
					$('#modification').prop('disabled', true).selectric('refresh');
					$('.selectricItems').perfectScrollbar('destroy').perfectScrollbar();

				});

			} else {
				//alert('work');
				$('#model').prop('disabled', true).empty().append('<option value="0">Выберите модель...</option>').selectric('refresh');
				$('#modification').prop('disabled', true).empty().append('<option value="0">Выберите модификацию...</option>').selectric('refresh');
				//$('#model').selectric('refresh');
				//$('#modification').selectric('refresh');
			}



			//$('#mark').attr('disabled', true);
			//$('#mark').selectric('refresh');
		});


		$('#model').on('change', function () {
			$('#modification').prop('disabled', true).empty().append('<option value="0">Выберите модификацию...</option>').selectric('refresh');
			car_brend = $(this).val();
			car_type = $('#mark').val();

			//$selectValue.text($(this).val());
			//alert('val' + $car_brend + 'val2' + car_type);

			if (car_brend != 0) {
				var data = {
					action: 'rc_get_model',
					brand_id: car_brend,
					car_type: car_type
				};


				//if(jQuery('#modelvalue').length > 0 && jQuery('#typevalue').length > 0) {
				//	jQuery('#modelvalue').attr('id', 'modelvalue_pedalbox');
				//	jQuery('#typevalue').attr('id', 'typevalue_pedalbox');
				//}

				$.post(myajax.url, data, function (response) {
					//alert('Got this from the server: ' + response);
					$('#modification').empty().append(response).prop('disabled', false);
					$('.selectricItems').perfectScrollbar("update");
					$('#modification').selectric('refresh');
					$('.selectricItems').perfectScrollbar('destroy').perfectScrollbar();
					//jQuery('#modelvalue_pedalbox, #modelvalue, #typevalue, #typevalue_pedalbox').prop('disabled', true).css('color', '#CCCCCC');
				});

			} else {
				$('#modification').prop('disabled', true).empty().append('<option value="0">Выберите модификацию...</option>').selectric('refresh');
			}
		});


		$('#modification').on('change', function () {
			modification = $(this).val();

			if(modification != 0)
				window.location.href  = modification;
		});



		$("#rc-choice-form").submit(function(e){
			e.preventDefault();
			mark = $('#mark').val();
			type = $('#model').val();

			if(mark !=0 && type !=0) {
				window.location.href = myajax.baseurl + '/chiptuning/' + mark + '/' + type
			} else if(mark !=0) {
				window.location.href = myajax.baseurl + '/chiptuning/' + mark
			} else {
				//alert('notihing defined');
				return false;
			}

		});
		// Показываем меню подбора, слайдер, картинки продуктов
		$(".select-main-box, #produkt-bilder-home, #slider").delay(2000).show();

		// Добавляет прокрутку для панели отзывов на главной
		$(".reviews-menu").perfectScrollbar({
			suppressScrollX:true
		});

	});






}(jQuery));