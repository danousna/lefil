var client = algoliasearch('U5JRND1HRS', '16a4a760400118376f9f6f70fe42054b');
var index = client.initIndex('articles');
//initialize autocomplete on search input (ID selector must match)
autocomplete('#aa-search-input',
{ hint: false }, {
    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
    //value to be displayed in input control after user's suggestion selection
    displayKey: 'title',
    //hash of templates used when rendering dataset
    templates: {
        //'suggestion' templating function used to render a single suggestion
        suggestion: function(suggestion) {
          return '<span>' +
            suggestion._highlightResult.title.value + '</span>'
        }
    }
})
.on('autocomplete:selected', function(event, suggestion, dataset) {
    location.href = suggestion.url;
});