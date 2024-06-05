// tabs.js

function initTabs() {
    $('.nav-tabs a').on('click', function(event) {
        var activeTab = $(this).attr('href');
        localStorage.setItem('activeTab', activeTab);
    });

    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    }
}

$(document).ready(function() {
    initTabs();
});


