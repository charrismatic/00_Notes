
select post_status from fh_posts GROUP BY post_status;
+-------------+
| post_status |
+-------------+
| auto-draft  |
| draft       |
| inherit     |
| publish     |
| trash       |
+-------------+



select post_type from fh_posts GROUP BY post_type;\

+---------------------+
| post_type           |
+---------------------+
| attachment          |
| attorney            |
| attorneys           |
| banners             |
| car                 |
| custom_css          |
| customize_changeset |
| elementor_library   |
| flamingo_contact    |
| landing_page        |
| mb-post-type        |
| mb-taxonomy         |
| nav_menu_item       |
| page                |
| post                |
| practice-area       |
| revision            |
| wpcf7_contact_form  |
+---------------------+


+---------+
| meta_id |
+---------+
|     183 |
|     184 |

SELECT * FROM fh_postmeta meta LEFT JOIN fh_posts post ON post.ID = meta.post_id WHERE post.post_type = 'car';

DELETE FROM fh_postmeta WHERE meta_id = '183';
DELETE meta FROM fh_postmeta meta LEFT JOIN fh_posts post ON post.ID = meta.post_id WHERE post.post_type = 'car';

SELECT post.ID, meta.meta_id, meta.post_id, post.post_type, post.post_status, post.post_name, meta.meta_key FROM fh_postmeta meta LEFT JOIN fh_posts post ON post.ID = meta.post_id;


+------+---------+---------+---------------------+-------------+---------------------------------------------------------------------------------------------+---------------------------------------------------------------------------------
| ID   | meta_id | post_id | post_type           | post_status | post_name                                                                                   | meta_key
+------+---------+---------+---------------------+-------------+---------------------------------------------------------------------------------------------+---------------------------------------------------------------------------------
|    2 |       1 |       2 | page                | trash       | sample-page__trashed                                                                        | _wp_page_template
|    6 |       5 |       6 | attachment          | inherit     | cropped-robert-andall-460990-jpg                                                            | _wp_attached_file
|    6 |       6 |       6 | attachment          | inherit     | cropped-robert-andall-460990-jpg                                                            | _wp_attachment_context
|    6 |       7 |       6 | attachment          | inherit     | cropped-robert-andall-460990-jpg                                                            | _wp_attachment_metadata
|    6 |       8 |       6 | attachment          | inherit     | cropped-robert-andall-460990-jpg                                                            | _wp_attachment_custom_header_last_used_twentyfifteen
|    6 |       9 |       6 | attachment          | inherit     | cropped-robert-andall-460990-jpg                                                            | _wp_attachment_is_custom_header
|    7 |      13 |       7 | customize_changeset | trash       | 4942d6d3-8414-4354-a3b4-56b47f37798f                                                        | _edit_lock
|    7 |      14 |       7 | customize_changeset | trash       | 4942d6d3-8414-4354-a3b4-56b47f37798f                                                        | _wp_trash_meta_status
|    7 |      15 |       7 | customize_changeset | trash       | 4942d6d3-8414-4354-a3b4-56b47f37798f                                                        | _wp_trash_meta_time
|    8 |      16 |       8 | page                | publish     | firm-history                                                                                | _edit_last
|    8 |      17 |       8 | page                | publish     | firm-history                                                                                | _edit_lock
|   10 |      18 |      10 | page                | publish     | privacy-policy-and-use-of-information                                                       | _edit_last
|   10 |      19 |      10 | page                | publish     | privacy-policy-and-use-of-information                                                 

DELETE meta FROM fh_postmeta meta LEFT JOIN fh_posts post ON post.ID = meta.post_id WHERE meta.meta_key LIKE "%crb_slides%";


```mysql
SELECT
  post.ID,
  meta.meta_id,
  post.post_type,
  post.post_date,
  post.post_modified,
  post.post_title,
  meta.meta_key,
  meta.meta_value,
  post.post_content
FROM fh_postmeta meta
LEFT JOIN fh_posts post
ON post.ID = meta.post_id
WHERE
  post.post_type = 'banners'
ORDER BY meta.meta_key DESC
LIMIT 1;
```
