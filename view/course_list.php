<?php include ('view/header.php'); ?>
<?php if ($courses){ ?>
    <section id="list" class="list">
        <header class="list-rows-list-header">
            <h1>Course List</h1>
        </header>

        <?php foreach ($courses as $course) : ?>
    <div class="list-row">
        <div class="list-items">
            <p class="bold"><?= $course['courseName'] ?></p>
        </div>
        <div class="list-remove-items">
            <form action="." method="post">
                <input type="hidden" name="action" value="deleteSingleCourse">
                <input type="hidden" name="course_id" value="<?= $course['ID'] ?>">
                <button class="remove-button">Delete</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    </section>
    <?php } else { ?>
    <p>No Courses Exit Yet.</p>
    <?php } ?>

<?php include ('view/footer.php'); ?>