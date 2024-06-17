jQuery(document).ready(function($) {
    // Handle the custom bulk action
    $('#doaction, #doaction2').click(function(e) {
        var selectedBulkAction = $(this).siblings('select[name="action"]').val();
        if (selectedBulkAction == 'remove_[TAXONOMY]') {
            // Confirm before proceeding with removal of all terms
            if (!confirm('Are you sure you want to remove all [Custom Taxonomy] terms from the selected posts?')) {
                e.preventDefault();
            }
        }
    });
});
