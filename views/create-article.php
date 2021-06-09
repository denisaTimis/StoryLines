<!DOCTYPE html>
<html>
    <head>
        <title>World Wide News</title>
        <link rel="icon" href="graphics/icons/globe.png"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/create-article.css" rel="stylesheet">
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/sidenav.css" rel="stylesheet">
    </head>
    <script>
        $('textarea').on('paste input', function () {
    if ($(this).outerHeight() > this.scrollHeight){
        $(this).height(1)
    }
    while ($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))){
        $(this).height($(this).height() + 1)
    }
});
    </script>
    <header>
        <div class="navbar navbar-dark" style="background-color: rgb(13, 25, 44);">
            <div class="container row login-row">
                <a href="log-in.html" class="link-style-light">Login/ Register</a>
            </div>
        </div>
        <div class="navbar navbar-dark" style="background-color: rgb(13, 25, 44);">
            <div class="container">
                <a href="./" class="navbar-brand column">
                    <img src="../graphics/icons/globe.png" width="50px" height="50px"/>
                    <strong>World Wide News</strong>
                </a>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <input class="btn btn-light" width="50px" height="40px" type="image" src="../graphics/icons/search.png"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg" style="background-color: rgb(13, 25, 44);">
            <li class="nav-item">
                <a class="nav-link" href="./all">General news</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Popular</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Tech</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Politics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allNews.html">Entertainment</a>
            </li>
        </ul>
    </header>
    <body>
        <form method="GET" action="new-article.php" >

       
        <div class="py-3 container page-borders rounded shadow-lg">
            <div class="row container">
                <input name="articleTitle" type="text" class="form-control title-style" placeholder="Article title...">
            </div>
            <div class="row container">
                <input name="articleContent"class="textarea paragraph-style" role="textbox" contenteditable></input>
            </div>
            <div class="row container py-4">
                <div class="column save-colum">
                    <input type="submit" class="btn btn-light" width="50px" height="40px" type="text" value="Save">
                </div>
            </div>
        </div>
    </form>
        <div id="mySidenav" class="sidenav">
            <a href="#" id="add-paragraph">Add paragraph<img src="../graphics/icons/paragraph.png" class="sidenav-icon"></a>
            <a href="#" id="add-image">Add photo<img src="../graphics/icons/image.png" class="sidenav-icon"></a>
            <a href="#" id="add-video">Add video<img src="../graphics/icons/video.png" class="sidenav-icon"></a>
            <a href="#" id="create-gallery">Create gallery<img src="../graphics/icons/gallery.png" class="sidenav-icon"></a>
          </div>
    </body>
</html>