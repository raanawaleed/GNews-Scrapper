jQuery(document).ready(function($) {
    $('#scrape-news-button').click(function(e) {
        e.preventDefault();
        // Trigger the API call function.
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'scrape_and_update_news',
            },
            success: function(response) {
                alert(response); // Display a message or handle the response
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error); // Handle AJAX errors
            }
        });
    });
});