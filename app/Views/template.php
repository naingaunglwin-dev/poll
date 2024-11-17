<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
    <link rel="icon" href="<?php echo base_url('icons/logo.png') ?>">
    <style>
        @font-face {
            font-family: 'SF-Pro-Rounded-Regular';
            src: url(<?php echo base_url('font/SF-Pro-Rounded-Regular.otf') ?>) format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        * {
            font-family: "SF-Pro-Rounded-Regular", "JetBrains Mono", "ui-monospace";
            box-sizing: border-box;
        }
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="h-full py-10">
<div style="background-image: url('<?php echo base_url('icons/grid.svg') ?>');" class="absolute z-0 inset-0 bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0.2))]"></div>
<div class="absolute -z-10 inset-x-0 -top-40 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
    <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
</div>
<div class="relative z-[9999]">
    <?php $this->renderSection('content') ?>
</div>
<div class="absolute inset-x-0 top-[calc(79%-30rem)] transform-gpu overflow-hidden blur-3xl sm:top-[calc(72%-30rem)]" aria-hidden="true">
    <div class="relative left-[calc(60%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
</div>
<div class="absolute inset-x-0 top-[calc(79%-30rem)] transform-gpu overflow-hidden blur-3xl sm:top-[calc(72%-30rem)]" aria-hidden="true">
    <div class="relative left-[calc(60%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
</div>
</body>
</html>
