<?php $this->extend('template') ?>

<?php $this->section('content') ?>

<div class="h-[90vh] sm:h-[80vh] grid place-content-center">
    <div class="container bg-white shadow-lg p-10 rounded-lg w-[90vw] md:w-[400px]">
        <form action="<?php echo base_url('vote') ?>" method="post" class="space-y-5">
            <h1 class="text-center text-xl"><?php echo $poll_title ?></h1>
            <p class="text-center text-sm">
                <?php echo $poll_desc ?>
            </p>
            <input type="hidden" value="<?php echo $token ?>" name="token">
            <?php foreach($poll as $data): ?>
                <div class="flex items-center shadow-md rounded-lg px-3 py-2 hover:cursor-pointer" onclick="checkRadio('<?php echo $data['id']; ?>')">
                    <input required id="default-radio-<?php echo $data['id'] ?>" type="radio" value="<?php echo $data['id'] ?>" name="poll" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                    <label for="default-radio-<?php echo $data['id'] ?>" class="ms-2 hover:cursor-pointer text-sm font-medium text-gray-900"><?php echo $data['title'] ?></label>
                </div>
            <?php endforeach ?>
            <input type="submit" value="Vote" class="bg-sky-700 px-4 py-2 w-full rounded-lg hover:cursor-pointer hover:bg-sky-900 text-white">
        </form>

        <a href="<?php echo base_url('vote/result/' . $token); ?>" class="text-center no-underline text-blue-700 mt-10 block">see result</a>
    </div>
</div>

<script>
    function checkRadio(id) {
        const radio = document.getElementById('default-radio-' + id);
        if (radio) {
            radio.checked = true;
        }
    }
</script>

<?php $this->endSection() ?>
