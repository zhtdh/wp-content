<?php get_header(); ?>


<?php
//var_dump($post->post_title);
if ($post->post_title == '在线留言') {
    include($post->post_content);
} else {
    if (have_posts()) {
        the_post();
        the_content();
    }
}
?>
</td>

<!-- here to close header -->

</tr>
</tbody>
</table>











<?php get_footer(); ?>