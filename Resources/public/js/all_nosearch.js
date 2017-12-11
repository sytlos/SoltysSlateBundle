//= require ./lib/_energize
//= require ./app/_toc
//= require ./app/_lang

$(function() {
    setNavigationIds();
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

        var className = $(this).find('code').attr('class');
        var languageName = className.replace('language-', '');
        var authorizedLanguages = $('body').data('languages');

        if($.inArray(languageName, authorizedLanguages) !== -1) {
            $(this).addClass(languageName);
            $(this).addClass('tab-' + languageName);
            $(this).find('code').removeClass(languageName);
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