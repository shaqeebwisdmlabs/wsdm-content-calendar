<?php

global $wpdb, $table_prefix;
$wp_content_calendar = $table_prefix . 'content_calendar';
$sql = "SELECT * FROM `$wp_content_calendar`;";
$data = $wpdb->get_results($sql);

?>

<div class="wrap">
    <h1>Content Calendar</h1>
    <form id="posts-filter" method="get">

        <p class="search-box">
            <label class="screen-reader-text" for="content-search-input">Search Content:</label>
            <input type="search" id="content-search-input" name="calendar_search" value="">
            <input type="submit" id="search-submit" class="button" value="Search Content">
        </p>

        <input type="hidden" name="post_status" class="post_status_page" value="all">
        <input type="hidden" name="post_type" class="post_type_page" value="post">


        <input type="hidden" id="_wpnonce" name="_wpnonce" value="4df19c043d"><input type="hidden"
            name="_wp_http_referer" value="/wp-admin/edit.php">
        <div class="tablenav top"></div>

        <h2 class="screen-reader-text">Posts list</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <th scope="col" id="serial-no" class="manage-column column-serial-no">
                        <span>Sl No.</span>
                    </th>
                    <th scope="col" id="post-title" class="manage-column column-post-title">
                        <span>Post Title</span>
                    </th>
                    <th scope="col" id="occassion" class="manage-column column-occassion">Occasion</th>
                    <th scope="col" id="author" class="manage-column column-author">Author</th>
                    <th scope="col" id="reviewer" class="manage-column column-reviewer">Reviewer</th>
                    <th scope="col" id="date" class="manage-column column-date"><span>Date</span></th>
                </tr>
            </thead>

            <tbody id="the-list">
                <?php
                if (count($data) !== 0) {

                    foreach ($data as $row) {
                ?>
                <tr id="post-<?php echo $row->id; ?>">
                    <td class="serial-no column-serial-no" data-colname="Serial No">
                        <?php echo $row->id ?>
                    </td>
                    <td class="post-title column-post-title" data-colname="Post Title">
                        <strong><?php echo $row->post_title ?></strong>
                    </td>
                    <td class="categories column-occassion" data-colname="Occassion"><?php echo $row->occassion ?></td>
                    <td class="author column-author" data-colname="Author"><?php echo $row->author ?></td>
                    <td class="tags column-reviewer" data-colname="Reviewer"><?php echo $row->reviewer ?></td>
                    <td class="date column-date" data-colname="Date"><?php echo $row->date ?></td>
                </tr>
                <?php }
                } else {
                    ?>
                <tr>
                    <td class="serial-no column-serial-no" data-colname="Serial No">
                        --
                    </td>
                    <td class="post-title column-post-title" data-colname="Post Title">
                        <strong>--</strong>
                    </td>
                    <td class="categories column-occassion" data-colname="Occassion">--</td>
                    <td class="author column-author" data-colname="Author">--</td>
                    <td class="tags column-reviewer" data-colname="Reviewer">--</td>
                    <td class="date column-date" data-colname="Date">--</td>
                </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot>
                <tr>
                    <th scope="col" id="serial-no" class="manage-column column-serial-no">
                        <span>Sl No.</span>
                    </th>
                    <th scope="col" id="post-title" class="manage-column column-post-title column-primary">
                        <span>Post Title</span>
                    </th>
                    <th scope="col" id="occassion" class="manage-column column-occassion">Occasion</th>
                    <th scope="col" id="author" class="manage-column column-author">Author</th>
                    <th scope="col" id="reviewer" class="manage-column column-reviewer">Reviewer</th>
                    <th scope="col" id="date" class="manage-column column-date"><span>Date</span></th>
                </tr>
            </tfoot>

        </table>

    </form>
</div>