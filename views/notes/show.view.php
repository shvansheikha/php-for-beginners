<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500">Go Back</a>
        <p class="mt-8">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <form class="mt-6" method="POST" action="/notes/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500">DELETE</button>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
