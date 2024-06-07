document.getElementById('search-song').addEventListener('keyup', function() {
    var query = this.value;
    if (query.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search_song.php?q=' + encodeURIComponent(query), true);
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('all-songs').style.display = 'none';
                document.getElementById('search-results').style.display = 'block';
                document.getElementById('search-results').innerHTML = this.responseText;
            }
        };
        xhr.send();
    } else {
        document.getElementById('all-songs').style.display = 'block';
        document.getElementById('search-results').style.display = 'none';
        document.getElementById('search-results').innerHTML = '';
    }
});
