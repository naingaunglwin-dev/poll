<?php $this->extend('template') ?>

<?php $this->section('content') ?>

<div class="grid place-content-center overflow-y-scroll">
    <div class="border bg-white shadow-md rounded-lg p-4 sm:p-10 max-w-[36.125rem]">
        <form action="" method="post" id="poll-form">
            <h1 class="text-center text-xl font-bold my-10">Poll Form</h1>
            <?php if ($message = session('message')): ?>
                <div class="p-4 mb-4 text-center text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <?php echo $message ?>
                </div>
            <?php endif ?>
            <?php if (isset($error)): ?>
                <?php if (is_array($error)): ?>
                    <?php foreach ($error as $e): ?>
                        <div class="p-4 mb-4 text-center text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <?php echo $e ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-4 mb-4 text-center text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
            <?php endif ?>
            <div class="space-y-10">
                <div class="w-100">
                    <label for="title" class="text-[15px] font-[400]">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Enter poll title"
                        value="<?php echo set_value('title', $vote['title']) ?>"
                        class="border-[#e5eaf2] border rounded-md outline-none px-4 w-full mt-1 py-3 focus:border-[#3B9DF8] transition-colors duration-300"
                    />
                </div>
                <div class="w-100">
                    <label for="description" class="font-[400] text-[15px]">
                        Description (optional)
                    </label>
                    <textarea type="text" name="description" id="description" placeholder="Write poll description" class="border-[#e5eaf2] border rounded-md outline-none mt-1 px-4 w-full py-3 min-h-[200px] focus:border-[#3B9DF8] transition-colors duration-300 resize-none"><?php echo set_value('description', $vote['description']) ?></textarea>
                </div>

                <!--                <div class="w-100">-->
                <!--                    <div class="w-full mb-2">-->
                <!--                        <label class="font-[400] text-[15px]">-->
                <!--                            Expired after <span class="text-red-500">*</span>-->
                <!--                        </label>-->
                <!--                    </div>-->
                <!--                    <div class="w-full relative">-->
                <!--                        <input name="expired_at" value="--><?php //echo set_value('expired_at', $vote['expired_at']) ?><!--" type="text" placeholder="expired after" class="border border-[#e5eaf2] py-3 ps-4 outline-none w-full rounded-md" required />-->
                <!--                        <div class="absolute right-0 top-[calc(100%-25px)] transform -translate-y-1/2 bg-gray-500 text-white ps-4 text-center pe-3 py-3 rounded-r-md">-->
                <!--                            day-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

                <div class="w-100">
                    <label class="font-[400] text-[15px]">
                        Polls <span class="text-red-500">*</span>
                    </label>
                    <div class="shadow-md border-black rounded-lg py-2 px-4 space-y-5">
                        <div id="pollContainer">
                            <input
                                type="text"
                                name="poll[poll1]"
                                placeholder="Enter poll option 1"
                                value="<?php echo set_value('poll[poll1]', $poll[0]['title']) ?>"
                                required
                                class="border-[#e5eaf2] border rounded-md outline-none px-3 w-full mt-1 py-2 focus:border-[#3B9DF8] transition-colors duration-300"
                            />
                            <input
                                type="text"
                                name="poll[poll2]"
                                placeholder="Enter poll option 2"
                                value="<?php echo set_value('poll[poll2]', $poll[1]['title']) ?>"
                                required
                                class="border-[#e5eaf2] border rounded-md outline-none px-3 w-full mt-1 py-2 focus:border-[#3B9DF8] transition-colors duration-300"
                            />
                        </div>
                        <a href="#" id="addMorePoll" class="relative z-50 no-underline flex justify-center items-center gap-4 py-2 border border-black border-opacity-20 rounded-lg hover:bg-sky-50">
                            <svg class="w-4 h-4 text-sky-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                            </svg>
                            Add more
                        </a>
                    </div>
                </div>

                <div class="w-100">
                    <a href="#" id="submit" class="relative z-50 no-underline flex justify-center items-center gap-4 py-2 border border-green-600 border-opacity-20 rounded-lg bg-green-100 hover:bg-green-200">
                        <?php echo !empty($vote['id']) ? 'Save' : 'Create' ?>
                        <svg class="w-6 h-6 text-green-400 top" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                        </svg>
                    </a>
                </div>

                <?php if (!empty($vote['id'])): ?>
                    <div class="w-100">
                        <div id="share-link" data-share="<?php echo base_url('share/' . $vote['token']) ?>" class="no-underline text-blue-700 text-center hover:cursor-pointer">
                            Copy share link
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<div id="tooltip" class="hidden absolute px-1 bg-gray-800 border border-gray-700 text-gray-300 rounded-lg items-center gap-2" style="z-index: 9999; top: 50%; left: 50%; transform: translateX(-50%);">
    <svg class="w-4 h-4 fill-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
    </svg>
    copied!
