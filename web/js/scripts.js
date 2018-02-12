
jQuery(document).ready(function(){
	jQuery(".menu_top .navbar-toggle").on("click", function(){
		if(jQuery(this).hasClass("active"))
		{
			jQuery(this).removeClass("active");
		}
		else
		{
			jQuery(this).addClass("active");
		}
		
	})
});

/* Скрипты для корзины
* ******showCart для вывода модального окна
* ******clearCart для очистки корзины
* *******в ajax с помощью e.preventDefault() отменяем layout для того чтоб при
* рендеринге модального окна шаблон не применялся еще раз на странице
* */
function showCart(cart) {
	$('.modal-body').html(cart);
	$('#cart').modal();
}
	function getCart() {
		$.ajax({
			url: '/cart/show',
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка!');
				showCart(res);
			},
			error: function () {
				alert('Error!');
			}
		});
	}

/*
	modal-body это модальное окно в котором показана корзина, данный ajax запрос удаляет товар
	по нажатие на крестик
 */
$('.modal-body').on('click', '.del-item', function () {
	var id = $(this).data('id');
	$.ajax({
		url: '/cart/del-item',
		data: {id: id},
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка!');
			showCart(res);
		},
		error: function () {
			alert('Error!');
		}
	});
});

/*
	Функция clearCart очищает полность корзину
 */
	function clearCart() {
		$.ajax({
			url: '/cart/clear',
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка!');
				showCart(res);
			},
			error: function () {
				alert('Error!');
			}

		});
	}

/*
 В этом скрипте и следующих двух во вкладке продукта можно в поле указать количество продукции
 которую хотим добавить с помощью id указываем id продукта , count  количество продуктов
 */
	$('.cart').on('click', function (e) {
		e.preventDefault();
		var id = $(this).data('id'),
			count = $('#count').val();
		$.ajax({
			url: '/cart/add',
			data: {id: id, count: count},
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка!');
				showCart(res);
			},
			error: function () {
				alert('Error!');
			}

		});
	})

	$('.minus').click(function () {
		var $input = $(this).parent().find('#count');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.plus').click(function () {
		var $input = $(this).parent().find('#count');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
