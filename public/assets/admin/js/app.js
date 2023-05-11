if ($('.sidebar').length) {
    if ($('.menu-group').length) {
        var navlink = $('.menu-group').find('.nav-link.active').first();
        if (navlink.length) {
            var menugroup = navlink.parents('.menu-group');
            menugroup.addClass('menu-open');
            menugroup.find('>.nav-link').addClass('active');
        }
    }

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