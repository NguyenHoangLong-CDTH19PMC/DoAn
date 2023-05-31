if ($('.sidebar').length) {
    // if ($('.menu-group').length) {
    //     var navlink = $('.menu-group').find('.nav-link.active').first();
    //     if (navlink.length) {
    //         var menugroup = navlink.parents('.menu-group');
    //         menugroup.addClass('menu-open');
    //         menugroup.find('>.nav-link').addClass('active');
    //     }
    // }

    if ($('.nav-sidebar').find('>li.nav-item').not('.menu-group, .d-none').length) {
        var navitem = $('.nav-sidebar').find('>li.nav-item').not('.menu-group, .d-none');
        navitem.each(function (index) {
            var navtreeview = $(this).find('>ul.nav-treeview');
            if (navtreeview.length) {
                var navitemchild = $(this).find('>ul.nav-treeview').find('>li.nav-item');
                var navitemchildnone = $(this).find('>ul.nav-treeview').find('>li.nav-item.d-none');
                if (navitemchild.length) {
                    if (navitemchild.length == navitemchildnone.length) {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    }
                } else if (navitemchild.length == 0 && navitemchildnone.length == 0) {
                    if (!$(this).hasClass('d-none')) {
                        $(this).addClass('d-none');
                    }
                }
            }
        });
    }
}



/* Show notify */
function showNotify(text = 'Notify text', title = 'Thông báo', status = 'success') {
	new Notify({
		status: status, // success, warning, error
		title: title,
		text: text,
		effect: 'fade',
		speed: 400,
		customClass: null,
		customIcon: null,
		showIcon: true,
		showCloseButton: true,
		autoclose: true,
		autotimeout: 3000,
		gap: 10,
		distance: 10,
		type: 3,
		position: 'right top'
	});
}

/* Notify */
function notifyDialog(content = '', title = 'Thông báo', icon = 'fas fa-exclamation-triangle', type = 'blue') {
	$.alert({
		title: title,
		icon: icon, // font awesome
		type: type, // red, green, orange, blue, purple, dark
		content: content, // html, text
		backgroundDismiss: true,
		animationSpeed: 600,
		animation: 'zoom',
		closeAnimation: 'scale',
		typeAnimated: true,
		animateFromElement: false,
		autoClose: 'accept|3000',
		escapeKey: 'accept',
		buttons: {
			accept: {
				text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
				btnClass: 'btn-blue btn-sm bg-gradient-primary'
			}
		}
	});
}

/* Confirm */
function confirmDialog(action, text, value, title = 'Thông báo', icon = 'fas fa-exclamation-triangle', type = 'blue') {
	$.confirm({
		title: title,
		icon: icon, // font awesome
		type: type, // red, green, orange, blue, purple, dark
		content: text, // html, text
		backgroundDismiss: true,
		animationSpeed: 600,
		animation: 'zoom',
		closeAnimation: 'scale',
		typeAnimated: true,
		animateFromElement: false,
		autoClose: 'cancel|3000',
		escapeKey: 'cancel',
		buttons: {
			success: {
				text: '<i class="fas fa-check align-middle mr-2"></i>Đồng ý',
				btnClass: 'btn-blue btn-sm bg-gradient-primary',
				action: function () {
					if (action == 'create-seo') seoCreate();
					if (action == 'push-onesignal') pushOneSignal(value);
					if (action == 'send-email') sendEmail();
					if (action == 'delete-filer') deleteFiler(value);
					if (action == 'delete-all-filer') deleteAllFiler(value);
					if (action == 'delete-item') deleteItem(value);
					if (action == 'delete-all') deleteAll(value);
				}
			},
			cancel: {
				text: '<i class="fas fa-times align-middle mr-2"></i>Hủy',
				btnClass: 'btn-red btn-sm bg-gradient-danger'
			}
		}
	});
}




/* Format price */
if ($('.format-price').length) {
	$('.format-price').priceFormat({
		limit: 13,
		prefix: '',
		centsLimit: 0
	});
}


/* Select 2 */
if ($('.select2').length) {
	$('.select2').select2();
}
