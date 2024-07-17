<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php if (isset($metaData['seo_title']) && !empty($metaData['seo_title'])): ?>
        <title><?= htmlspecialchars($metaData['seo_title']) ?></title>
        <meta property="og:title" content="<?= htmlspecialchars($metaData['seo_title']) ?>">
    <?php else: ?>
        <title></title>
        <meta property="og:title" content="">
    <?php endif; ?>

    <?php if (isset($metaData['seo_desc']) && !empty($metaData['seo_desc'])): ?>
        <meta name="description" content="<?= htmlspecialchars($metaData['seo_desc']) ?>">
        <meta property="og:description" content="<?= htmlspecialchars($metaData['seo_desc']) ?>">
    <?php else: ?>
        <meta name="description" content="">
        <meta property="og:description" content="">
    <?php endif; ?>

    <?php if (isset($metaData['seo_keys']) && !empty($metaData['seo_keys'])): ?>
        <meta name="keywords" content="<?= htmlspecialchars($metaData['seo_keys']) ?>">
    <?php else: ?>
        <meta name="keywords" content="">
    <?php endif; ?>

    <?php if (isset($metaData['seo_canonicals']) && !empty($metaData['seo_canonicals'])): ?>
        <meta property="og:url" content="<?= htmlspecialchars($metaData['seo_canonicals']) ?>">
        <link rel="canonical" href="<?= htmlspecialchars($metaData['seo_canonicals']) ?>">
    <?php else: ?>
        <meta property="og:url" content="">
        <link rel="canonical" href="">
    <?php endif; ?>

    <meta name="author" content="<?= htmlspecialchars(base_url()) ?>" />
    <meta name="Copyright" content="Copyright 2024 @ Crypo" />

    <meta name="robots" content="noindex, nofollow" />

    <link rel="dns-prefetch" href="<?= htmlspecialchars(base_url()) ?>">
<link rel="dns-prefetch" href="https://www.google.com/">
<link rel="dns-prefetch" href="https://www.google-analytics.com/">
<link rel="dns-prefetch" href="https://www.googletagmanager.com/">
<link rel="dns-prefetch" href="https://ajax.googleapis.com/">

<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/accordion.css') ?>">
