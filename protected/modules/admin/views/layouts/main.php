<!DOCTYPE html>
<html class="no-js">
<head>
    <title>Admin Home Page</title>
    <meta content="content-type: text/html; charset=utf-8" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Admin <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="/admin/default/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li <?php echo ($this->active == 'tech') ? 'class="active"' : ''; ?>>
                        <a href="/admin/tech">Технологии</a>
                    </li>
                    <li <?php echo ($this->active == 'projects') ? 'class="active"' : ''; ?>>
                        <a href="/admin/projects">Проекты</a>
                    </li>
                    <li <?php echo ($this->active == 'jobs') ? 'class="active"' : ''; ?>>
                        <a href="/admin/jobs">Вакансии</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $content; ?>

    </div>
    <hr>
    <footer>
        <p>&copy; Admin</p>
    </footer>
</div>
<!--/.fluid-container-->

</body>

</html>