<!DOCTYPE html>
<html>
    <head>
        <title>{{user.FIRST_NAME}} {{user.LAST_NAME}}</title>
        <link rel="icon" href="../graphics/icons/story.png"/>
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/create-article.css" rel="stylesheet">
        <link href="../../css/common.css" rel="stylesheet">
        <link href="../../css/homepage.css" rel="stylesheet">
        <link href="../../css/profile.css" rel="stylesheet">
    </head>
    <header>
        <div class="navbar navbar-dark container" style="background-color: #2F4F4F;">
            <div class="container">
                <div class="row flex-fill justify-content-between">
                    <div class="col-md-auto">
                        <a href="../" class="navbar-brand">
                            <img src="../../graphics/icons/story.png" width="40px" height="40px" />
                            <strong>Story Line</strong>
                        </a>
                    </div>
                    <div class="col-md-auto search">
                        <form >
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    <input class="btn btn-light" width="50px" height="40px" type="image" src="../../graphics/icons/search.png"></input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-auto">
                    <div>
                        <a href="./0" class="link-style-light"><img src="../../graphics/icons/profile.png" /></a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center navbar-dark shadow-lg container" style="background-color: #2F4F4F;">
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Romance">Romance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Horror">Horror</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Comedy">Comedy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Science Fiction">Science Fiction</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Action">Action</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Mystery">Mystery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../allStories/Kids">Kids</a>
        </li>
    </ul>
    </header>
    <body>
        <div class="py-5 container">
            <div class="row justify-content-center">
                <div class="col-md-auto shadow-lg profile-about-div">
                    <div class="row name-row">
                        <div class="col-md-auto">
                            <h1>{{user.FIRST_NAME}} {{user.LAST_NAME}}</h1>
                        </div>
                    </div>
                    <div class="row type-row">
                        <div class="col-md-auto">
                            <h4>Author</h4>
                        </div>
                    </div>
                </div>
                <div class="row type-row">
                    <div class="col-md-auto">
                        <h4>Author</h4>
                    </div>
                </div>
                <div class="row profile-about">
                    <strong>ABOUT</strong>
                </div>
                <div class="row profile-articles">
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="row">
                                <div class="col">
                                    <strong>Email</strong>
                                </div>
                                <div class="col-md-auto">
                                    <label>{{user.EMAIL}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Joined</strong>
                                </div>
                                <div class="col-md-auto">
                                    <label>
                                        {{user.JOIN_DATE}}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Gender</strong>
                                </div>
                                <div class="col-md-auto">
                                    <label>{{user.GENDER}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>DoB</strong>
                                </div>
                                <div class="col-md-auto">
                                    <label>{{user.DOB}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Country</strong>
                                </div>
                                <div class="col-md-auto">
                                    <label>{{user.COUNTRY}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row profile-about ">
                    <strong>DESCRIPTION</strong>
                </div>
                <div class="row profile-articles">
                    <label>{{user.DESCRIPTION}}</label>
                </div>
                <div class="row profile-about">
                    <strong>STORIES</strong>
                </div>
                <div class="row profile-articles">
                    <div class="row">
                        <div class="col-md-auto article-preview-prof" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/previewStory.png" width="100px" height="100px">
                                </div>
                                <div class="col-md-auto">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the story preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px"
                                        height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col-md-auto">
                                    <a href="article.html" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto article-preview-prof" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/previewStory.png" width="100px" height="100px">
                                </div>
                                <div class="col-md-auto">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the story preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px"
                                        height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col-md-auto">
                                    <a href="article.html" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-auto article-preview-prof" name="preview1">
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/previewStory.png" width="100px" height="100px">
                                </div>
                                <div class="col-md-auto">
                                    <p class="article-preview-title">Title</p>
                                    <p>This is a placeholder for the text of the story preview.</p>
                                </div>
                            </div>
                            <div class="row article-row">
                                <div class="col">
                                    <img src="../../graphics/icons/user.png" class="link-icon" width="20px"
                                        height="20px">
                                    <a href="profile.php" class="link-style">{{user.FIRST_NAME}} {{user.LAST_NAME}}</a>
                                </div>
                                <div class="col-md-auto">
                                    <a href="./story" class="full-post">View full post...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>