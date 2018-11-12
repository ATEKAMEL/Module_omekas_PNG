// Kept for compatibility with Omeka < 1.2.
Omeka.PNGImageManageSelectedActions = function() {
    var selectedOptions = $('[value="update-selected"], [value="delete-selected"], #batch-form .batch-inputs .batch-selected');
    if ($('.batch-edit td input[type="checkbox"]:checked').length > 0) {
        selectedOptions.removeAttr('disabled');
    } else {
        selectedOptions.attr('disabled', true);
        $('.batch-actions-select').val('default');
        $('.batch-actions .active').removeClass('active');
        $('.batch-actions .default').addClass('active');
    }
};

(function($, window, document) {
    $(function() {

        var batchSelect = $('#batch-form .batch-actions-select');
        batchSelect.append(
            $('<option class="batch-selected" disabled="disabled"></option>').val('PNGImage-selected').html(Omeka.jsTranslate('Create PNGImage with selected'))
        );
        batchSelect.append(
            $('<option></option>').val('PNGImage-all').html(Omeka.jsTranslate('Create PNGImage with all'))
        );
        var batchActions = $('#batch-form .batch-actions');
        batchActions.append(
            $('<input type="submit" class="PNGImage-selected" formaction="PNGImage">').val(Omeka.jsTranslate('Go'))
        );
        batchActions.append(
            $('<input type="submit" class="PNGImage-all" formaction="PNGImage">').val(Omeka.jsTranslate('Go'))
        );
        var resourceType = window.location.pathname.split('/').pop();
        batchActions.append(
            $('<input type="hidden" name="resource_type">').val(resourceType)
        );

        // Kept for compatibility with Omeka < 1.2.
        $('.select-all').change(function() {
            Omeka.PNGImageManageSelectedActions();
        });
        $('.batch-edit td input[type="checkbox"]').change(function() {
            Omeka.PNGImageManageSelectedActions();
        });

        // For the page admin site navigation.
        $('body.sites.edit #page-actions').prepend(
            $('<a class="button"></a>')
                .prop('href', window.location.pathname.substr(0, window.location.pathname.lastIndexOf('/')) + '/PNGImage')
                .html(Omeka.jsTranslate('Create PNGImage'))
        );
    });
}(window.jQuery, window, document));
