<tr class='view' data-id="<?php echo esc_attr( $ge->id ); ?>">
	<td><?php echo esc_html( $ge->term ); ?></td>
	<td><?php echo esc_html( $ge->part_of_speech ); ?></td>
	<td><?php echo esc_html( $ge->translation ); ?></td>
	<td><?php echo make_clickable( nl2br( esc_html( $ge->comment ) ) ); ?></td>
	<?php if ( $can_edit) : ?>
	<td class="actions">
		<a href="#" class="action edit"><?php echo _x( 'edit', 'edit glossary entry' ); ?></a>
		<a href="#" class="action delete"><?php echo _x( 'delete', 'delete glossary entry' ); ?></a>
	</td>
	<?php endif; ?>
</tr>
<tr id="editor-<?php echo esc_attr( $ge->id ); ?>" style="display:none;">
	<td colspan="5">
		<h4><?php _e( 'Edit glossary entry' ); ?></h4>
		<dl>
			<dt><label for="glossary_entry_term_<?php echo esc_attr( $ge->id ); ?>"><?php echo _x( 'Original term:', 'glossary entry' ); ?></label></dt>
			<dd><input type="text" name="glossary_entry[<?php echo esc_attr( $ge->id );?>][term]" id="glossary_entry_term_<?php echo esc_attr( $ge->id ); ?>" value="<?php echo esc_attr( $ge->term ); ?>"></dd>
			<dt><label for="glossary_entry_post_<?php echo esc_attr( $ge->id ); ?>"><?php echo _x( 'Part of speech', 'glossary entry'); ?></label></dt>
			<dd><select name="glossary_entry[<?php echo esc_attr( $ge->id );?>][part_of_speech]" id="glossary_entry_pos_<?php echo esc_attr( $ge->id ); ?>">
			<?php
				foreach ( GP::$glossary_entry->parts_of_speech as $pos => $name ) {
					$selected = $pos == $ge->part_of_speech ? " selected='selected'" : '';
					echo "\t<option value='".esc_attr( $pos )."' $selected>" . esc_html( $name ) . "</option>\n";
				}
			?>
			</select></dd>
			<dt><label for="glossary_entry_comments_<?php echo esc_attr( $ge->id ); ?><?php echo esc_attr( $ge->id ); ?>"><?php echo _x( 'Comments', 'glossary entry'); ?></label></dt>
			<dd><textarea type="text" name="glossary_entry[<?php echo esc_attr( $ge->id );?>][comment]" id="glossary_entry_comments_<?php echo esc_attr( $ge->id ); ?>"><?php echo esc_textarea( $ge->comment );?></textarea></dd>
			<dt><label for="glossary_entry_translation_<?php echo esc_attr( $ge->id ); ?>"><?php echo _x( 'Translation', 'glossary entry'); ?></label></dt>
			<dd><input type="text" name="glossary_entry[<?php echo esc_attr( $ge->id );?>][translation]" id="glossary_entry_translation_<?php echo esc_attr( $ge->id ); ?>" value="<?php echo esc_attr( $ge->translation ); ?>"></dd>
		</dl>
		<p>
			<input type="hidden" name="glossary_entry[<?php echo esc_attr( $ge->id );?>][glossary_id]" value="<?php echo esc_attr( $ge->glossary_id );?>">
			<input type="hidden" name="glossary_entry[<?php echo esc_attr( $ge->id );?>][glossary_entry_id]" value="<?php echo esc_attr( $ge->id );?>">
			<button class="action save"><?php _e( 'Save'); ?></button><span class="or-cancel"><?php _e('or'); ?> <a href="#" class="action cancel"><?php _e('Cancel'); ?></a></span>
		</p>
	</td>
</tr>
<?php //TODO: last modified, by who ?>
