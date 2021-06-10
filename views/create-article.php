<!DOCTYPE html>
<html>
    <head>
        <title>Story Lines</title>
        <link rel="icon" href="graphics/icons/globe.png"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/create-article.css" rel="stylesheet">
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/sidenav.css" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
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
    <div class="navbar navbar-dark container" style="background-color: #2F4F4F;">
        <div class="container">
            <div class="row flex-fill justify-content-between">
                <div class="col-md-auto">
                    <a href="./" class="navbar-brand">
                        <img src="../graphics/icons/story.png" width="40px" height="40px" />
                        <strong>Story Line</strong>
                    </a>
                </div>
                <div class="col-md-auto search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-btn">
                                <input class="btn btn-light" width="50px" height="40px" type="image"
                                src="../graphics/icons/search.png"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div>
                        <a href="./login" class="link-style-light">Login/ Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg container" style="background-color: #2F4F4F;">
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Romance">Romance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Horror">Horror</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Comedy">Comedy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Science Fiction">Science Fiction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Action">Action</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Mystery">Mystery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./allStories/Kids">Kids</a>
        </li>
    </ul>
    </header>
    <body>
    <form method="GET" action="new-article.php" >
        <div class="py-3 container page-borders rounded shadow-lg">
            <div class="row container">
                <input name="articleTitle" type="text" class="form-control title-style" placeholder="Story title...">
            </div>
            <div class="row container">
                <input name="articleContent"class="textarea paragraph-style" role="textbox" contenteditable></input>
            </div>
            <div class="row container justify-content-end py-4">
                <div class="col-md-auto save-colum">
                    <input type="image"  width="50px" height="40px" src="../graphics/icons/save.png">
                </div>
                <div class="col-md-auto save-colum">
                <div class="dropdown ">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <img src="../graphics/icons/storyType.png" width="50px" height="40px">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Kids</a></li>
                        <li><a class="dropdown-item" href="#">Romance</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Comedy</a></li>
                        <li><a class="dropdown-item" href="#">Science Fiction</a></li>
                        <li><a class="dropdown-item" href="#">Mystery</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>