<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="lx rb um yz ze ari ars cfc ddh">
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">

                        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                            Register new account</h2>
                    </div>

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        <form action="/auth/register" method="POST">
                            <div>
                                <input id="email"
                                       name="email"
                                       autocomplete="email"
                                       placeholder="email@example.com"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                <?php if (isset($errors['email'])): ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="mt-2">
                                <input id="password"
                                       name="password"
                                       type="password"
                                       placeholder="password"
                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                <?php if (isset($errors['password'])): ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>