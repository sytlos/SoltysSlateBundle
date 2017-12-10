//= require ./lib/_energize
//= require ./app/_toc
//= require ./app/_lang

$(function() {
    loadToc($('#toc'), '.toc-link', '.toc-list-h2', 10);
    setCodeClass();
    setupLanguages($('body').data('languages'));
    $('.content').imagesLoaded( function() {
        window.recacheHeights();
        window.refreshToc();
    });
});

window.onpopstate = function() {
    activateLanguage(getLanguageFromQueryString());
};

function setCodeClass() {
    var codeBlocks = $('code');
    var containers = codeBlocks.parent('pre');

    containers.each(function () {
        $(this).addClass('highlight');

        var languageName = $(this).find('code').attr('class');
        var authorizedLanguages = $('body').data('languages');

        if($.inArray(languageName, authorizedLanguages) !== -1) {
            $(this).addClass(languageName);
            $(this).addClass('tab-' + languageName);
            $(this).find('code').removeClass(languageName);
        }
    });
}