<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<script type="text/javascript">
    var client = algoliasearch('U5JRND1HRS', '16a4a760400118376f9f6f70fe42054b');
    var index = client.initIndex('articles');

    autocomplete('#aa-search-input', { hint: false, autoselect: true }, [
    {
        source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
        displayKey: 'title',
        templates: {
            suggestion: function(suggestion) {
                return '<span>' +
                    suggestion._snippetResult.title.value + '...</span><span>' +
                    suggestion._highlightResult.user.value + '</span>';
            },
            footer: '<span class="aa-branding"><a href="https://www.algolia.com/"><img src="https://www.algolia.com/static_assets/images/press/downloads/search-by-algolia.svg"></a></span>'
        }
    }
    ]).on('autocomplete:selected', function(event, suggestion, dataset) {
        location.href = suggestion.url;
    });
</script>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">
    // Enable tooltips everywhere. Perf issues ?
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>