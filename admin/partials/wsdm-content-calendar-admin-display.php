<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Content_Calendar
 * @subpackage Wsdm_Content_Calendar/admin/partials
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php

global $wpdb, $table_prefix;
$wp_content_calendar = $table_prefix . 'content_calendar';

if (isset($_POST['submit'])) {
    if (isset($_POST['publishingdate']) && isset($_POST['occasion']) && isset($_POST['posttitle']) && isset($_POST['post_author']) && isset($_POST['post_reviewer'])) {
        $wpdb->insert($wp_content_calendar, array(
            'post_title' => esc_sql($_POST['posttitle']),
            'date' => esc_sql($_POST['publishingdate']),
            'occassion' => esc_sql($_POST['occasion']),
            'author' => esc_sql($_POST['post_author']),
            'reviewer' => esc_sql($_POST['post_reviewer']),
        ));
    }
}


?>


<div class="wrap">
    <h1>Plan Content</h1>

    <form action="" method="post">
        <table class="form-table" role="presentation">

            <tbody>

                <tr>
                    <th scope="row"><label for="posttitle">Post Title</label></th>
                    <td><input name="posttitle" type="text" id="posttitle" placeholder="The Post Title" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="publishingdate">Publishing Date</label></th>
                    <td><input name="publishingdate" type="date" id="publishingdate" class="regular-text">
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="occasion">Occasion</label></th>
                    <td><input name="occasion" type="text" id="occasion" placeholder="Holi" class="regular-text">
                        <p class="description" id="occasion-description">In what occasion the post will be published.
                        </p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="post_author">Post Author</label></th>
                    <td>
                        <select name="post_author" id="post_author">
                            <?php
                            $authors = get_users(array('role__in' => array('author')));
                            foreach ($authors as $author) {
                                echo '<option value="' . $author->display_name . '">' . $author->display_name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="post_reviewer">Post Reviewer</label></th>
                    <td><select name="post_reviewer" id="post_reviewer">

                            <?php
                            $reviewers = get_users(array('role__in' => array('administrator', 'contributor', 'editor')));
                            foreach ($reviewers as $reviewer) {
                                echo '<option value="' . $reviewer->display_name . '">' . $reviewer->display_name . '</option>';
                            }
                            ?>
                        </select></td>
                </tr>

            </tbody>
        </table>
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add New Post">
        </p>
    </form>
</div>