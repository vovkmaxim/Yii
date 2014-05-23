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
<?php $role = (isset(Yii::app()->user->model->role)) ? Yii::app()->user->model->role : 0; ?>
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
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                            <?php
                            if(isset(Yii::app()->user->model->username)){
                                echo Yii::app()->user->model->username;
                            }else{
                                $this->redirect('/admin/default/logout');
                            }
                            ?>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if (in_array($role, AuthUser::$denies['UsersController'])) : ?>
                            <li>
                                <a tabindex="-1" href="/admin/users">Пользователи</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a tabindex="-1" href="/admin/default/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <?php if (in_array($role, AuthUser::$denies['MenuController'])) : ?>
                        <li <?php echo ($this->active == 'menu') ? 'class="active"' : ''; ?>>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Меню</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/menu">Управление</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/menuCategories">Категории</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['TechController'])) : ?>
                    <li <?php echo ($this->active == 'tech') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tech">Технологии</a>
                    </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['TagsController'])) : ?>
                        <li <?php echo ($this->active == 'tags') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/tags">Теги</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['ProjectsController'])) : ?>
                    <li <?php echo ($this->active == 'projects') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/projects">Проекты</a>
                    </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['ConditionsController'])) : ?>
                        <li <?php echo ($this->active == 'conditions') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/conditions">Условия</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['VacanciesController'])) : ?>
                    <li <?php echo ($this->active == 'vacancies') ? 'class="active"' : ''; ?>>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/vacancies">Вакансии</a>
                    </li>
                    <?php endif; ?>
<!--                    --><?php //if (!in_array($role, AuthUser::$denies['PartnersController'])) : ?>
<!--                        <li --><?php //echo ($this->active == 'partners') ? 'class="active"' : ''; ?><!-->
<!--                            <a href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/admin/partners">Партнеры</a>-->
<!--                        </li>-->
<!--                    --><?php //endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['DocumentsController'])) : ?>
                        <li <?php echo ($this->active == 'documents') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/documents">Документы</a>
                        </li>
                    <?php endif; ?>
<!--                    --><?php //if (!in_array($role, AuthUser::$denies['SlidesController'])) : ?>
<!--                        <li --><?php //echo ($this->active == 'slides') ? 'class="active"' : ''; ?><!-->-->
<!--                            <a href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/admin/slides">Слайды</a>-->
<!--                        </li>-->
<!--                    --><?php //endif; ?>
                    <?php if (!in_array($role, AuthUser::$denies['ManagementController'])) : ?>
                        <li <?php echo ($this->active == 'management') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/management">Менеджмент</a>
                        </li>
                    <?php endif; ?>
                     <?php if (in_array($role, AuthUser::$denies['StaticpagesController'])) : ?>
                        <li <?php echo ($this->active == 'staticpages') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/staticpages">Статические страницы</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['ContactdataController'])) : ?>
                        <li <?php echo ($this->active == 'contactdata') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/contactdata">Контактные данные</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['ContactusController'])) : ?>
                        <li <?php echo ($this->active == 'contactus') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/contactus">Список вопросов</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($role, AuthUser::$denies['SuccessstoriesController'])) : ?>
                        <li <?php echo ($this->active == 'successstories') ? 'class="active"' : ''; ?>>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/successstories">Success stories</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div><br><br><br>
<div class="container-fluid">
    <div class="row-fluid">
        <?php echo $content; ?>

    </div>
    <hr>

</div>
<!--/.fluid-container-->
<footer>
    <p>&copy; Admin</p>
</footer>
</body>

</html>
