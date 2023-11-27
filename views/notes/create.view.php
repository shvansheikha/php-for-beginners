<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="/notes/store" method="POST" class="bg-white space-y-6 py-5 px-12 shadow rounded-md" >

            <div>
                <div class="col-span-full">
                    <label for="about"
                           class="block text-sm font-medium text-gray-900">Body</label>
                    <div class="mt-2">
                                <textarea id="body"
                                          name="body"
                                          rows="3"
                                          class="w-full rounded-md border text-gray-900 shadow-sm placeholder:text-gray-400 sm:text-sm"><?= $_POST['body'] ?? '' ?></textarea>

                        <?php if (isset($errors['body'])): ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
