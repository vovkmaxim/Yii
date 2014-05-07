<!DOCTYPE html>
<html class="no-js">
<head>
    <title>Admin Home Page</title>
    <meta content="content-type: text/html; charset=utf-8" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/tinymce/tinymce.min.js"></script>
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
                <?php $role = (isset(Yii::app()->user->model->role)) ? Yii::app()->user->model->role : 0; ?>
                <ul class="nav">
                    <?php if (!in_array($role, AuthUser::$denies['TechController'])) : ?>
                    <li <?php echo ($this->active == 'tech') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tech">Технологии</a>
                    </li>
                    <?php endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['ProjectsController'])) : ?>
                    <li <?php echo ($this->active == 'projects') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/projects">Проекты</a>
                    </li>
                    <?php endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['JobsController'])) : ?>
                    <li <?php echo ($this->active == 'jobs') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/jobs">Вакансии</a>
                    </li>
                    <?php endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['PartnersController'])) : ?>
                        <li <?php echo ($this->active == 'partners') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/partners">Партнеры</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['ProfileController'])) : ?>
                        <li <?php echo ($this->active == 'profile') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/profile">Загрузить профиль</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['ProfileController'])) : ?>
                        <li <?php echo ($this->active == 'staticpages') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/staticpages">Статические страницы</a>
                        </li>
                    <?php endif; ?>
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

</div>
<!--/.fluid-container-->
<footer>
    <p><center>&copy; Admin</center></p>
</footer>
</body>

</html>