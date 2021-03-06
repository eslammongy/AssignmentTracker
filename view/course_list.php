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
<!--adding course section-->
<section id="add-course" class="add-course">
    <h2>Add Course</h2>
    <form action="." method="post" id="add-course-form" class="add-course-form">
        <input type="hidden" name="action" value="addingSingleCourse">
        <div class="add-inputs">
            <label>Name:</label>
            <label>
                <input type="text" name="course-name" maxlength="50" placeholder="name" autofocus required>
            </label>
        </div>
        <div class="add-item-btn">
            <button class="add-items-button">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".">View &amp; Add Assignment</a> </p>

<?php include ('view/footer.php'); ?>