</div>



<script>
    const addMoreButton = document.getElementById('addMorePoll');
    const pollContainer = document.getElementById('pollContainer');
    const totalPoll = '<?php echo (count($poll) - 2); ?>';
    const polls = <?php echo json_encode($poll); ?>;

    document.addEventListener('DOMContentLoaded', function () {
        if (parseInt(totalPoll) > 0) {
            let index = 2;
            for (let i = 1; i <= parseInt(totalPoll); i++) {
                addPollInput((index + 1).toString(), polls[index]['title']);
                index++;
            }
        }
    });

    let pollCount = 3;

    function addPollInput(count = '', value = '') {

        const pollWrapper = document.createElement('div');
        pollWrapper.classList.add('relative');

        const newPollInput = document.createElement('input');
        newPollInput.type = 'text';
        newPollInput.name = `poll[poll${(!count) ? pollCount : count}]`;
        newPollInput.placeholder = `Enter poll option ${(!count) ? pollCount : count}`;
        newPollInput.className = 'border-[#e5eaf2] border rounded-md outline-none px-3 w-full mt-1 py-2 focus:border-[#3B9DF8] transition-colors duration-300';
        newPollInput.value = value;

        const removeButton = document.createElement('button');
        removeButton.className = 'absolute right-0 top-[calc(100%-21px)] transform -translate-y-1/2 bg-red-500 text-white px-3 py-2 rounded-r-md';
        removeButton.textContent = 'Remove';

        removeButton.addEventListener('click', function() {
            const removePoll = document.createElement('input');
            removePoll.type = 'hidden';
            removePoll.name = `remove[poll${(!count) ? pollCount : count}]`;
            removePoll.value = `poll${(!count) ? pollCount : count}`;

            pollContainer.appendChild(removePoll);
            pollWrapper.remove();
        });

        pollWrapper.appendChild(newPollInput);
        pollWrapper.appendChild(removeButton);

        pollContainer.appendChild(pollWrapper);

        pollCount++;
    }

    addMoreButton.addEventListener('click', function(event) {
        event.preventDefault();
        addPollInput();
    });

    let isFormDirty = false;

    document.querySelectorAll("form input, form textarea").forEach((element) => {
        element.addEventListener("input", () => {
            isFormDirty = true;
        });
    });

    function confirmUnload(event) {
        if (isFormDirty) {
            const confirmationMessage = "All data from the form will be lost. Do you want to reload the page?";
            if (!window.confirm(confirmationMessage)) {
                event.preventDefault();
                event.returnValue = "";
                return false;
            }
        }
    }

    window.addEventListener("beforeunload", confirmUnload);

    let submit = document.getElementById('submit');
    let form = document.getElementById('poll-form');

    submit.addEventListener('click', function (e) {
        e.preventDefault();
        window.removeEventListener("beforeunload", confirmUnload);
        form.submit();
    });

    document.getElementById('share-link').addEventListener('click', function() {
        navigator.clipboard.writeText(this.getAttribute('data-share')).then(() => {

            const tooltip = document.getElementById('tooltip');
            tooltip.classList.remove('hidden');
            tooltip.classList.add('flex');

            setTimeout(() => {
                tooltip.classList.add('hidden');
                tooltip.classList.remove('flex');
            }, 1200);
        }).catch(err => {
            console.error("Failed to copy text: ", err);
        });
    });
</script>

<?php $this->endSection() ?>
