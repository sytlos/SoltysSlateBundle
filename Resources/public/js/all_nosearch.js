//= require ./lib/_energize
//= require ./app/_toc
//= require ./app/_lang

$(function() {
    setNavigationIds();
    loadToc($('#toc'), '.toc-link', '.toc-list-h2', 10);
    setCodeClass();
    hljs.initHighlightingOnLoad();
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

    codeBlocks.each(function () {
        var container = $(this).parent('pre');
        container.addClass('highlight');

        var codeBlock = $(this);
        var className = codeBlock.attr('class');
        if (typeof className !== 'undefined' && className.indexOf('language-') !== -1) {
            var languageName = className.replace('language-', '');
            var authorizedLanguages = $('body').data('languages');

            if($.inArray(languageName, authorizedLanguages) !== -1) {
                container.addClass('tab-' + languageName);
                codeBlock.addClass(languageName);
                codeBlock.removeClass(className);
            }
        }
    });
}

function setNavigationIds() {
    $('h1,h2').each(function () {
        var text = $(this).text();
        var slug = convertToSlug(text);

        $(this).attr('id', slug);
    });

    $('.toc-h1,.toc-h2').each(function () {
        var text = $(this).text();
        var slug = convertToSlug(text);

        $(this).attr('href', '#'+slug);
    });
}

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}