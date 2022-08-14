<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <header>
            <?php $__env->startSection('header'); ?>
                <div class="container">
                    <div class="menu">
                        <div class="logo"><a href="<?php echo e(route('index')); ?>"><img src="<?php echo e(asset('img/logo.png')); ?>"
                                                                              alt="logo" class="logo"></a></div>
                        <nav class="nav">
                            <a href="<?php echo e(route('index')); ?>" class="nav-link underline">Design.pro</a>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(!Auth::user()->is_admin): ?>
                                    <a href="<?php echo e(route('home')); ?>" class="nav-link underline">My requests</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('adminPanel')); ?>" class="nav-link underline">Admin Panel</a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('logout')); ?>" class="nav-link underline">Logout</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="nav-link sign-in">Sign in</a>
                                <a href="<?php echo e(route('register')); ?>" class="nav-link sign-up">Sign up</a>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            <?php echo $__env->yieldSection(); ?>
        </header>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer>
        <div class="container">
            <div class="footer">
                <div class="footer-contact">
                    <div class="social-media">
                        <a href="#"><img src="<?php echo e(asset('img/fb.png')); ?>" alt="facebook" class="media"></a>
                        <a href="#"><img src="<?php echo e(asset('img/inst.png')); ?>" alt="facebook" class="media"></a>
                        <a href="#"><img src="<?php echo e(asset('img/pint.png')); ?>" alt="facebook" class="media"></a>
                    </div>
                </div>
                <div class="footer-nav">
                    <a href="<?php echo e(route('index')); ?>" class="nav-link no-border underline">Design.pro</a>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(!Auth::user()->is_admin): ?>
                            <a href="<?php echo e(route('home')); ?>" class="nav-link underline">My requests</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('adminPanel')); ?>" class="nav-link underline">Admin Panel</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link underline">Logout</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="nav-link no-border underline">Sign in</a>
                        <a href="<?php echo e(route('register')); ?>" class="nav-link no-border underline">Sign up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
<?php /**PATH D:\projects\ws-asia-2021\resources\views/layouts/app.blade.php ENDPATH**/ ?>