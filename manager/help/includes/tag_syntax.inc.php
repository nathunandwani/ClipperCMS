<table class="help-table">
	<caption><?php echo CMS_NAME; ?> <?php echo $_lang['help_tag_syntax']; ?></caption>
	<tbody>
		<tr>
		<th class="tag"><?php echo $_lang['help_tag']; ?></th>
		<th class="desc"><?php echo $_lang['description']; ?></th>
		</tr>
		<tr>
		<td> &#91;&#42;field&#42;&#93; or &#91;&#42;TV&#42;&#93;  </td>
		<td><?php echo $_lang['help_fields']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#42;field@docid&#42;&#93; or &#91;&#42;TV@docid&#42;&#93;  </td>
		<td><?php echo $_lang['help_crossrefs']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#126;docid&#126;&#93; </td>
		<td><?php echo $_lang['help_internal_links']; ?></td>
		</tr>
		<tr>
		<td>{{chunk}} </td>
		<td><?php echo $_lang['help_chunks']; ?></td>
		</tr>
		<tr>
		<td> &#91;(setting)&#93; </td>
		<td><?php echo $_lang['help_settings']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#91;snippet&#93;&#93; </td>
		<td><?php echo $_lang['help_snippets_cached']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#33;snippet&#33;&#93; </td>
		<td><?php echo $_lang['help_snippets_uncached']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#94;timing&#94;&#93; </td>
		<td><?php echo $_lang['help_timing']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#43;placeholder&#43;&#93; </td>
		<td><?php echo $_lang['help_placeholder']; ?></td>
		</tr>
		<tr>
		<td> &#91;&#42;field;modifier(s)&#42;&#93;,<br />&#91;&#42;TV;modifier(s)&#42;&#93;<br />or &#91;&#43;placeholder;modifier(s)&#43;&#93;</td>
		<td><?php echo $_lang['help_modifiers']; ?></td>
		</tr>
	</tbody>
</table>

