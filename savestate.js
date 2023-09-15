function restoreAccordionPanel(storageKey, accordionId) {
    var activeItem = localStorage.getItem(storageKey);
    if (activeItem) {
        //remove default collapse settings
        $(accordionId + " .panel-collapse").removeClass('in');

        //show the account_last visible group
        $("#" + activeItem).addClass("in");
    }
}

function restoreActiveTab(storageKey, tabId) {
    var activeItem = localStorage.getItem(storageKey);
    if (activeItem) {
        $(tabId + ' a[href="' + activeItem + '"]').tab('show');
    }
}

function saveActiveAccordionPanel(storageKey, e) {
    localStorage.setItem(storageKey, e.target.id);
}

function saveActiveTab(storageKey, e) {
    localStorage.setItem(storageKey, $(e.target).attr('href'));
}