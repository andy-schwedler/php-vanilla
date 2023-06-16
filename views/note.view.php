<?php require('partials/head.php') ?>

<body class="h-full">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <?php require('partials/nav.php')  ?>
        <?php require('partials/banner.php')  ?>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <p class="mb-6">
                    <a href="/notes" class="underline"> back to notes </a>
                </p>
                <p>
                    <?= $note['body'] ?>
                </p>
            </div>
        </main>
    </div>

</body>

</html>