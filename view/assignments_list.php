<?php

include('../view/header.php'); ?>

    <section id="list" class="assignments-list">
        <header class="list-rows-list-header">
            <h1 style="color: orangered; font-size: xx-large">Assignments</h1>
            <form class="list-header-select" action="." method="get" id="list-header-select">
                <input type="hidden" name="action" value="list_assignments">
                <label>
                    <select name="course_id" required>
                        <option value="0">View All</option>
                        <?php
                        foreach ($courses as $course): ?>
                            <?php
                            if ($course_id == $course['CourseID']) { ?>
                                <option value="<?= $course['CourseID'] ?>" selected></option>
                                <?php
                            } else { ?>
                                <option value="<?= $course['CourseID'] ?>">
                                <?php
                            } ?>
                            <?= $course['courseName'] ?>
                            </option>
                        <?php
                        endforeach; ?>
                    </select>
                </label>
                <button class="add-button">Go</button>
            </form>
        </header>
        <?php
        if ($assignments) { ?>
            <?php
            foreach ($assignments as $assignment) : ?>
                <div class="list-row">
                    <div class="list-items">
                        <p class="bold"><?= $assignment['courseName'] ?></p>
                        <p><?= $assignment['Description'] ?></p>
                    </div>
                    <div class="list-remove-items">
                        <form action="." method="post">
                            <input type="hidden" name="action" value="deleteSingleAssignment">
                            <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">
                            <button class="remove-button">Delete</button>
                        </form>
                    </div>
                </div>
            <?php
            endforeach; ?>
            <?php
        } else { ?>
            <br>
            <?php
            if ($course_id) { ?>
                <p>No Assignments Exit For This Course Yet.</p>
                <?php
            } else { ?>
                <p>No Assignment Exit Yet.</p>
                <?php
            } ?>
            <br>
            <?php
        } ?>
    </section>

    <!-- add assignment section-->
    <section id="add-assignment" class="add-assignments">
        <h3>Add Assignment</h3>
        <form action="." method="post" id="add-form" class="add-form">
            <input name="action" type="hidden" value="addingSingleAssignment">
            <div class="add-inputs">
                <label>Course:</label>
                <select name="course_id" required>
                    <option value="">Please Select</option>
                    <?php
                    foreach ($courses as $course): ?>
                        <option value="<?= $course['CourseID'] ?>">
                            <?= $course['courseName'] ?>
                        </option>
                    <?php
                    endforeach; ?>
                </select>
                <label>Description</label>
                <label>
                    <input type="text" name="description" maxlength="130" placeholder="Description" required>
                </label>
            </div>
            <div class="add-items-btn">
                <button class="button-add-items">Add</button>
            </div>
        </form>
    </section>
    <br>
    <p><a href=".?action=list_courses">View/Edit Course</a></p>
<?php
include('../view/footer.php'); ?>