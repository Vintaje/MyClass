<div class="row">

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 d-flex p-2">
                <img id="banner" src="img/homebanner.jpg" alt="banner" class="center" />
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="container">
                    <div class="feeds" id="feed"></div>
                </div>
                <script>
                    (function() {
                        var url = "http://feeds.weblogssl.com/xataka2";
                        var xhr = createCORSRequest("GET", "https://api.rss2json.com/v1/api.json?rss_url=" + url);
                        if (!xhr) {
                            throw new Error('CORS not supported');
                        } else {
                            xhr.send();
                        }
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                var responseText = xhr.responseText;
                                var result = JSON.parse(responseText);
                                var container = document.getElementById("feed"),
                                    entry = result.items,
                                    date;
                                for (var i = 0; i < 4; i++) {
                                    dv = document.createElement("div");
                                    dv.classList.add("card-body");
                                    date = new Date(entry[i].pubDate);
                                    dv.innerHTML = '<a class="title" href="' + entry[i].link + '" target="_blank">' + entry[i].title + '</a><br/>' + '<p class="date">' + date.toDateString().substr(4) + '</p>' + '<br/><div class="article">' + entry[i].content.substring(0, 600) + '...</div>';
                                    dv.innerHTML += '<hr/>';
                                    container.appendChild(dv);
                                }
                            }
                        }
                    })();

                    function createCORSRequest(method, url) {
                        var xhr = new XMLHttpRequest();
                        if ("withCredentials" in xhr) {
                            xhr.open(method, url, true);
                        } else if (typeof XDomainRequest != "undefined") {
                            xhr = new XDomainRequest();
                            xhr.open(method, url);
                        } else {
                            xhr = null;
                        }
                        return xhr;
                    }
                </script>
                <div class="container">
                    <div class="feeds" id="feed1"></div>
                </div>
                <script>
                    (function() {
                        var url = "https://www.eleconomista.es/rss/rss-economia.php";
                        var xhr = createCORSRequest("GET", "https://api.rss2json.com/v1/api.json?rss_url=" + url);
                        if (!xhr) {
                            throw new Error('CORS not supported');
                        } else {
                            xhr.send();
                        }
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                var responseText = xhr.responseText;
                                var result = JSON.parse(responseText);
                                var container = document.getElementById("feed1"),
                                    entry = result.items,
                                    date;
                                for (var i = 0; i < 4; i++) {
                                    dv = document.createElement("div");
                                    date = new Date(entry[i].pubDate);
                                    dv.innerHTML = '<a class="title" href="' + entry[i].link + '" target="_blank">' + entry[i].title + '</a><br/>' + '<p class="date">' + date.toDateString().substr(4) + '</p>' + '<br/><div class="article">' + entry[i].content.substring(0, 600) + '...</div>';
                                    dv.innerHTML += '<hr/>';
                                    container.appendChild(dv);
                                }
                            }
                        }
                    })();

                    function createCORSRequest(method, url) {
                        var xhr = new XMLHttpRequest();
                        if ("withCredentials" in xhr) {
                            xhr.open(method, url, true);
                        } else if (typeof XDomainRequest != "undefined") {
                            xhr = new XDomainRequest();
                            xhr.open(method, url);
                        } else {
                            xhr = null;
                        }
                        return xhr;
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h1>Segunda columna</h1>
    </div>
</div>