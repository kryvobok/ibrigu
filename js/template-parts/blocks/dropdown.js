import $ from 'jquery';

function dropdown() {
    $(document).on('click', '.dropdown--title', function () {
        const dropdown = $(this).closest('.dropdown--item');
        const content = dropdown.find('.dropdown--content');

        if (dropdown.hasClass('dropdown--active')) {
            content.slideUp()
        } else {
            content.slideDown()
        }

        dropdown.toggleClass('dropdown--active');
    })
}

export {dropdown}