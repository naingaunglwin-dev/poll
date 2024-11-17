<?php $this->extend('template') ?>

<?php $this->section('content') ?>

<div class="h-[90vh] sm:h-[80vh] grid place-content-center">
    <div class="bg-white z-50 container shadow-lg p-10 rounded-lg w-[90vw] md:w-[400px] space-y-5">
        <div class="absolute -z-10 inset-x-0 -top-40 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-10 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <h1 class="text-xl text-center"><?php echo $poll_title ?></h1>
        <p class="text-center text-sm">
            <?php echo $poll_desc ?>
        </p>

        <?php foreach ($poll as $data): ?>
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-base font-medium text-blue-700"><?php echo $data['title'] ?></span>
                    <span class="text-sm font-medium text-blue-700"><?php echo $data['percent'] ?>%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: <?php echo $data['percent'] ?>%"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="absolute z-40 inset-x-0 top-[calc(79%-30rem)] transform-gpu overflow-hidden blur-3xl sm:top-[calc(72%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(60%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
